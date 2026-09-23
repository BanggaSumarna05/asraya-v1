<?php
namespace App\Filament\Resources\BankPartnerResource\Pages;
use App\Filament\Resources\BankPartnerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
class ListBankPartners extends ListRecords {
    protected static string $resource = BankPartnerResource::class;
    protected function getActions(): array { return [Actions\CreateAction::make()]; }
}
