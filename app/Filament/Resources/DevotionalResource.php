<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DevotionalResource\Pages;
use App\Filament\Resources\DevotionalResource\RelationManagers;
use App\Models\Devotional;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DevotionalResource extends Resource
{
    protected static ?string $model = Devotional::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('devotional_author_id')
                    ->native(false)
                    ->relationship(name: 'author', titleAttribute: 'author_name')
                    ->createOptionForm([
                        Forms\Components\TextInput::make('author_name')
                            ->required(),
                        Forms\Components\TextInput::make('contact_email')
                            ->required()
                            ->email(),
                        Forms\Components\TextInput::make('website')
                            ->required(),
                        Forms\Components\RichEditor::make('biography'),
                    ])
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('date')
                    ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('key_scripture')
                    ->string(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('author.author_name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListDevotionals::route('/'),
            'create' => Pages\CreateDevotional::route('/create'),
            'edit' => Pages\EditDevotional::route('/{record}/edit'),
        ];
    }
}
