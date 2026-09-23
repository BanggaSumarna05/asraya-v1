<?php
namespace App\Filament\Resources\ConstructionProgressResource\Pages;
use App\Filament\Resources\ConstructionProgressResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
class EditConstructionProgress extends EditRecord {
    protected static string $resource = ConstructionProgressResource::class;
    protected function getActions(): array { return [Actions\DeleteAction::make()]; }
}
