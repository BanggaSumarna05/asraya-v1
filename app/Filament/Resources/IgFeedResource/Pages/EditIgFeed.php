<?php
namespace App\Filament\Resources\IgFeedResource\Pages;
use App\Filament\Resources\IgFeedResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
class EditIgFeed extends EditRecord {
    protected static string $resource = IgFeedResource::class;
    protected function getActions(): array { return [Actions\DeleteAction::make()]; }
}
