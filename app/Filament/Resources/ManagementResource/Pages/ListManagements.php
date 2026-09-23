<?php
namespace App\Filament\Resources\ManagementResource\Pages;
use App\Filament\Resources\ManagementResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
class ListManagements extends ListRecords {
    protected static string $resource = ManagementResource::class;
    protected function getActions(): array { return [Actions\CreateAction::make()]; }
}
