<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IgFeedResource\Pages;
use App\Models\IgFeed;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Storage;

class IgFeedResource extends Resource
{
    protected static ?string $model = IgFeed::class;
    protected static ?string $navigationIcon = 'heroicon-o-camera';
    protected static ?string $navigationLabel = 'IG Feed';
    protected static ?string $navigationGroup = 'Konten Website';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('image')
                ->label('Foto IG')
                ->image()
                ->disk('public')
                ->directory('ig-feeds')
                ->required(),
            Forms\Components\TextInput::make('caption')
                ->label('Caption')
                ->maxLength(255),
            Forms\Components\TextInput::make('link')
                ->label('Link Instagram')
                ->url()
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
                    ->label('Foto')
                    ->getStateUsing(function ($record) {
                        $img = $record->image;
                        if (str_starts_with($img, '/') || str_starts_with($img, 'img/')) {
                            return url(ltrim($img, '/'));
                        }
                        return Storage::disk('public')->url($img);
                    })
                    ->disk('public'),
                Tables\Columns\TextColumn::make('caption')
                    ->label('Caption')
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
            'index'  => Pages\ListIgFeeds::route('/'),
            'create' => Pages\CreateIgFeed::route('/create'),
            'edit'   => Pages\EditIgFeed::route('/{record}/edit'),
        ];
    }
}
