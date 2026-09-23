<?php
namespace App\Filament\Resources\HeroSliderResource\Pages;
use App\Filament\Resources\HeroSliderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
class ListHeroSliders extends ListRecords {
    protected static string $resource = HeroSliderResource::class;
    protected function getActions(): array { return [Actions\CreateAction::make()]; }
}
