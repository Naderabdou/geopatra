<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\OurValue;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\OurValueResource\Pages;

class OurValueResource extends Resource
{
    protected static ?string $model = OurValue::class;

    protected static ?string $navigationIcon = 'icon-value';

    public static function getModelLabel(): string
    {
        return __('Our Value');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Our Values');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Section::make(__('Main Information'))
                        ->description(__('This is the main information about the Our Value'))
                        ->collapsible(true)
                        ->schema([
                            TextInput::make('name_ar')
                                ->label(__('Name (Arabic)'))
                                ->minLength(3)
                                ->regex('/^[\p{Arabic}\p{N}\s]+$/u')
                                ->maxLength(255)
                                ->required(),

                            TextInput::make('name_en')
                                ->label(__('Name (English)'))
                                ->minLength(3)
                                ->regex('/^[a-zA-Z0-9\s]+$/u')
                                ->maxLength(255)
                                ->required(),

                            Textarea::make('description_ar')
                                ->label(__('Description (Arabic)'))
                                ->rows(4),

                            Textarea::make('description_en')
                                ->label(__('Description (English)'))
                                ->rows(4),

                            FileUpload::make('icon')
                                ->label(__('icon'))
                                ->image()
                                ->reorderable()
                                ->disk('public')
                                ->columnSpanFull()
                                ->directory('our-values')
                                ->required(),

                        ])
                        ->columns(2),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading(__('No Our Values Found'))
            ->emptyStateDescription(__('Start by creating a new Our Value.'))
            ->emptyStateIcon('icon-value')
            ->striped()
            ->heading(__('Our Values'))
            ->description(__('Our Values are the main organizational structures.'))
            ->modifyQueryUsing(function (Builder $query) {
                return $query->latest('created_at');
            })
            ->columns([
                ImageColumn::make('icon')
                    ->label(__('icon'))
                    ->circular()
                    ->stacked(),

                TextColumn::make('name_' . app()->getLocale())
                    ->label(__('Name'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description_' . app()->getLocale())
                    ->label(__('Description'))
                    ->limit(50)
                    ->wrap(),

            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
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
            'index' => Pages\ListOurValues::route('/'),
            'create' => Pages\CreateOurValue::route('/create'),
            'edit' => Pages\EditOurValue::route('/{record}/edit'),
        ];
    }
}
