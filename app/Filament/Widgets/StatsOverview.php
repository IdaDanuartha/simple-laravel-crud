<?php

namespace App\Filament\Widgets;

use App\Models\Catalog;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Products', Catalog::count())
                ->description('Total products in catalog')
                ->descriptionIcon('heroicon-o-shopping-bag')
                ->color('success'),
            Stat::make('Total Categories', Category::count())
                ->description('Organized product categories')
                ->descriptionIcon('heroicon-o-tag')
                ->color('info'),
        ];
    }
}
