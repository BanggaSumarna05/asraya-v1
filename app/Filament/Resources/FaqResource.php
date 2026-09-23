<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Models\Faq;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;
    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $navigationLabel = 'FAQ';
    protected static ?string $navigationGroup = 'Konten Website';
    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('category')
                ->label('Kategori')
                ->options([
                    'general'  => 'Umum',
                    'specs'    => 'Spesifikasi',
                    'facility' => 'Fasilitas',
                    'purchase' => 'Pembelian',
                ])
                ->required(),
            Forms\Components\Textarea::make('question')
                ->label('Pertanyaan')
                ->required()
                ->rows(3),
            Forms\Components\Textarea::make('answer')
                ->label('Jawaban')
                ->required()
                ->rows(5),
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
                Tables\Columns\BadgeColumn::make('category')
                    ->label('Kategori')
                    ->colors([
                        'primary' => 'general',
                        'success' => 'specs',
                        'warning' => 'facility',
                        'danger'  => 'purchase',
                    ])
                    ->enum([
                        'general'  => 'Umum',
                        'specs'    => 'Spesifikasi',
                        'facility' => 'Fasilitas',
                        'purchase' => 'Pembelian',
                    ]),
                Tables\Columns\TextColumn::make('question')
                    ->label('Pertanyaan')
                    ->limit(60)
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'general'  => 'Umum',
                        'specs'    => 'Spesifikasi',
                        'facility' => 'Fasilitas',
                        'purchase' => 'Pembelian',
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
            'index'  => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit'   => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
