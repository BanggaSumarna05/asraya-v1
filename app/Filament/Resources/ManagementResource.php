<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ManagementResource\Pages;
use App\Models\Management;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Storage;

class ManagementResource extends Resource
{
    protected static ?string $model = Management::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Tim Manajemen';
    protected static ?string $navigationGroup = 'Konten Website';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nama')
                ->required()
                ->maxLength(150),
            Forms\Components\TextInput::make('position')
                ->label('Jabatan')
                ->required()
                ->maxLength(150),
            Forms\Components\FileUpload::make('photo')
                ->label('Foto')
                ->image()
                ->disk('public')
                ->directory('managements')
                ->required(),
            Forms\Components\Textarea::make('bio')
                ->label('Biografi')
                ->rows(5),
            Forms\Components\TextInput::make('url_ref')
                ->label('URL Referensi')
                ->url()
                ->maxLength(255),
            Forms\Components\TextInput::make('url_ref_text')
                ->label('Teks Tombol Referensi')
                ->maxLength(100)
                ->placeholder('More Information'),
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
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Foto')
                    ->getStateUsing(function ($record) {
                        $img = $record->photo;
                        if (!$img) return null;
                        if (str_starts_with($img, '/') || str_starts_with($img, 'img/') || str_starts_with($img, 'new/')) {
                            return url(ltrim($img, '/'));
                        }
                        return Storage::disk('public')->url($img);
                    })
                    ->disk('public')
                    ->rounded(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('position')
                    ->label('Jabatan'),
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
            'index'  => Pages\ListManagements::route('/'),
            'create' => Pages\CreateManagement::route('/create'),
            'edit'   => Pages\EditManagement::route('/{record}/edit'),
        ];
    }
}
