<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaterialResource\Pages;
use App\Models\Material;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;

class MaterialResource extends Resource
{
    protected static ?string $model = Material::class;
    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $label = 'Material';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nombre')->required()->maxLength(255),
            TextInput::make('descripcion')->maxLength(1000),
            TextInput::make('cantidad')->numeric()->minValue(0)->default(0),
            TextInput::make('precio')
                ->numeric()
                ->minValue(0)
                ->step(0.01)
                ->required()
                ->label('Precio ₡'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_material')
                    ->label('ID Material')
                    ->sortable()
                    ->copyable()
                    ->copyMessage('ID copiado')
                    ->copyMessageDuration(1500)
                    ->wrap()
                    ->formatStateUsing(fn($state) => substr($state, 0, 8)),
                TextColumn::make('nombre')->searchable(),
                TextColumn::make('descripcion')->limit(30),
                TextColumn::make('cantidad')->sortable(),
                TextColumn::make('precio')
                    ->label('Precio ₡')
                    ->money('CRC', true) // Muestra el símbolo y formato de colones
                    ->sortable(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaterials::route('/'),
            'create' => Pages\CreateMaterial::route('/create'),
            'edit' => Pages\EditMaterial::route('/{record}/edit'),
        ];
    }
}
