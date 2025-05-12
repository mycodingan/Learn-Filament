<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FakturModelResource\Pages;
use App\Filament\Resources\FakturModelResource\RelationManagers;
use App\Models\FakturModel;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FakturModelResource extends Resource
{
    protected static ?string $model = FakturModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Faktur';

    protected static ?string $label = 'faktur';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kode_faktur'),
                DatePicker::make('tanggal_faktur'),
                TextInput::make('kode_cutomer'),
                Select::make('cutomer_id')
                    ->relationship('customer', 'nama_customer') // nama kolom utama
                    ->getOptionLabelFromRecordUsing(fn($record) => $record->nama_customer . ' - ' . $record->kode_customer)
                    ->searchable()
                    ->preload(),
                Repeater::make('detail')
                ->relationship()
                ->schema([
                    Select::make('barang_id')
                    ->relationship('barang' ,'nama_barang'),
                    TextInput::make('diskon')
                    ->numeric(),
                    Textinput::make('nama_barang'),
                    Textinput::make('harga')
                    ->numeric(),
                    TextInput::make('subtotal')
                    ->numeric(),
                    Textinput::make('qty')
                    ->numeric(),
                    Textinput::make('hasil_qty')
                    ->numeric(),
                    
                ]),
                TextInput::make('ket_faktur'),
                TextInput::make('total'),
                TextInput::make('nominal_charge'),
                TextInput::make('total_final'),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_faktur')
                ->label('nama'),
                TextColumn::make('tanggal_faktur'),
                TextColumn::make('kode_cutomer'),
                // cara memanggil data relasi dari customer
                TextColumn::make('customer.nama_customer'),
                TextColumn::make('ket_faktur'),
                TextColumn::make('total'),
                TextColumn::make('nominal_charge'),
                TextColumn::make('total_final'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
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
            'index' => Pages\ListFakturModels::route('/'),
            'create' => Pages\CreateFakturModel::route('/create'),
            'edit' => Pages\EditFakturModel::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
