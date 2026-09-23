<?php
namespace App\Filament\Resources\IgFeedResource\Pages;
use App\Filament\Resources\IgFeedResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
class ListIgFeeds extends ListRecords {
    protected static string $resource = IgFeedResource::class;
    protected function getActions(): array { return [Actions\CreateAction::make()]; }
}
