<?php

namespace App\Filament\Resources\MyImages;

use App\Filament\Resources\MyImages\Pages\CreateMyImage;
use App\Filament\Resources\MyImages\Pages\EditMyImage;
use App\Filament\Resources\MyImages\Pages\ListMyImages;
use App\Filament\Resources\MyImages\Schemas\MyImageForm;
use App\Filament\Resources\MyImages\Tables\MyImagesTable;
use App\Models\MyImage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MyImageResource extends Resource
{
    protected static ?string $model = MyImage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return MyImageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MyImagesTable::configure($table);
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
            'index' => ListMyImages::route('/'),
            'create' => CreateMyImage::route('/create'),
            'edit' => EditMyImage::route('/{record}/edit'),
        ];
    }
}
