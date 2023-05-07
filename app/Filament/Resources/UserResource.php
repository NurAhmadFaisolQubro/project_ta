<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Forms\Components\Card;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\Toggle;
use Livewire\Component;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Contracts\Hashing\Hasher;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make(name: 'name')
                    ->maxLength('255')
                    ->required(),
                    Toggle::make('admin')
                    ->onIcon('heroicon-s-lightning-bolt')
    ->offIcon('heroicon-s-user'),
                    Forms\Components\TextInput::make(name: 'email')
                    ->email()
                    ->required()
                    ->maxLength('255'),
                    Forms\Components\TextInput::make(name: 'password')
                    ->password()
                    ->maxLength('255')

                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))

                    // ->dehydrateStateUsing(static fn(null|string $state):
                    // null|string =>
                    // filled($state) ? Hash::make(state): null,
                    // )
                    // ->required(static fn(Pageb$livewire): string =>
                    // $livewire instanceof CreateUser,)
                    // ->dehydrated(static fn(null|string $state): bool =>
                    // filled($state),
                    // )
                    // ->label(static fn(Page $livewire): string =>
                    // ($livewire instanceof EditUser) ? 'New Password':'Password'
                    // )
            ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                    // Tables\Columns\ImageColumn::make('image')->disk('public')->searchable(),
                    Tables\Columns\TextColumn::make('name'),
                    IconColumn::make('admin')
                    ->boolean()
                    ->trueIcon('heroicon-o-badge-check')
                    ->falseIcon('heroicon-o-x-circle'),
                    Tables\Columns\TextColumn::make('email'),
                    Tables\Columns\TextColumn::make('created_at'),
                    Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d-M-Y'),
                    Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d-M-Y'),
                ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
