<?php

namespace App\Filament\Resources\Ic;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Helpers\BsHelper;
use App\Models\Ic\Memory;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\Ic\MemoryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Ic\MemoryResource\RelationManagers;

class MemoryResource extends Resource
{
    protected static ?string $model = Memory::class;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
    protected static ?string $navigationLabel = 'Memories';
    protected static ?string $modelLabel = 'Memory';
    protected static ?string $navigationGroup = 'Ics DataBase';
    protected static ?int $navigationSort = 10;

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
                Select::make('ic_brand_id')
                    ->relationship(name: 'brand', titleAttribute: 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->native(false),
                Select::make('ic_type_id')
                    ->label('Ic Type')
                    ->options(BsHelper::icTypesBy('Memory'))
                    ->searchable()
                    ->required()
                    ->preload()
                    ->native(false),
                TextInput::make('slug')
                    ->required()
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
                    ->unique(Memory::class, 'slug', ignoreRecord: true),
                Textarea::make('desc')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                RichEditor::make('content')
                    ->columnSpanFull(),
                // Select::make('ram_support')
                //     ->options(IcAttribute::getIcAttributes('RamSupport'))
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
                    ->searchable()
                    ->sortable(),
                TextColumn::make('brand.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('icType.name')
                    ->label('Type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('contributor.name')
                    ->searchable()
                    ->sortable()
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
            'index' => Pages\ListMemories::route('/'),
            'create' => Pages\CreateMemory::route('/create'),
            'edit' => Pages\EditMemory::route('/{record}/edit'),
        ];
    }
}
