<?php

namespace App\Filament\Resources\Ic;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\Ic\Processor;
use App\Models\Ic\AttributeIc;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\MorphToSelect;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Ic\ProcessorResource\Pages;
use App\Filament\Resources\Ic\ProcessorResource\RelationManagers;
use App\Models\Ic\SubCategorieIc;

class ProcessorResource extends Resource
{
    protected static ?string $model = Processor::class;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
    protected static ?string $navigationLabel = 'Processors';
    protected static ?string $modelLabel = 'Processor';
    protected static ?string $navigationGroup = 'Ics DataBase';
    protected static ?int $navigationSort = 8;

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
                    ->unique(Processor::class, 'slug', ignoreRecord: true),


                Section::make('categories')
                    ->description('Select Categories')
                    ->schema([
                        CheckboxList::make('categories')
                            ->relationship(titleAttribute: 'name')
                            ->required()
                            ->columns(12)
                    ]),
                // MorphToSelect::make('typeables')
                //     ->types([
                //         MorphToSelect\Type::make(SubCategorieIc::class)
                //             ->titleAttribute('name'),

                //     ]),
                Textarea::make('desc')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                RichEditor::make('content')
                    ->columnSpanFull(),
                Select::make('ram_support')
                    ->options(AttributeIc::getIcAttributes('Processor:RamSupport'))
                    ->searchable()
                    ->preload()
                    ->multiple(),


                // Select::make('categories')
                //     ->relationship(name: 'categories', titleAttribute: 'name')
                //     ->searchable()
                //     ->multiple()
                //     ->preload()
                //     ->native(false),




            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')
                    ->label('Code')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('categories.name')
                    ->label('Categories'),

                Tables\Columns\TextColumn::make('brand.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('ram_support')
                    ->label('Ram Support')
                    ->wrap(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('desc')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('contributor.name')
                    ->label('Contributor')
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
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListProcessors::route('/'),
            'create' => Pages\CreateProcessor::route('/create'),
            'view' => Pages\ViewProcessor::route('/{record}/view'),
            'edit' => Pages\EditProcessor::route('/{record}/edit'),
        ];
    }
}
