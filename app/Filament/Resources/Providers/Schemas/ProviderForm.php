<?php

namespace App\Filament\Resources\Providers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProviderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required(),

                Select::make('service_type')
                    ->label('Tipo de servicio')
                    ->options([
                        'Aerolínea' => 'Aerolínea',
                        'Hotel' => 'Hotel',
                        'Transporte' => 'Transporte',
                        'Otro' => 'Otro',
                    ])
                    ->required(),

                TextInput::make('email')
                    ->label('Correo electrónico')
                    ->email(),

                TextInput::make('phone')
                    ->label('Teléfono')
                    ->tel(),
            ]);
    }
}