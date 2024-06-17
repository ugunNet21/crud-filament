<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                ->required()
                ->maxLength(255),
            Textarea::make('content')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }


}


// class PostResource extends Resource
// {
//     protected static ?string $model = Post::class;

//     public static function form(Form $form): Form
//     {
//         return $form
//             ->schema([
//                 TextInput::make('title')
//                     ->required()
//                     ->maxLength(255),
//                 Textarea::make('content')
//                     ->required(),
//             ]);
//     }

//     public static function table(Table $table): Table
//     {
//         return $table
//             ->columns([
//                 TextColumn::make('title')->sortable()->searchable(),
//                 TextColumn::make('created_at')->dateTime(),
//             ])
//             ->filters([
//                 //
//             ]);
//     }

//     public static function getPages(): array
//     {
//         return [
//             'index' => Pages\ListPosts::route('/'),
//             'create' => Pages\CreatePost::route('/create'),
//             'edit' => Pages\EditPost::route('/{record}/edit'),
//         ];
//     }
// }
