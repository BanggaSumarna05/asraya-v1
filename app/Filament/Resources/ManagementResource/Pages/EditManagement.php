<?php
namespace App\Filament\Resources\ManagementResource\Pages;
use App\Filament\Resources\ManagementResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
class EditManagement extends EditRecord {
    protected static string $resource = ManagementResource::class;
    protected function getActions(): array { return [Actions\DeleteAction::make()]; }
}
