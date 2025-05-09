<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LowonganKerjaResource\Pages;
use App\Filament\Resources\LowonganKerjaResource\RelationManagers;
use App\Models\LowonganKerja;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LowonganKerjaResource extends Resource
{
    protected static ?string $model = LowonganKerja::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('posisi')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\MarkDownEditor::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('tanggal_diposting')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_berakhir')
                    ->required(),
                Forms\Components\FileUpload::make('gambar')
                    ->image()
                    ->directory('uploads/info-alumni') // Simpan di storage/app/public/uploads/info-alumni
                    ->required(),
                Forms\Components\TextInput::make('tags')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('posisi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_diposting')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_berakhir')
                    ->date(),
                // Menampilkan gambar
                Tables\Columns\ImageColumn::make('gambar')
                    ->disk('public') // Menggunakan penyimpanan publik
                    ->getStateUsing(fn ($record) => $record->gambar ? asset('storage/' . $record->gambar) : null)
                    ->square()
                    ->label('Gambar'),
                Tables\Columns\TextColumn::make('tags')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()  // Menambahkan tombol hapus
                    ->label('Hapus') // Label tombol hapus
                    ->color('danger') // Mengubah warna tombol menjadi merah
                    ->icon('heroicon-o-trash') // Ikon trash
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
            'index' => Pages\ListLowonganKerjas::route('/'),
            'create' => Pages\CreateLowonganKerja::route('/create'),
            'edit' => Pages\EditLowonganKerja::route('/{record}/edit'),
        ];
    }
}
