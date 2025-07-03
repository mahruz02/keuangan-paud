<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagihanMuridResource\Pages;
use App\Filament\Resources\TagihanMuridResource\RelationManagers;
use App\Models\TagihanMurid;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TagihanMuridResource extends Resource
{
    protected static ?string $model = TagihanMurid::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('murid_id')
                    ->relationship('murid', 'nama')
                    ->required(),
                Forms\Components\Select::make('tagihan_id')
                    ->relationship('tagihan', 'nama_tagihan')
                    ->required(),
                Forms\Components\TextInput::make('jumlah_tagihan')->numeric()->required(),
                Forms\Components\TextInput::make('jumlah_terbayar')->numeric()->required(),
                Forms\Components\DatePicker::make('tanggal_jatuh_tempo')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('murid.nama'),
                Tables\Columns\TextColumn::make('tagihan.nama_tagihan'),
                Tables\Columns\TextColumn::make('jumlah_tagihan'),
                Tables\Columns\TextColumn::make('jumlah_terbayar'),
                Tables\Columns\TextColumn::make('tanggal_jatuh_tempo'),
                Tables\Columns\TextColumn::make('status'),
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
            'index' => Pages\ListTagihanMurids::route('/'),
            'create' => Pages\CreateTagihanMurid::route('/create'),
            'edit' => Pages\EditTagihanMurid::route('/{record}/edit'),
        ];
    }
}
