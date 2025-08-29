<?php

namespace App\Filament\Resources\MyImages\Pages;

use App\Filament\Resources\MyImages\MyImageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMyImages extends ListRecords
{
    protected static string $resource = MyImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
