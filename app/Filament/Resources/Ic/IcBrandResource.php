<?php

namespace App\Filament\Resources\Ic;

use App\Filament\Resources\Ic\IcBrandResource\Pages;
use App\Filament\Resources\Ic\IcBrandResource\RelationManagers;
use App\Models\Ic\IcBrand;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IcBrandResource extends Resource
{
    protected static ?string $model = IcBrand::class;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
    protected static ?string $navigationLabel = 'Ic Brands';
    protected static ?string $modelLabel = 'Brand';
    protected static ?string $navigationGroup = 'Ic Parameters';
    protected static ?int $navigationSort = 4;
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
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('desc')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIcBrands::route('/'),
            'create' => Pages\CreateIcBrand::route('/create'),
            'edit' => Pages\EditIcBrand::route('/{record}/edit'),
        ];
    }
}
