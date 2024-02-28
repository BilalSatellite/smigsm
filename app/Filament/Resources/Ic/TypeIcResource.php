<?php

namespace App\Filament\Resources\Ic;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Ic\TypeIc;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Ic\TypeIcResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Ic\TypeIcResource\RelationManagers;
use App\Filament\Resources\Ic\TypeIcResource\RelationManagers\GetProcessorsRelationManager;

class TypeIcResource extends Resource
{
    protected static ?string $model = TypeIc::class;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
    protected static ?string $navigationLabel = 'Ic Types';
    protected static ?string $modelLabel = 'Type';
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
                    ->unique(TypeIc::class, 'slug', ignoreRecord: true),
                Textarea::make('desc')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Select::make('categorie_ic_id')
                    ->label('Category')
                    ->searchable()
                    ->required()
                    ->preload()
                    ->relationship('getCategoryIcs', 'name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),

                TextColumn::make('name')
                    ->label('Type')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('getCategoryIcs.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),
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

    public static function getRelations(): array
    {
        return [
            GetProcessorsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTypeIcs::route('/'),
            'create' => Pages\CreateTypeIc::route('/create'),
            'edit' => Pages\EditTypeIc::route('/{record}/edit'),
        ];
    }
}
