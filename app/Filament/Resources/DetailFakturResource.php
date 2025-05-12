<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetailFakturResource\Pages;
use App\Models\DetailFaktur;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class DetailFakturResource extends Resource
{
    protected static ?string $model = DetailFaktur::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->columns([
                        'default' => 1,
                        'sm' => 2,
                        'md' => 3,
                    ])
                    ->schema([
                        Forms\Components\TextInput::make('nama_barang')
                            ->label('Nama Barang')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('harga')
                            ->numeric()
                            ->required(),
                        Forms\Components\TextInput::make('qty')
                            ->numeric()
                            ->required(),
                        Forms\Components\TextInput::make('diskon')
                            ->numeric()
                            ->required(),
                        Forms\Components\TextInput::make('hasil_qty')
                            ->numeric()
                            ->disabled(),
                        Forms\Components\TextInput::make('subtotal')
                            ->numeric()
                            ->disabled(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('barang.nama_barang')
                    ->label('Nama Barang')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('nama_barang')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('harga')
                    ->label('Harga')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('diskon')
                    ->label('Diskon')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('qty')
                    ->label('Qty')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('hasil_qty')
                    ->label('Hasil Qty')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('subtotal')
                    ->label('Subtotal')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                // Tambahkan filter jika perlu
            ])
            ->actions([
                // Tambahkan action jika perlu (misalnya edit, view, delete)
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('nama_barang');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDetailFakturs::route('/'),
            // 'create' => Pages\CreateDetailFaktur::route('/create'),
            // 'edit' => Pages\EditDetailFaktur::route('/{record}/edit'),
        ];
    }
}
