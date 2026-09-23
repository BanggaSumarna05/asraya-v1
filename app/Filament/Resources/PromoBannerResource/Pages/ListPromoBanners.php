<?php

namespace App\Filament\Resources\PromoBannerResource\Pages;

use App\Filament\Resources\PromoBannerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPromoBanners extends ListRecords
{
    protected static string $resource = PromoBannerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
