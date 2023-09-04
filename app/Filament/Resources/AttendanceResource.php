<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Filament\Resources\AttendanceResource\RelationManagers;
use App\Models\Attendance;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('event_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('user_id')
                    ->required(),
                Forms\Components\Toggle::make('in_person')
                    ->required(),
                Forms\Components\Toggle::make('requires_feeding')
                    ->required(),
                Forms\Components\Toggle::make('requires_accommodation')
                    ->required(),
                Forms\Components\Toggle::make('requires_transport')
                    ->required(),
                Forms\Components\Textarea::make('services_required')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('children')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('dates_attending')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('checked_in')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->searchable(),
                Tables\Columns\IconColumn::make('in_person')
                    ->boolean(),
                Tables\Columns\IconColumn::make('requires_feeding')
                    ->boolean(),
                Tables\Columns\IconColumn::make('requires_accommodation')
                    ->boolean(),
                Tables\Columns\IconColumn::make('requires_transport')
                    ->boolean(),
                Tables\Columns\IconColumn::make('checked_in')
                    ->boolean(),
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
            'index' => Pages\ListAttendances::route('/'),
            'create' => Pages\CreateAttendance::route('/create'),
            'edit' => Pages\EditAttendance::route('/{record}/edit'),
        ];
    }    
}
