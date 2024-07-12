<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use PhpParser\Node\Stmt\Label;
use Filament\Tables\Columns\ImageColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nom')->label('Nom')->required(),
                TextInput::make('price')->Label('Prix')->required(),
                Select::make('category_id')
                ->relationship(name:'category', titleAttribute:'name')
                ->required(),
                //champ select appartir de la table category
                FileUpload::make('images')->multiple()
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category_id')->sortable()->searchable(),
                ImageColumn::make('images')
                                    ->circular()
                                    ->stacked()
                                    ->limit(3),
                Tables\Columns\TextColumn::make('nom')
                ->description(fn (Product $record): string=>substr($record->description, 0 , 20) )
                ->label('Nom')
                ->searchable()
                ->sortable(),
                // formaté la taille de la description affiché 
                Tables\Columns\TextColumn::make('price')->sortable()->searchable(), 

                //
            ])
            ->filters([
                SelectFilter::make('Category_id')
                                    ->relationship('category', 'name'),
                //trie par categorie en utilisant la relation
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
