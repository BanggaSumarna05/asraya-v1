<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FacilityResource\Pages;
use App\Models\Facility;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Storage;

class FacilityResource extends Resource
{
    protected static ?string $model = Facility::class;
    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationLabel = 'Fasilitas';
    protected static ?string $navigationGroup = 'Konten Website';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('Nama Fasilitas')
                ->required()
                ->maxLength(100),
            Forms\Components\TextInput::make('slug')
                ->label('Slug (URL)')
                ->required()
                ->maxLength(100)
                ->helperText('Contoh: clubhouse, gym, swimming-pool'),
            Forms\Components\FileUpload::make('cover')
                ->label('Foto Cover')
                ->image()
                ->disk('public')
                ->directory('facilities')
                ->required(),
            Forms\Components\Textarea::make('description')
                ->label('Deskripsi')
                ->rows(4),
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
                Tables\Columns\ImageColumn::make('cover')
                    ->label('Cover')
                    ->getStateUsing(function ($record) {
                        $img = $record->cover;
                        if (!$img) return null;
                        if (str_starts_with($img, '/') || str_starts_with($img, 'img/') || str_starts_with($img, 'new/')) {
                            return url(ltrim($img, '/'));
                        }
                        return Storage::disk('public')->url($img);
                    })
                    ->disk('public'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Fasilitas')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug'),
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
            'index'  => Pages\ListFacilities::route('/'),
            'create' => Pages\CreateFacility::route('/create'),
            'edit'   => Pages\EditFacility::route('/{record}/edit'),
        ];
    }
}
