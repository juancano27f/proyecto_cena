<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('institution_id')
                    ->label('Institución')
                    ->relationship('institution', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                TextInput::make('first_name')
                    ->label('Nombres')
                    ->required(),

                TextInput::make('last_name')
                    ->label('Apellidos')
                    ->required(),

                DatePicker::make('birth_date')
                    ->label('Fecha de nacimiento'),

                Select::make('document_type')
                    ->label('Tipo de documento')
                    ->options([
                        'TI' => 'Tarjeta de identidad',
                        'CC' => 'Cédula de ciudadanía',
                        'CE' => 'Cédula de extranjería',
                        'PASAPORTE' => 'Pasaporte',
                    ])
                    ->required(),

                TextInput::make('document_number')
                    ->label('Número de documento')
                    ->required(),

                TextInput::make('grade')
                    ->label('Grado / Curso'),

                TextInput::make('student_phone')
                    ->label('Teléfono del estudiante')
                    ->tel(),

                TextInput::make('email')
                    ->label('Correo del estudiante')
                    ->email(),

                TextInput::make('address')
                    ->label('Dirección'),

                TextInput::make('city')
                    ->label('Ciudad'),

                Select::make('blood_type')
                    ->label('Tipo de sangre')
                    ->options([
                        'O+' => 'O+',
                        'O-' => 'O-',
                        'A+' => 'A+',
                        'A-' => 'A-',
                        'B+' => 'B+',
                        'B-' => 'B-',
                        'AB+' => 'AB+',
                        'AB-' => 'AB-',
                    ]),

                Textarea::make('allergies')
                    ->label('Alergias o condiciones médicas')
                    ->columnSpanFull(),

                TextInput::make('guardian_name')
                    ->label('Nombre del padre / acudiente')
                    ->required(),

                TextInput::make('guardian_document')
                    ->label('Documento del acudiente')
                    ->required(),

                TextInput::make('guardian_phone')
                    ->label('Teléfono del acudiente')
                    ->tel()
                    ->required(),

                TextInput::make('guardian_email')
                    ->label('Correo del acudiente')
                    ->email(),

                TextInput::make('emergency_contact_name')
                    ->label('Contacto de emergencia'),

                TextInput::make('emergency_contact_phone')
                    ->label('Teléfono de emergencia')
                    ->tel(),
            ]);
    }
}