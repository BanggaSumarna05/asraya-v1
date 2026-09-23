<?php
namespace App\Filament\Resources\ConstructionProgressResource\Pages;
use App\Filament\Resources\ConstructionProgressResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
class ListConstructionProgress extends ListRecords {
    protected static string $resource = ConstructionProgressResource::class;
    protected function getActions(): array { return [Actions\CreateAction::make()]; }
}
