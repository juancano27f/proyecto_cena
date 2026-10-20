<?php

namespace App\Filament\Resources\Institutions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InstitutionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required(),

                TextInput::make('email')
                    ->label('Correo electrónico')
                    ->email(),

                TextInput::make('phone')
                    ->label('Teléfono')
                    ->tel(),

                TextInput::make('address')
                    ->label('Dirección'),
            ]);
    }
}