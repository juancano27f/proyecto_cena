<?php

namespace App\Filament\Resources\Flights\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\Provider;

class FlightForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('airline')
                    ->label('Aerolínea')
                    ->options(
                Provider::query()
                    ->where('service_type', 'Aerolínea')
                    ->pluck('name', 'name')
    )
                    ->searchable()
                    ->required()
                    ->helperText('Solo aparecen aerolíneas registradas'),
               Select::make('origin')
                    ->label('Origen')
                    ->options([
                    'Bogotá' => 'Bogotá',
                    'Medellín' => 'Medellín',
                    'Cali' => 'Cali',
                    'Barranquilla' => 'Barranquilla',
                    'Cartagena' => 'Cartagena',
                    'Santa Marta' => 'Santa Marta',
                    'San Andrés' => 'San Andrés',
                    'Pereira' => 'Pereira',
                    'Bucaramanga' => 'Bucaramanga',
        ])
                    ->searchable()
                    ->required(),

               Select::make('destination')
                    ->label('Destino')
                    ->options([
                    'Bogotá' => 'Bogotá',
                    'Medellín' => 'Medellín',
                    'Cali' => 'Cali',
                    'Barranquilla' => 'Barranquilla',
                    'Cartagena' => 'Cartagena',
                    'Santa Marta' => 'Santa Marta',
                    'San Andrés' => 'San Andrés',
                    'Pereira' => 'Pereira',
                    'Bucaramanga' => 'Bucaramanga',
        ])
                    ->searchable()
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