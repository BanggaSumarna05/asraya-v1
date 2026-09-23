<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSliderResource\Pages;
use App\Models\HeroSlider;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Storage;

class HeroSliderResource extends Resource
{
    protected static ?string $model = HeroSlider::class;
    protected static ?string $navigationIcon = 'heroicon-o-photograph';
    protected static ?string $navigationLabel = 'Hero Slider';
    protected static ?string $navigationGroup = 'Konten Website';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('image')
                ->label('Gambar Slider')
                ->image()
                ->disk('public')
                ->directory('hero-sliders')
                ->required(),
            Forms\Components\TextInput::make('caption')
                ->label('Keterangan')
                ->maxLength(255),
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
                Tables\Columns\ImageColumn::make('image')
                    ->label('Preview')
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
            'index'  => Pages\ListHeroSliders::route('/'),
            'create' => Pages\CreateHeroSlider::route('/create'),
            'edit'   => Pages\EditHeroSlider::route('/{record}/edit'),
        ];
    }
}
