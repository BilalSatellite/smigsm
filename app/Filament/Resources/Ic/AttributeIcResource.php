<?php

namespace App\Filament\Resources\Ic;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Ic\AttributeIc;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Ic\AttributeIcResource\Pages;
use App\Filament\Resources\Ic\AttributeIcResource\RelationManagers;

class AttributeIcResource extends Resource
{
    protected static ?string $model = AttributeIc::class;
    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
    protected static ?string $navigationLabel = 'Ic Attributes';
    protected static ?string $modelLabel = 'Attribute';
    protected static ?string $navigationGroup = 'Ic Parameters';
    protected static ?int $navigationSort = 7;
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
                Section::make('Attribute For Ics')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TagsInput::make('values')
                            ->placeholder('Enter value in captal'),
                    ]),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('values')
                    ->wrap()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
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
            'index' => Pages\ListAttributeIcs::route('/'),
            'create' => Pages\CreateAttributeIc::route('/create'),
            'edit' => Pages\EditAttributeIc::route('/{record}/edit'),
        ];
    }
}
