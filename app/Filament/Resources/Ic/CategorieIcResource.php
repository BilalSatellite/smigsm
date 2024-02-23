<?php

namespace App\Filament\Resources\Ic;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\Ic\CategorieIc;
use Filament\Resources\Resource;
use App\Models\Ic\SubCategorieIc;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use App\Filament\Resources\Ic\CategorieIcResource;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Ic\CategorieIcResource\Pages;
use App\Filament\Resources\Ic\CategorieIcResource\RelationManagers;
use App\Filament\Resources\Ic\CategorieIcResource\RelationManagers\GetChildCategoryIcRelationManager;

class CategorieIcResource extends Resource
{
    protected static ?string $model = CategorieIc::class;
    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
    protected static ?string $navigationLabel = 'Ic Categorie';
    protected static ?string $modelLabel = 'Categorie';
    protected static ?string $navigationGroup = 'Ic Parameters';
    protected static ?int $navigationSort = 5;
    public function mount(): void
    {
        abort_unless(auth()->user()->hasRole('Admin'), 403);
    }
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasRole('Admin');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        // ...   
                        TextInput::make('name')
                            ->required()
                            ->live(onBlur: true)
                            ->maxLength(255)
                            ->dehydrateStateUsing(fn (string $state): string => Str::ucfirst($state))
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(255)
                            ->unique(CategorieIc::class, 'slug', ignoreRecord: true),
                        TextInput::make('desc')
                            ->minLength(2)
                            ->maxLength(255)
                            ->columnSpanFull(),

                    ])->columns(2)
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('getChildCategoryIc.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    public static function getRelations(): array
    {
        return [
            GetChildCategoryIcRelationManager::class
        ];
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategorieIcs::route('/'),
            'create' => Pages\CreateCategorieIc::route('/create'),
            'edit' => Pages\EditCategorieIc::route('/{record}/edit'),
        ];
    }
}
