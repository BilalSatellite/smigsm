<?php

namespace App\Filament\Resources\Ic;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Ic\Memory;
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
use App\Filament\Resources\Ic\MemoryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Ic\MemoryResource\RelationManagers;

class MemoryResource extends Resource
{
    protected static ?string $model = Memory::class;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
    protected static ?string $navigationLabel = 'Memorys';
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
                    ->unique(Memory::class, 'slug', ignoreRecord: true),
                Section::make('Ictypes')
                    ->description('Select Ic types')
                    ->schema([
                        CheckboxList::make('Ictypes')
                            ->relationship(titleAttribute: 'name')
                            ->required()
                            ->columns(12)
                    ]),
                Select::make('bga')
                    ->label('BGA Type')
                    ->options(AttributeIc::getIcAttributes('BGA'))
                    ->searchable()
                    ->preload(),
                Select::make('ver')
                    ->label('Version')
                    ->options(AttributeIc::getIcAttributes('eMMC:Ver'))
                    ->searchable()
                    ->preload(),
                Select::make('rever')
                    ->label('Revision Version')
                    ->options(AttributeIc::getIcAttributes('eMMC:ReVer'))
                    ->searchable()
                    ->preload(),
                Select::make('memory_size')
                    ->label('Memory Size')
                    ->options(AttributeIc::getIcAttributes('Memory:Size'))
                    ->searchable()
                    ->preload(),
                Select::make('ram_type')
                    ->label('Ram Type')
                    ->options(AttributeIc::getIcAttributes('RamSupport'))
                    ->searchable()
                    ->preload(),
                Textarea::make('desc')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                RichEditor::make('content')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name')
                    ->label('Code')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Ictypes.name')
                    ->label('Types')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('bga')
                    ->label('BGA Type')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('ram_type')
                    ->label('Ram Type')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('memory_size')
                    ->label('Memory Size')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('brand.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('ver')
                    ->label('Version')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('rever')
                    ->label('Revision Version')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),


                // TextColumn::make('ram_support')
                //     ->label('Ram Support')
                //     ->sortable()
                //     ->searchable()
                //     ->wrap(),
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
            'index' => Pages\ListMemories::route('/'),
            'create' => Pages\CreateMemory::route('/create'),
            'edit' => Pages\EditMemory::route('/{record}/edit'),
        ];
    }
}
