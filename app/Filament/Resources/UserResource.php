<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'User Manage';
    protected static ?int $navigationSort = 3;
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
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->unique(ignorable: fn ($record) => $record)
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),
                Section::make()
                    ->schema([
                        TextInput::make('password')
                            ->password()
                            // ->hidden(false)
                            ->visible(function (string $operation) {
                                if ($operation === 'edit') {
                                    return  false;
                                } else {
                                    return true;
                                }
                            })
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (Page $livewire) => ($livewire instanceof CreateUser))
                            ->maxLength(255),
                        Select::make('banned_status')
                            ->options([
                                '1-Day' => '1-Day',
                                '1-Week' => '1-Week',
                                '1-Month' => '1-Month',
                                'Block' => 'Block',
                                'Active' => 'Active'
                            ])
                            ->default('Active')
                            ->live()
                            ->native(false)
                            ->required()
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                switch ($state) {
                                    case ('Block'):
                                        $set('banned_time', 'Block');
                                        break;
                                    case ('1-Day'):
                                        $set('banned_time',  Carbon::now()->addDays(1));
                                        break;
                                    case ('1-Week'):
                                        $set('banned_time', Carbon::now()->addDays(7));
                                        break;
                                    case ('1-Month'):
                                        $set('banned_time', Carbon::now()->addDays(30));
                                        break;
                                    default:
                                        $set('banned_time', NULL);
                                }
                                return;
                            }),
                    ])->columns(2),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('profile_photo_path')
                    ->label('Photo')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('roles.name')
                    ->sortable()
                    ->searchable()
                    ->listWithLineBreaks()
                    ->badge(),
                TextColumn::make('permissions.name')
                    ->sortable()
                    ->searchable()
                    ->listWithLineBreaks()
                    ->badge(),
                TextColumn::make('banned_time')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('banned_status')
                    ->label('Status')
                    ->sortable()
                    ->searchable()
                    ->color(fn (string $state): string => match ($state) {
                        'Block' => 'danger',
                        '1-Day' => 'warning',
                        '1-Week' => 'warning',
                        '1-Month' => 'warning',
                        'Active' => 'success',
                    }),
                TextColumn::make('wrong_attempt')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
