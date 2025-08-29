<?php

namespace App\Filament\Resources\MyImages\Pages;

use App\Filament\Resources\MyImages\MyImageResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMyImage extends CreateRecord
{
    protected static string $resource = MyImageResource::class;
}
