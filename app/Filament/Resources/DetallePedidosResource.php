<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetallePedidosResource\Pages;
use App\Models\DetallePedidos;
use App\Models\Pedidos;
use App\Models\Material;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;

class DetallePedidosResource extends Resource
{
    protected static ?string $model = DetallePedidos::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Gestión de Pedidos';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Select::make('pedido_id')
                   ->label('Pedido')
                   ->options(
                      \App\Models\Pedidos::all()->mapWithKeys(function ($pedidos) {
                          return [$pedidos->id => 'Pedido #' . Str::substr($pedidos->id, 0, 8)];
                     })
                   )
                   ->searchable()
                   ->required(),

             Select::make('material_id')
                   ->label('Material')
                   ->options(
                       \App\Models\Material::all()->mapWithKeys(function ($material) {
                           return [$material->id_material => $material->nombre . ' - ₡' . $material->precio];
                       })
                   )
                   ->searchable()
                   ->required(),
               

            TextInput::make('cantidad')
                ->label('Cantidad')
                ->numeric()
                ->minValue(1)
                ->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
{
    return $table
        ->columns([
            TextColumn::make('id')
                 ->label('ID Detalle Pedido')
                 ->formatStateUsing(fn ($state) => '#' . Str::substr($state, 0, 8)),

            TextColumn::make('pedido.id')
                ->label('ID Pedido')
                ->formatStateUsing(fn ($state) => 'Pedido #' . \Illuminate\Support\Str::substr($state, 0, 8)),

            TextColumn::make('material.nombre')
                ->label('Material'),

            TextColumn::make('cantidad')
                ->label('Cantidad'),

            TextColumn::make('created_at')
                ->label('Creado')
                ->dateTime(),
        ])
        ->filters([])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDetallePedidos::route('/'),
            'create' => Pages\CreateDetallePedidos::route('/create'),
            'edit' => Pages\EditDetallePedidos::route('/{record}/edit'),
        ];
    }
}
