<?php

namespace App\Filament\Resources\MyImages\Tables;

use Auth;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Filament\Actions\Action;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Grid;
use \App\Http\Controllers\v1\ImageController;
use Spatie\Image\Enums\AlignPosition;
class MyImagesTable
{


    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Grid::make(1)
                    ->schema([
                        ImageColumn::make('image')->square()
                            ->height(150)->extraImgAttributes(['class' => 'w-full rounded']),

                        TextColumn::make('title')
                            ->weight(FontWeight::SemiBold)
                            ->size('lg'),
                        TextColumn::make('description')
                    ]),
            ])->actions([
                    Action::make('favorite')
                        ->icon('heroicon-o-star')
                        ->color('warning')
                        ->action(function ($record, ImageController $imageController) {

                            $imageController->saveFavoriteImage(Auth::id(), $record->id, "myImage", null);
                        })
                        ->tooltip(fn($record) => $record->favorite ? 'Unfavorite' : 'Favorite'),
                    Action::make('download')
                        ->icon('heroicon-o-arrow-down-circle')
                        ->color('success')
                        ->action(function ($record) {
                            $path = storage_path('app/private/' . $record->image);

                            if (!file_exists($path)) {
                                abort(404);
                            }
                            return response()->download($path, $record->title . '.' . pathinfo($record->image, PATHINFO_EXTENSION));
                        }),
                ])

            ->contentGrid([
                'md' => 3,
            ])->defaultSort('id', 'desc')
        ;
    }
}
