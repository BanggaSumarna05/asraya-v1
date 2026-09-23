<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromoBannerResource\Pages;
use App\Filament\Resources\PromoBannerResource\RelationManagers;
use App\Models\PromoBanner;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class PromoBannerResource extends Resource
{
    protected static ?string $model = PromoBanner::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->label('Banner Image')
                    ->image()
                    ->disk('public')
                    ->required()
                    ->directory('promo-banners'),
                Forms\Components\TextInput::make('link')
                    ->label('Redirect Link')
                    ->url()
                    ->maxLength(255),
                Forms\Components\TextInput::make('order')
                    ->label('Sort Order')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->getStateUsing(function ($record) {
                        $img = $record->image;
                        if (!$img) return null;
                        if (str_starts_with($img, '/') || str_starts_with($img, 'img/') || str_starts_with($img, 'new/')) {
                            return url(ltrim($img, '/'));
                        }
                        return Storage::disk('public')->url($img);
                    })
                    ->disk('public'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link')
                    ->label('Link')
                    ->limit(30),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Order')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPromoBanners::route('/'),
            'create' => Pages\CreatePromoBanner::route('/create'),
            'edit' => Pages\EditPromoBanner::route('/{record}/edit'),
        ];
    }    
}
