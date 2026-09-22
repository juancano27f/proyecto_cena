<?php

namespace App\Filament\Resources\Guides;

use App\Filament\Resources\Guides\Pages\CreateGuide;
use App\Filament\Resources\Guides\Pages\EditGuide;
use App\Filament\Resources\Guides\Pages\ListGuides;
use App\Filament\Resources\Guides\Schemas\GuideForm;
use App\Filament\Resources\Guides\Tables\GuidesTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GuideResource extends Resource
{
    protected static ?string $model = \App\Models\Provider::class;

   protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-user-group';

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    { 
    return parent::getEloquentQuery()
        ->where('service_type', 'Guía turístico');
    }

    protected static ?string $navigationLabel = 'Guías';
    protected static ?string $modelLabel = 'guía';
    protected static ?string $pluralModelLabel = 'guías';

    public static function form(Schema $schema): Schema
    {
        return GuideForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GuidesTable::configure($table);
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
            'index' => ListGuides::route('/'),
            'create' => CreateGuide::route('/create'),
            'edit' => EditGuide::route('/{record}/edit'),
        ];
    }
}
