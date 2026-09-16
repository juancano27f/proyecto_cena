<?php

namespace App\Filament\Resources\Flights\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class FlightsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
               TextColumn::make('airline')
            ->label('Aerolínea')
            ->searchable(),

                TextColumn::make('origin')
            ->label('Origen'),

                TextColumn::make('destination')
            ->label('Destino'),

                TextColumn::make('departure_date')
            ->label('Fecha')
            ->date(),

                TextColumn::make('departure_time')
            ->label('Hora'),

                TextColumn::make('seats')
            ->label('Cupos'),

                TextColumn::make('price')
            ->label('Precio'),

                TextColumn::make('status')
            ->label('Estado')
            ->badge(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
