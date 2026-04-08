<?php

namespace App\Filament\Resources\Catalogs\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CatalogInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('description')
                    ->html()
                    ->columnSpanFull(),
                TextEntry::make('price')
                    ->money(),
                ImageEntry::make('image')
                    ->placeholder('-'),
                TextEntry::make('category.name'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
