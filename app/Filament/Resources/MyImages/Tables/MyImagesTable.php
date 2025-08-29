<?php

namespace App\Filament\Resources\MyImages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Grid;
class MyImagesTable
{
    public static function configure(Table $table): Table
    {
        return $table->contentGrid([
            'md' => 3,
        ])
            ->columns([
                Grid::make(1)
                    ->schema([
                        Panel::make([
                            ImageColumn::make('image')->width(100)->height(100)
                                ->circular(),
                            TextColumn::make('title')
                                ->weight('bold')
                                ->size('lg'),
                            TextColumn::make('description')
                                ->limit(80),

                        ])

                    ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
