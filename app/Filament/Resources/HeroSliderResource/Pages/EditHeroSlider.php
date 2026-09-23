<?php
namespace App\Filament\Resources\HeroSliderResource\Pages;
use App\Filament\Resources\HeroSliderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
class EditHeroSlider extends EditRecord {
    protected static string $resource = HeroSliderResource::class;
    protected function getActions(): array { return [Actions\DeleteAction::make()]; }
}
