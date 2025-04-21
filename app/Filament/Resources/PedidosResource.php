<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PedidosResource\Pages;
use App\Models\Pedidos;
use App\Models\User;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;

class PedidosResource extends Resource
{
    protected static ?string $model = Pedidos::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $label = 'Pedidos';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('usuario_id') // Este es el campo para seleccionar al usuario
                ->label('Seleccionar Usuario')
                ->options(User::all()->pluck('name', 'id_usuario')->toArray()) // Usa 'name' y 'id_usuario' en pluck
                ->searchable() // Habilita búsqueda para filtrar usuarios
                ->required(),
    
            DatePicker::make('fecha')
                ->label('Fecha del Pedido')
                ->required(),
    
            TextInput::make('total')
                ->numeric()
                ->minValue(0)
                ->step(0.01)
                ->required()
                ->label('Monto Total'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID Pedido')
                    ->formatStateUsing(fn($state) => substr($state, 0, 8)) // Muestra solo parte del UUID
                    ->sortable()
                    ->copyable(),

                TextColumn::make('usuario.name')
                    ->label('Usuario')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('fecha')
                    ->label('Fecha')
                    ->date()
                    ->sortable(),

                TextColumn::make('total')
                    ->label('Total ₡')
                    ->money('CRC')
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
            'index' => Pages\ListPedidos::route('/'),
            'create' => Pages\CreatePedidos::route('/create'),
            'edit' => Pages\EditPedidos::route('/{record}/edit'),
        ];
    }
}
