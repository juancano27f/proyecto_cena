<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            TextInput::make('name')
                ->label('Nombre')
                ->required(),

            TextInput::make('email')
                ->label('Correo')
                ->email()
                ->required(),

            TextInput::make('password')
                ->label('Contraseña')
                ->password()
                ->required(fn (string $operation) => $operation === 'create')
                ->dehydrated(fn ($state) => filled($state)),

            Select::make('role')
                ->label('Rol')
                ->options([
                  'admin' => 'Administrador',
                  'rector' => 'Rector',
        ])
                ->required()
                ->default('rector')
                ->live(),

            Select::make('institution_id')
                ->label('Institución')
                ->relationship('institution', 'name')
                ->searchable()
                ->preload()
                ->visible(fn ($get) => $get('role') === 'rector')
                ->required(fn ($get) => $get('role') === 'rector'),
            ]);
        }    
}
