<?php

namespace App\Filament\Resources\Providers;

use App\Filament\Resources\Providers\Pages\CreateProvider;
use App\Filament\Resources\Providers\Pages\EditProvider;
use App\Filament\Resources\Providers\Pages\ListProviders;
use App\Filament\Resources\Providers\Schemas\ProviderForm;
use App\Filament\Resources\Providers\Tables\ProvidersTable;
use App\Models\Provider;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProviderResource extends Resource
{
    protected static ?string $model = Provider::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Proveedores';
    protected static ?string $modelLabel = 'proveedor';
    protected static ?string $pluralModelLabel = 'proveedores';
    protected static ?string $recordTitleAttribute = 'proveedores';

    public static function canViewAny(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()
            ->where('service_type', '!=', 'Guía turístico');
    }

    public static function form(Schema $schema): Schema
    {
        return ProviderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProvidersTable::configure($table);
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
            'index' => ListProviders::route('/'),
            'create' => CreateProvider::route('/create'),
            'edit' => EditProvider::route('/{record}/edit'),
        ];
    }
}
