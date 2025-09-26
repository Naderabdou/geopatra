<?php

namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Tables\Table;
use App\Models\ServiceRequest;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ServiceRequestResource\Pages;

class ServiceRequestResource extends Resource
{
    protected static ?string $model = ServiceRequest::class;
    protected static ?string $navigationIcon = 'icon-service';
    public static function getModelLabel(): string
    {
        return __('Service Request');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Services Requests');
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
                    ->url(fn(ServiceRequest $record) => 'mailto:' . $record->email, true), // Redirect to email
                TextColumn::make('phone')
                    ->label(__('phone'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('service.name_' . app()->getLocale())
                    ->label(__('service'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('message')
                    ->label(__('message'))
                    ->searchable()
                    ->words(50)
                    ->wrap()
                    ->sortable(),
                TextColumn::make('is_replied')
                    ->label(__('isReply'))
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(function (ServiceRequest $record) {
                        return $record->is_replied == 1 ? __('is replied') : __('not replied');
                    })
                    ->color(fn(string $state): string => match ($state) {

                        '1' => 'success',
                        '0' => 'danger',
                    })
                    ->badge(),
                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([

                SelectFilter::make('isReply')
                    ->label(__('filter by Replay'))

                    ->options([
                        '1' => __('is replied'),
                        '0' => __('not replied'),
                    ]),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServiceRequests::route('/'),
            // 'create' => Pages\CreateServiceRequest::route('/create'),
            // 'edit' => Pages\EditServiceRequest::route('/{record}/edit'),
        ];
    }
}
