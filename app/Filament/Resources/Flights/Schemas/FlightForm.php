<?php

namespace App\Filament\Resources\Flights\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FlightForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('airline')
                    ->label('Aerolínea')
                    ->required(),

                TextInput::make('origin')
                    ->label('Origen')
                    ->required(),

                TextInput::make('destination')
                    ->label('Destino')
                    ->required(),

                DatePicker::make('departure_date')
                    ->label('Fecha de salida')
                    ->required(),

                TextInput::make('departure_time')
                    ->label('Hora de salida')
                    ->placeholder('08:30'),

                TextInput::make('seats')
                    ->label('Cupos disponibles')
                    ->numeric()
                    ->required()
                    ->default(0),

                TextInput::make('price')
                    ->label('Precio')
                    ->numeric(),

                Select::make('status')
                    ->label('Estado')
                    ->options([
                        'available' => 'Disponible',
                        'unavailable' => 'No disponible',
                    ])
                    ->required()
                    ->default('available'),
            ]);
    }
}