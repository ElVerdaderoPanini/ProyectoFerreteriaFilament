<?php

namespace App\Filament\Resources\DetallePedidosResource\Pages;

use App\Filament\Resources\DetallePedidosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDetallePedidos extends ListRecords
{
    protected static string $resource = DetallePedidosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
