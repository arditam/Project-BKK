<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumniResource\Pages;
use App\Models\Alumni;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Navigation\NavigationItem;
use Illuminate\Database\Eloquent\Builder;

class AlumniResource extends Resource
{
    protected static ?string $model = Alumni::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group'; // Ikon untuk resource

    // Group navigation under "Data Alumni"
    public static function getNavigationGroup(): ?string
{
    return 'Data Alumni'; // Grup tanpa ikon
}

public static function getNavigationItems(): array
{
    return [
        NavigationItem::make('Bekerja')
            ->group('Data Alumni') // Item tanpa ikon
            ->url(static::getNavigationUrl() . '?status=kerja'),

        NavigationItem::make('Wirausaha')
            ->group('Data Alumni') // Item tanpa ikon
            ->url(static::getNavigationUrl() . '?status=wirausaha'),

        NavigationItem::make('Kuliah')
            ->group('Data Alumni') // Item tanpa ikon
            ->url(static::getNavigationUrl() . '?status=kuliah'),

        NavigationItem::make('Menganggur')
            ->group('Data Alumni') // Item tanpa ikon
            ->url(static::getNavigationUrl() . '?status=tidak'),
    ];
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nisn')->required()->maxLength(255),
                Forms\Components\TextInput::make('nama')->required()->maxLength(255),
                Forms\Components\TextInput::make('email')->email()->required()->maxLength(255),
                Forms\Components\TextInput::make('no_hp')->required()->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options([
                        'Kerja' => 'Bekerja',
                        'Wirausaha' => 'Wirausaha',
                        'Kuliah' => 'Kuliah',
                        'Tidak' => 'Menganggur',
                    ])
                    ->required(),
            ]);
    }

    public static function canCreate(): bool
{
    return false; // Menonaktifkan tombol Create
}

public static function table(Table $table): Table
{
    $status = request()->query('status');

    return $table
        ->columns([
            Tables\Columns\TextColumn::make('nisn')->searchable(),
            Tables\Columns\TextColumn::make('nama')->searchable(),
            Tables\Columns\TextColumn::make('alamat')->searchable(),
            Tables\Columns\TextColumn::make('email')->searchable(),
            Tables\Columns\TextColumn::make('no_hp')->searchable(),
            Tables\Columns\TextColumn::make('jurusan')->searchable(),
            Tables\Columns\TextColumn::make('tahun_lulus')->searchable(),
            ...match ($status) {
                'kerja' => [
                    Tables\Columns\TextColumn::make('profesi')->searchable(),
                    Tables\Columns\TextColumn::make('jabatan')->searchable(),
                    Tables\Columns\TextColumn::make('lokasi_kerja')->searchable(),
                    Tables\Columns\TextColumn::make('gaji_kerja')->numeric()->searchable(),
                    Tables\Columns\TextColumn::make('alasan_kerja')->searchable(),
                ],
                'kuliah' => [
                    Tables\Columns\TextColumn::make('kampus')->searchable(),
                    Tables\Columns\TextColumn::make('jurusan_kuliah')->searchable(),
                    Tables\Columns\TextColumn::make('lokasi_kuliah')->searchable(),
                    Tables\Columns\TextColumn::make('alasan_kuliah')->searchable(),
                ],
                'wirausaha' => [
                    Tables\Columns\TextColumn::make('bidang_usaha')->searchable(),
                    Tables\Columns\TextColumn::make('lokasi_wirausaha')->searchable(),
                    Tables\Columns\TextColumn::make('gaji_wirausaha')->numeric()->searchable(),
                    Tables\Columns\TextColumn::make('alasan_wirausaha')->searchable(),
                ],
                default => [],
            },
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('status')
                ->label('Status Alumni')
                ->options([
                    'Kerja' => 'Bekerja',
                    'Wirausaha' => 'Wirausaha',
                    'Kuliah' => 'Kuliah',
                    'Tidak' => 'Menganggur',
                ])
                ->query(function (Builder $query, array $data) {
                    if (isset($data['value'])) {
                        return $query->where('status', $data['value']);
                    }
                    return $query;
                }),
        ])
        ->actions([
            Tables\Actions\EditAction::make()->hidden(), // Menyembunyikan tombol Edit
            Tables\Actions\DeleteAction::make(), // Menampilkan tombol Delete
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(), // Tetap menampilkan aksi Delete
            ]),
        ])
        ->modifyQueryUsing(function (Builder $query) {
            $status = request()->query('status');
            if ($status) {
                $query->where('status', $status);
            }
            return $query;
        });
}

public static function getPages(): array
{
    return [
        'index' => Pages\ListAlumnis::route('/'),
    ];
}

}