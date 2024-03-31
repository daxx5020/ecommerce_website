<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('discounted_price')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('main_price')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('category_id')
                ->label('Category')
                ->options(function (callable $get) {
                    return Category::all()->mapWithKeys(function ($category) {
                        return [$category->id => $category->name];
                    });
                })
                ->required(),
                Forms\Components\TextInput::make('SKU')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('reviews')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('short_description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('size')
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('discounted_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('main_price')
                    ->numeric()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('category_id')
                    ->label('Category')
                    ->getStateUsing(function (Product $record) {
                        return $record->category->name ?? 'No Category';
                    })->searchable(),
                Tables\Columns\TextColumn::make('SKU')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reviews')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('size')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
            ])
            ->filters([
                //
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
