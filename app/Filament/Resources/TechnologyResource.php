<?php

namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Technology;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TechnologyResource\Pages;

class TechnologyResource extends Resource
{
    protected static ?string $model = Technology::class;

    protected static ?string $navigationIcon = 'icon-technology';

    public static function getModelLabel(): string
    {
        return __('technology');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Technologies');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([

                    Section::make(__('General Information'))
                        ->collapsible(true)
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
                                ->lazy()
                                ->afterStateUpdated(function (Set $set, ?string $state) {
                                    $set('slug', str()->slug($state));
                                })
                                ->required(),
                            TextInput::make('slug')
                                ->label(__('Slug'))
                                ->unique(ignoreRecord: true)
                                ->disabled()
                                ->dehydrated()
                                ->required(),
                        ])->columns(3),

                    Section::make(__('Title Information'))
                        ->collapsible(true)
                        ->schema([
                            TextInput::make('title_ar')
                                ->label(__('Title (Arabic)'))
                                ->minLength(3)
                                ->maxLength(255)
                                ->required(),

                            TextInput::make('title_en')
                                ->label(__('Title (English)'))
                                ->minLength(3)
                                ->maxLength(255)
                                ->required(),
                            TagsInput::make('features_ar')
                                ->placeholder(__('Press enter to add a feature'))
                                ->label(__('Features (Arabic)')),
                            TagsInput::make('features_en')
                                ->placeholder(__('Press enter to add a feature'))
                                ->label(__('Features (English)')),
                        ])->columns(2),

                    Section::make(__('Description Information'))
                        ->collapsible(true)
                        ->schema([
                            RichEditor::make('desc_ar')
                                ->label(__('Description (Arabic)'))
                                ->required(),

                            RichEditor::make('desc_en')
                                ->label(__('Description (English)'))
                                ->required(),
                        ])->columns(2),
                    Section::make(__('Image & Icon'))
                        ->collapsible(true)
                        ->schema([
                            FileUpload::make('image')
                                ->label(__('Image'))
                                ->disk('public')
                                ->directory('items')
                                ->columnSpanFull()
                                ->image()
                                ->required(),

                            FileUpload::make('icon')
                                ->label(__('Icon'))
                                ->disk('public')
                                ->directory('items/icons')
                                ->columnSpanFull()
                                ->image()
                                ->required(),
                        ])->columns(2),
                ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading(__('No Items Found'))
            ->emptyStateDescription(__('Try creating a new item.'))
            ->emptyStateIcon('icon-technology')
            ->striped()
            ->heading(__('Items'))
            ->description(__('Manage the items shown on the website.'))
            ->modifyQueryUsing(fn(Builder $query) => $query->latest('created_at'))
            ->columns([

                ImageColumn::make('image')
                    ->label(__('Image'))
                    ->circular()
                    ->stacked(),

                ImageColumn::make('icon')
                    ->label(__('Icon'))
                    ->circular()
                    ->stacked(),

                TextColumn::make('name_' . app()->getLocale())
                    ->label(__('Name'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('title_' . app()->getLocale())
                    ->label(__('Title'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('desc_' . app()->getLocale())
                    ->label(__('Description'))
                    ->wrap()
                    ->html()
                    ->words(20),

                TextColumn::make('slug')
                    ->label(__('Slug'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime('d/m/Y H:i')
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
            'index' => Pages\ListTechnologies::route('/'),
            'create' => Pages\CreateTechnology::route('/create'),
            'edit' => Pages\EditTechnology::route('/{record}/edit'),
        ];
    }
}
