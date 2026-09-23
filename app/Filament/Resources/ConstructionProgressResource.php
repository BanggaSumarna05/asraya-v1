<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConstructionProgressResource\Pages;
use App\Models\ConstructionProgress;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ConstructionProgressResource extends Resource
{
    protected static ?string $model = ConstructionProgress::class;
    protected static ?string $navigationIcon = 'heroicon-o-camera';
    protected static ?string $navigationLabel = 'Progress Konstruksi';
    protected static ?string $navigationGroup = 'Konten Website';
    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('period')
                ->label('Periode')
                ->required()
                ->placeholder('September 2024')
                ->maxLength(50),
            Forms\Components\TextInput::make('order')
                ->label('Urutan (terbaru = angka kecil)')
                ->numeric()
                ->default(0),
            Forms\Components\Toggle::make('is_active')
                ->label('Tampilkan')
                ->default(true),
            Forms\Components\Repeater::make('images')
                ->relationship()
                ->label('Foto Progress')
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('Foto')
                        ->image()
                        ->disk('public')
                        ->directory('progress')
                        ->required(),
                    Forms\Components\TextInput::make('order')
                        ->label('Urutan')
                        ->numeric()
                        ->default(0),
                ])
                ->createItemButtonLabel('+ Tambah Foto')
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('period')
                    ->label('Periode')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('images_count')
                    ->counts('images')
                    ->label('Jumlah Foto'),
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
            'index'  => Pages\ListConstructionProgress::route('/'),
            'create' => Pages\CreateConstructionProgress::route('/create'),
            'edit'   => Pages\EditConstructionProgress::route('/{record}/edit'),
        ];
    }
}
