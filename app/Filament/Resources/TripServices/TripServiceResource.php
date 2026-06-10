<?php

namespace App\Filament\Resources\TripServices;

use App\Filament\Resources\TripServices\Pages\CreateTripService;
use App\Filament\Resources\TripServices\Pages\EditTripService;
use App\Filament\Resources\TripServices\Pages\ListTripServices;
use App\Filament\Resources\TripServices\Schemas\TripServiceForm;
use App\Filament\Resources\TripServices\Tables\TripServicesTable;
use App\Models\TripService;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TripServiceResource extends Resource
{
    protected static ?string $model = TripService::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'servicios de viajes';

    public static function form(Schema $schema): Schema
    {
        return TripServiceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TripServicesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTripServices::route('/'),
            'create' => CreateTripService::route('/create'),
            'edit' => EditTripService::route('/{record}/edit'),
        ];
    }
}
