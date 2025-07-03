<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiKasResource\Pages;
use App\Filament\Resources\TransaksiKasResource\RelationManagers;
use App\Models\TransaksiKas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransaksiKasResource extends Resource
{
    protected static ?string $model = TransaksiKas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('keterangan')->required(),
                Forms\Components\TextInput::make('jumlah')->numeric()->required(),
                Forms\Components\Select::make('tipe')
                    ->options([
                        'pemasukan' => 'Pemasukan',
                        'pengeluaran' => 'Pengeluaran',
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('tanggal')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('keterangan'),
                Tables\Columns\TextColumn::make('jumlah'),
                Tables\Columns\TextColumn::make('tipe'),
                Tables\Columns\TextColumn::make('tanggal'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListTransaksiKas::route('/'),
            'create' => Pages\CreateTransaksiKas::route('/create'),
            'edit' => Pages\EditTransaksiKas::route('/{record}/edit'),
        ];
    }
}
