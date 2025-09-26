<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Service;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ServiceResource\Pages;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'icon-service';
    public static function getModelLabel(): string
    {
        return __('Service');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Services');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([

                    Section::make(__('Basic Information'))
                        ->collapsible(true)
                        ->schema([
                            TextInput::make('name_ar')
                                ->label(__('Name (Arabic)'))
                                ->minLength(3)
                                ->maxLength(255)
                                ->required()
                                ->unique(ignoreRecord: true),

                            TextInput::make('name_en')
                                ->label(__('Name (English)'))
                                ->minLength(3)
                                ->maxLength(255)
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->lazy()
                                ->afterStateUpdated(function (Set $set, ?string $state) {
                                    $set('slug', str()->slug($state));
                                }),

                            TextInput::make('slug')
                                ->label(__('Slug'))
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->disabled()
                                ->dehydrated(),
                        ])->columns(3),

                    Section::make(__('Descriptions Information'))
                        ->collapsible(true)
                        ->schema([
                            RichEditor::make('short_desc_ar')
                                ->label(__('Short Description (Arabic)'))
                                ->required(),

                            RichEditor::make('short_desc_en')
                                ->label(__('Short Description (English)'))
                                ->required(),
                            RichEditor::make('long_desc_ar')
                                ->label(__('Long Description (Arabic)'))
                                ->required(),

                            RichEditor::make('long_desc_en')
                                ->label(__('Long Description (English)'))
                                ->required(),
                        ])->columns(2),


                    Section::make(__('Image'))
                        ->collapsible(true)
                        ->schema([
                            FileUpload::make('image')
                                ->label(__('Image'))
                                ->disk('public')
                                ->directory('blogs')
                                ->image()
                                ->columnSpanFull()
                                ->reorderable()
                                ->required(),
                        ]),
                    Section::make(__('Service Details'))
                        ->collapsible(true)
                        ->schema([
                            Repeater::make(__('Service Details'))
                                ->label(__('Service Details'))
                                ->relationship('details')
                                ->grid(1)
                                ->minItems(2)
                                ->required()
                                ->collapsible()
                                ->addActionLabel(__('Add Service Detail'))
                                ->defaultItems(2)

                                ->schema([
                                    TextInput::make('name_ar')
                                        ->label(__('Name (Arabic)'))
                                        ->minLength(3)
                                        ->maxLength(255)
                                        ->required(),

                                    TextInput::make('name_en')
                                        ->label(__('Name (English)'))
                                        ->minLength(3)
                                        ->maxLength(255)
                                        ->required(),

                                    Textarea::make('desc_ar')
                                        ->label(__('Description (Arabic)'))
                                        ->autofocus()
                                        ->extraAttributes(['dir' => 'rtl'])
                                        ->minLength(3)
                                        ->maxLength(255)
                                        ->rows(6)
                                        ->required(),
                                    Textarea::make('desc_en')
                                        ->label(__('Description (English)'))
                                        ->autofocus()
                                        ->extraAttributes(['dir' => 'ltr'])
                                        ->minLength(3)
                                        ->maxLength(255)
                                        ->rows(6)
                                        ->required(),
                                    FileUpload::make('icon')
                                        ->label(__('Icon'))
                                        ->disk('public')
                                        ->directory('blogs')
                                        ->image()
                                        ->columnSpanFull()
                                        ->reorderable()
                                        ->required(),

                                ])->columns(2),
                        ])->columns(1),

                ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading(__('No Items Found'))
            ->emptyStateDescription(__('Try creating a new item.'))
            ->emptyStateIcon('heroicon-o-photo')
            ->striped()
            ->heading(__('Items'))
            ->description(__('Items are the main content of the website.'))
            ->modifyQueryUsing(fn(Builder $query) => $query->latest('created_at'))
            ->columns([

                ImageColumn::make('image')
                    ->label(__('Image'))
                    ->circular()
                    ->stacked()
                    ->disk('public'),

                TextColumn::make('name_' . app()->getLocale())
                    ->searchable()
                    ->label(__('Name')),

                TextColumn::make('short_desc_' . app()->getLocale())
                    ->label(__('Short Description'))
                    ->html()
                    ->wrap()
                    ->words(20),

                TextColumn::make('long_desc_' . app()->getLocale())
                    ->label(__('Long Description'))
                    ->html()
                    ->wrap()
                    ->words(30),

                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
