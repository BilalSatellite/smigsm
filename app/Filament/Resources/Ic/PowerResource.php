<?php

namespace App\Filament\Resources\Ic;

use Filament\Forms;
use Filament\Tables;
use App\Models\Ic\Power;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\Ic\AttributeIc;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use App\Filament\Resources\Ic\PowerResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Ic\PowerResource\RelationManagers;

class PowerResource extends Resource
{
    protected static ?string $model = Power::class;
    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
    protected static ?string $navigationLabel = 'Powers';
    protected static ?string $modelLabel = 'Power';
    protected static ?string $navigationGroup = 'Ics DataBase';
    protected static ?int $navigationSort = 9;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Ic Code')
                    ->required()
                    ->live(onBlur: true)
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn (string $state): string => Str::upper($state))
                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                Select::make('brand_ic_id')
                    ->relationship(name: 'brand', titleAttribute: 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->native(false),
                TextInput::make('slug')
                    ->disabled(
                        function (string $operation) {
                            if ($operation === 'edit') {
                                return  false;
                            } else {
                                return true;
                            }
                        }
                    )
                    ->dehydrated()
                    ->required()
                    ->maxLength(255)
                    ->unique(Power::class, 'slug', ignoreRecord: true),
                Section::make('categories')
                    ->description('Select Categories')
                    ->schema([
                        CheckboxList::make('categories')
                            ->relationship(titleAttribute: 'name')
                            ->required()
                            ->columns(12)
                    ]),
                Textarea::make('desc')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                RichEditor::make('content')
                    ->columnSpanFull(),
                // Select::make('ram_support')
                //     ->options(AttributeIc::getIcAttributes('Processor:RamSupport'))
                //     ->searchable()
                //     ->preload()
                //     ->multiple(),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Code')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('categories.name')
                    ->label('Categories')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('brand.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('ram_support')
                    ->label('Ram Support')
                    ->sortable()
                    ->searchable()
                    ->wrap(),
                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('desc')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('contributor.name')
                    ->label('Contributor')
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
            //
        ];
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPowers::route('/'),
            'create' => Pages\CreatePower::route('/create'),
            'edit' => Pages\EditPower::route('/{record}/edit'),
        ];
    }
}
