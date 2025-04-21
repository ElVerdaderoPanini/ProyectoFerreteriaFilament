<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\TextInput;
use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Administración';
    protected static ?string $label = 'Usuario';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required()
                ->label('Nombre'),
            TextInput::make('email')
                ->email()
                ->required()
                ->label('Correo electrónico'),
            TextInput::make('password')
                ->password()
                ->label('Contraseña')
                ->dehydrateStateUsing(fn ($state) => filled($state) ? bcrypt($state) : null)
                ->required(fn (string $context): bool => $context === 'create')
                ->maxLength(255),
            TextColumn::make('id_usuario')
                ->label('ID Usuario')
                ->sortable()
                ->copyable()
                ->copyMessage('ID copiado')
                ->copyMessageDuration(1500)
                ->wrap(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_usuario')->sortable()->label('ID Usuario')->formatStateUsing(fn($state) => substr($state, 0, 8)),
                TextColumn::make('name')->searchable()->label('Nombre'),
                TextColumn::make('email')->searchable()->label('Correo electrónico'),
                TextColumn::make('created_at')->dateTime('d/m/Y H:i')->label('Registrado'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
