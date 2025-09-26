<?php

namespace App\Filament\Resources;

use App\Models\Join;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\JoinResource\Pages;

class JoinResource extends Resource
{
    protected static ?string $model = Join::class;

    protected static ?string $navigationIcon = 'icon-service';
    public static function getModelLabel(): string
    {
        return __('Join Us');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Join Us');
    }


    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                return $query->latest('created_at');
            })
            ->columns([
                TextColumn::make('name')
                    ->label(__('name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label(__('email'))
                    ->searchable()
                    ->sortable()
                    ->url(fn(join $record) => 'mailto:' . $record->email, true), // Redirect to email
                TextColumn::make('phone')
                    ->label(__('phone'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('position')
                    ->label(__('position'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('linkedin')
                    ->label(__('linkedin'))
                    ->url(fn(join $record) => $record->linkedin, true)
                    ->searchable()
                    ->sortable(),
                IconColumn::make('cv')
                    ->label(__('CV'))
                    ->icon('heroicon-o-document-text')
                    ->url(fn($record) => $record->cv_url, true)
                    ->openUrlInNewTab()
                    ->tooltip('عرض السيرة الذاتية')
                    ->extraAttributes(['class' => 'text-blue-600 cursor-pointer']),
                TextColumn::make('message')
                    ->label(__('message'))
                    ->searchable()
                    ->words(50)
                    ->wrap()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])

            ->actions([
                Tables\Actions\ActionGroup::make([

                    // Action::make('Send Reply')
                    //     ->label(__('Send Reply'))
                    //     ->form([
                    //         Textarea::make('reply')
                    //             ->label(__('Reply'))
                    //             ->minLength(3)

                    //             ->columnSpan(3)
                    //             ->rows(5)
                    //             ->required(),
                    //     ])
                    //     ->action(function (ServiceRequest $contact, array $data) {

                    //         //  Mail::to($contact->email)->send(new MeqeedMail($data));

                    //         $contact->isReply = 1;
                    //         $contact->save();

                    //         Notification::make()
                    //             ->title(__('Reply Sent Successfully'))
                    //             ->success()
                    //             ->icon('heroicon-o-inbox')
                    //             ->iconColor('success')

                    //             ->send();
                    //     })->icon('heroicon-o-chat-bubble-left-right'),
                ]),

            ])

            ->bulkActions(
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),

                ]),
            );
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJoins::route('/'),
        ];
    }
}
