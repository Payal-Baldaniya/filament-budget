<?php

namespace App\Filament\Resources\TransactionResource\Widgets;

use App\Filament\Resources\TransactionResource\Pages\ListTransactions;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TransactionOverview extends BaseWidget
{
    use InteractsWithPageTable;

    protected function getTablePage(): string
    {
        return ListTransactions::class;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Total Tranaction', $this->getPageTableQuery()->count()),
            Stat::make('Total Amount', '$' . number_format($this->getPageTableQuery()->sum('amount'), 2)),
        ];
    }

    protected function getColumns(): int
    {
        return 2;
    }
}
