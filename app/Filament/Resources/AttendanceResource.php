<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Filament\Resources\AttendanceResource\RelationManagers;
use App\Models\Attendance;
use App\Models\Event;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
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
                Section::make([
                    Forms\Components\Select::make('event_id')
                        ->label("Event")
                        ->options(Event::all()->pluck('name', 'id'))
                        ->native(false)
                        ->searchable()
                        ->preload()
                        ->required()
                        ->afterStateUpdated(function (?string $state, Set $set) {
                            $dateRange = self::getdaysAttendingRange($state);
                            $set('dates_attending', $dateRange);
                        })
                        ->live(),
                    Forms\Components\Select::make('user_id')
                        ->label('User')
                        ->relationship(name: 'user', titleAttribute: 'name')
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->required(),
                            Forms\Components\TextInput::make('email')
                                ->email()
                                ->required(),
                            Forms\Components\TextInput::make('password')
                                ->password()
                                ->required(),
                        ])
                        ->required(),
                    Forms\Components\Toggle::make('in_person'),
                    Forms\Components\Toggle::make('requires_feeding'),
                    Forms\Components\Toggle::make('requires_accommodation'),
                    Forms\Components\Toggle::make('requires_transport'),
                    // Forms\Components\Textarea::make('services_required')
                    //     ->columnSpanFull(),
                    Forms\Components\Select::make('dates_attending')
                        ->multiple()
                        ->preload()
                        ->columnSpanFull(),
                ])
                    ->columns(2),
                Section::make([
                    Forms\Components\Repeater::make('children')
                        ->schema([
                            Forms\Components\TextInput::make('first_name')->required()->label('First name'),
                            Forms\Components\TextInput::make('last_name')->required()->label('Last name'),
                            Forms\Components\TagsInput::make('allergies'),
                            Forms\Components\TextInput::make('emergency_contact')->numeric(),
                        ])
                        ->defaultItems(0)
                        ->columnSpanFull()
                        ->collapsible()
                        ->collapsed()
                        ->columns(2),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->numeric()
                    ->sortable(),
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

                SelectFilter::make('event')
                    ->relationship('event', 'name')
                    ->options(Event::all()->pluck('name', 'id')),
                Filter::make('in_person')
                    ->query(fn (Builder $query): Builder => $query->where('in_person', true)),
                Filter::make('requires_feeding')
                    ->query(fn (Builder $query): Builder => $query->where('requires_feeding', true)),
                Filter::make('requires_accommodation')
                    ->query(fn (Builder $query): Builder => $query->where('requires_accommodation', true)),
                Filter::make('requires_transport')
                    ->query(fn (Builder $query): Builder => $query->where('requires_transport', true)),
                Filter::make('checked_in')
                    ->query(fn (Builder $query): Builder => $query->where('checked_in', true)),
            ])
            ->filtersFormColumns(1)
            ->actions([
                Tables\Actions\ViewAction::make(),
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

    static function getdaysAttendingRange($eventId): array
    {
        $event = Event::find($eventId);

        $startDate = Carbon::parse($event->start_date);
        $endDate = Carbon::parse($event->end_date);

        // Generate the date range
        $dateRange = [];
        while ($startDate->lte($endDate)) {
            $dateRange[] = $startDate->toDateString();
            $startDate->addDay(); // Increment the date by one day
        }

        return $dateRange;
    }
}
