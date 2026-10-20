<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre interno')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Ejemplo: admin o rector'),

                TextInput::make('label')
                    ->label('Nombre visible')
                    ->required()
                    ->helperText('Ejemplo: Administrador o Rector'),

                Textarea::make('description')
                    ->label('Descripción')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}