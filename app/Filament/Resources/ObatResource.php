<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ObatResource\Pages;
use App\Models\Obat;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;


class ObatResource extends Resource
{
    protected static ?string $model = Obat::class;

    public static function canAccess(): bool
    {
        return auth()->user()?->hasRole('admin');
    }

    public static function canCreate(): bool
    {
        return auth()->user()->hasRole('admin');
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()->hasRole('admin');
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()->hasRole('admin');
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Manajemen Obat';
    protected static ?string $pluralLabel = 'Obat';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Obat')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('kategori')
                    ->label('Kategori')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('stok')
                    ->label('Stok')
                    ->required()
                    ->numeric(),

                Forms\Components\TextInput::make('harga')
                    ->label('Harga (Rp)')
                    ->required()
                    ->numeric(),

                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Obat')
                    ->searchable(),

                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->sortable(),

                Tables\Columns\TextColumn::make('stok')
                    ->label('Stok')
                    ->sortable(),

                Tables\Columns\TextColumn::make('harga')
                    ->label('Harga (Rp)')
                    ->sortable()
                    ->formatStateUsing(fn($state) => 'Rp ' . number_format($state, 2, ',', '.')),
            ])
            ->filters([
                SelectFilter::make('kategori')
                    ->label('Filter Kategori')
                    ->options([
                        'Antibiotik' => 'Antibiotik',
                        'Analgesik' => 'Analgesik',
                        'Vitamin' => 'Vitamin',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListObats::route('/'),
            'create' => Pages\CreateObat::route('/create'),
            'edit' => Pages\EditObat::route('/{record}/edit'),
        ];
    }
}
