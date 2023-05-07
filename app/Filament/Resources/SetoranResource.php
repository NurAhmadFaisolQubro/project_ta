<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SetoranResource\Pages;
use App\Filament\Resources\SetoranResource\RelationManagers;
use App\Models\Setoran;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Resources\Table;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\FilamentExportBulkAction;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class SetoranResource extends Resource
{
    protected static ?string $model = Setoran::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Setoran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Forms\Components\TextInput::make(name: 'cabang')->required(),
                    Forms\Components\TextInput::make(name: 'name')->required(),
                    Forms\Components\TextInput::make(name: 'setoran')->required(),
                    Forms\Components\FileUpload::make('image')->disk('public')->required(),
                    Toggle::make('acc')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('cabang')->searchable(),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('setoran')->money($symbol = 'idr', $decimalSeparator = '.', $thousandSeparator = '.', $decimal = 2),
                IconColumn::make('acc')
                ->sortable()
                ->boolean()
                ->trueIcon('heroicon-o-badge-check')
                ->falseIcon('heroicon-o-x-circle')
                ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ]),
                ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                BulkAction::make('delete')
                ->action(fn (Collection $records) => $records->each->delete())
                ->deselectRecordsAfterCompletion()
                ->color('danger'),
                
                
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
            'index' => Pages\ListSetorans::route('/'),
            'create' => Pages\CreateSetoran::route('/create'),
            'edit' => Pages\EditSetoran::route('/{record}/edit'),
        ];
    }    
}
