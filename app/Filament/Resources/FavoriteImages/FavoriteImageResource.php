<?php

namespace App\Filament\Resources\FavoriteImages;

use App\Filament\Resources\FavoriteImages\Pages\CreateFavoriteImage;
use App\Filament\Resources\FavoriteImages\Pages\EditFavoriteImage;
use App\Filament\Resources\FavoriteImages\Pages\ListFavoriteImages;
use App\Filament\Resources\FavoriteImages\Schemas\FavoriteImageForm;
use App\Filament\Resources\FavoriteImages\Tables\FavoriteImagesTable;
use App\Models\FavoriteImage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FavoriteImageResource extends Resource
{
    protected static ?string $model = FavoriteImage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return FavoriteImageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FavoriteImagesTable::configure($table);
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
            'index' => ListFavoriteImages::route('/'),
            'create' => CreateFavoriteImage::route('/create'),
            'edit' => EditFavoriteImage::route('/{record}/edit'),
        ];
    }
}
