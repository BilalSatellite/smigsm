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
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Ic\SubCategorieIcResource\Pages;
use App\Filament\Resources\Ic\SubCategorieIcResource\RelationManagers;
use App\Filament\Resources\Ic\SubCategorieIcResource\RelationManagers\CategorieIcRelationManager;
use App\Filament\Resources\Ic\SubCategorieIcResource\RelationManagers\GetParentCategoryIcRelationManager;

class SubCategorieIcResource extends Resource
{
    protected static ?string $model = SubCategorieIc::class;
    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
    protected static ?string $navigationLabel = 'Ic Sub Categorie';
    protected static ?string $modelLabel = 'Sub Categorie';
    protected static ?string $navigationGroup = 'Ic Parameters';
    protected static ?int $navigationSort = 6;
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
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->maxLength(255)
                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                TextInput::make('slug')
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->maxLength(255)
                    ->unique(SubCategorieIc::class, 'slug', ignoreRecord: true),
                Textarea::make('desc')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Select::make('categorie_ic_id')
                    ->label('Parent Category')
                    ->searchable()
                    ->required()
                    ->preload()
                    ->relationship('getParentCategoryIc', 'name')

            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Sub Category')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('getParentCategoryIc.name')
                    ->label('Parent Category')
                    ->sortable(),
                TextColumn::make('desc')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubCategorieIcs::route('/'),
            'create' => Pages\CreateSubCategorieIc::route('/create'),
            'edit' => Pages\EditSubCategorieIc::route('/{record}/edit'),
        ];
    }
}
