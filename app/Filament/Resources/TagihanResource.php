<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagihanResource\Pages;
use App\Filament\Resources\TagihanResource\RelationManagers;
use App\Models\Tagihan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TagihanResource extends Resource
{
    protected static ?string $model = Tagihan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_tagihan')->required(),
                Forms\Components\TextInput::make('default_jumlah')->numeric()->required(),
                Forms\Components\Select::make('tipe_tagihan')
                    ->options([
                        'global' => 'Global',
                        'angkatan' => 'Per Angkatan',
                        'kelas' => 'Per Kelas',
                        'individu' => 'Per Murid',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('target_id')->numeric()->nullable(),
                Forms\Components\DatePicker::make('tanggal_jatuh_tempo')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_tagihan'),
                Tables\Columns\TextColumn::make('default_jumlah'),
                Tables\Columns\TextColumn::make('tipe_tagihan'),
                Tables\Columns\TextColumn::make('target_id'),
                Tables\Columns\TextColumn::make('tanggal_jatuh_tempo'),
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
            'index' => Pages\ListTagihans::route('/'),
            'create' => Pages\CreateTagihan::route('/create'),
            'edit' => Pages\EditTagihan::route('/{record}/edit'),
        ];
    }
}
