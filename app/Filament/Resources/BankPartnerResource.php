<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BankPartnerResource\Pages;
use App\Models\BankPartner;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Storage;

class BankPartnerResource extends Resource
{
    protected static ?string $model = BankPartner::class;
    protected static ?string $navigationIcon = 'heroicon-o-library';
    protected static ?string $navigationLabel = 'Bank Partner';
    protected static ?string $navigationGroup = 'Konten Website';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nama Bank')
                ->required()
                ->maxLength(100),
            Forms\Components\FileUpload::make('logo')
                ->label('Logo Bank')
                ->image()
                ->disk('public')
                ->directory('banks')
                ->required(),
            Forms\Components\TextInput::make('order')
                ->label('Urutan')
                ->numeric()
                ->default(0),
            Forms\Components\Toggle::make('is_active')
                ->label('Aktif')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo')
                    ->getStateUsing(function ($record) {
                        $img = $record->logo;
                        if (str_starts_with($img, '/') || str_starts_with($img, 'img/')) {
                            return url(ltrim($img, '/'));
                        }
                        return Storage::disk('public')->url($img);
                    })
                    ->disk('public'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Bank')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->defaultSort('order')
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListBankPartners::route('/'),
            'create' => Pages\CreateBankPartner::route('/create'),
            'edit'   => Pages\EditBankPartner::route('/{record}/edit'),
        ];
    }
}
