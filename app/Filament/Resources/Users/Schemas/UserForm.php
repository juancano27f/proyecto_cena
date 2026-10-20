<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

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

                Select::make('role_id')
                    ->label('Rol')
                    ->relationship('userRole', 'label')
                    ->required()
                    ->live()
                    ->helperText('Los roles se administran en el módulo Roles'),

                Select::make('institution_id')
                    ->label('Institución')
                    ->relationship('institution', 'name')
                    ->searchable()
                    ->preload()
                    ->visible(function ($get) {
                        $roleId = $get('role_id');

                        if (!$roleId) {
                            return false;
                        }

                        $role = \App\Models\Role::find($roleId);

                        return $role?->name === 'rector';
                    })
                    ->required(function ($get) {
                        $roleId = $get('role_id');

                        if (!$roleId) {
                            return false;
                        }

                        $role = \App\Models\Role::find($roleId);

                        return $role?->name === 'rector';
                    }),
            ]);
    }
}