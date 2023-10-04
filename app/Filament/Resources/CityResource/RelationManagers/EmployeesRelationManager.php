<?php

namespace App\Filament\Resources\CityResource\RelationManagers;

use App\Models\City;
use App\Models\State;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Collection;

class EmployeesRelationManager extends RelationManager
{
    protected static string $relationship = 'employees';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Relationships')
                    ->description('Put the relationships data here.')
                    ->schema([
                        Forms\Components\Select::make('country_id')
                            ->relationship(name: 'country', titleAttribute: 'name')
                            ->preload()
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(function (Set $set) {
                                $set('state_id', null);
                                $set('city_id', null);
                            })
                            ->required(),
                        Forms\Components\Select::make('state_id')
                            ->options(fn (Get $get): Collection => State::query()
                                ->where('country_id', $get('country_id'))
                                ->pluck('name', 'id'))
                            ->preload()
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(fn (Set $set) => $set('city_id', null))
                            ->required(),
                        Forms\Components\Select::make('city_id')
                            ->options(fn (Get $get): Collection => City::query()
                                ->where('state_id', $get('state_id'))
                                ->pluck('name', 'id'))
                            ->preload()
                            ->searchable()
                            ->live()
                            ->required(),
                        Forms\Components\Select::make('department_id')
                            ->relationship(name: 'department', titleAttribute: 'name')
                            ->preload()
                            ->searchable()
                            ->required(),
                    ])->columns(2),
                Forms\Components\Section::make('User Name')
                    ->description('Put the username details here.')
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->placeholder('John')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('last_name')
                            ->placeholder('Doe')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('middle_name')
                            ->placeholder('Not Mandatory')
                            ->maxLength(255),
                    ])->columns(3),
                Forms\Components\Section::make('User Address')
                    ->description('Put the address details here.')
                    ->schema([
                        Forms\Components\TextInput::make('address')
                            ->placeholder('Groove Street No 7')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('zip_code')
                            ->placeholder('50567')
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),
                Forms\Components\Section::make('Dates')
                    ->description('Put the user dates details here.')
                    ->schema([
                        Forms\Components\DatePicker::make('date_of_birth')
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->required(),
                        Forms\Components\DatePicker::make('date_hired')
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->required(),
                    ])->columns(2)
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
        ->recordTitleAttribute('first_name')
        ->columns([
            Tables\Columns\TextColumn::make('id')
                ->label('No')
                ->sortable()
                ->rowIndex(),
            Tables\Columns\TextColumn::make('state.name')
                ->searchable(),
            Tables\Columns\TextColumn::make('city.name')
                ->searchable(),
            Tables\Columns\TextColumn::make('department.name')
                ->searchable(),
            Tables\Columns\TextColumn::make('first_name')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('last_name')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('middle_name')
                ->toggleable(isToggledHiddenByDefault: true)
                ->searchable(),
            Tables\Columns\TextColumn::make('address')
                ->searchable(),
            Tables\Columns\TextColumn::make('zip_code')
                ->searchable(),
            Tables\Columns\TextColumn::make('date_of_birth')
                ->date()
                ->toggleable(isToggledHiddenByDefault: true)
                ->sortable(),
            Tables\Columns\TextColumn::make('date_hired')
                ->date()
                ->toggleable(isToggledHiddenByDefault: true)
                ->sortable()
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public function isReadOnly(): bool
    {
        return false;
    }
}
