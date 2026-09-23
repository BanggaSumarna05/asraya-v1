<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryImageResource\Pages;
use App\Models\GalleryImage;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Storage;

class GalleryImageResource extends Resource
{
    protected static ?string $model = GalleryImage::class;
    protected static ?string $navigationIcon = 'heroicon-o-view-grid';
    protected static ?string $navigationLabel = 'Galeri';
    protected static ?string $navigationGroup = 'Konten Website';
    protected static ?int $navigationSort = 9;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('image')
                ->label('Foto')
                ->image()
                ->disk('public')
                ->directory('gallery')
                ->required(),
            Forms\Components\TextInput::make('caption')
                ->label('Keterangan')
                ->maxLength(255),
            Forms\Components\Select::make('category')
                ->label('Kategori')
                ->options([
                    'lifestyle' => 'Lifestyle',
                    'exterior'  => 'Eksterior & Lingkungan',
                    'interior'  => 'Interior',
                    'render'    => 'Render Arsitektur',
                ]),
            Forms\Components\TextInput::make('order')
                ->label('Urutan')
                ->numeric()
                ->default(0),
            Forms\Components\Toggle::make('is_active')
                ->label('Tampilkan di Galeri')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto')
                    ->getStateUsing(function ($record) {
                        $img = $record->image;
                        // Path lama: dimulai dengan '/' atau 'img/' → langsung URL public
                        if (str_starts_with($img, '/') || str_starts_with($img, 'img/')) {
                            return url(ltrim($img, '/'));
                        }
                        // Path baru: storage/app/public/...
                        return Storage::disk('public')->url($img);
                    })
                    ->disk('public'),
                Tables\Columns\TextColumn::make('caption')
                    ->label('Keterangan')
                    ->limit(40),
                Tables\Columns\BadgeColumn::make('category')
                    ->label('Kategori')
                    ->colors([
                        'primary' => 'lifestyle',
                        'success' => 'exterior',
                        'warning' => 'interior',
                        'danger'  => 'render',
                    ])
                    ->enum([
                        'lifestyle' => 'Lifestyle',
                        'exterior'  => 'Eksterior',
                        'interior'  => 'Interior',
                        'render'    => 'Render',
                    ]),
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Tampil')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'lifestyle' => 'Lifestyle',
                        'exterior'  => 'Eksterior',
                        'interior'  => 'Interior',
                        'render'    => 'Render',
                    ]),
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
            'index'  => Pages\ListGalleryImages::route('/'),
            'create' => Pages\CreateGalleryImage::route('/create'),
            'edit'   => Pages\EditGalleryImage::route('/{record}/edit'),
        ];
    }
}
