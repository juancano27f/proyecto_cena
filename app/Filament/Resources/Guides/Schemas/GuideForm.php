<?php

class GuideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre del guía')
                    ->required(),

                TextInput::make('service_type')
                    ->default('Guía turístico')
                    ->hidden(),

                TextInput::make('email')
                    ->label('Correo')
                    ->email(),

                TextInput::make('phone')
                    ->label('Teléfono')
                    ->tel(),
            ]);
    }
}