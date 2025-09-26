<?php

namespace App\Filament\Resources;

use App\Models\Blog;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use FilamentTiptapEditor\TiptapEditor;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BlogResource\Pages;


class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'icon-blogger';
    protected static ?int $navigationSort = 7;


    public static function getModelLabel(): string
    {
        return __('Blog');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Blogs');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Section::make(__('Blog Information'))
                        ->collapsible(true)
                        ->schema([
                            TextInput::make('title_ar')
                                ->label(__('title_ar'))
                                ->minLength(3)
                                ->maxLength(255)
                                ->required(),

                            TextInput::make('title_en')
                                ->required()
                                ->label(__('title_en'))
                                ->minLength(3)
                                ->maxLength(255)
                                ->autofocus()
                                ->lazy()
                                ->afterStateUpdated(function (Set $set, ?string $state) {
                                    $set('slug', str()->slug($state));
                                }),
                            TextInput::make('slug')
                                ->required()

                                ->unique(Blog::class, 'slug', ignoreRecord: true)
                                ->disabled()
                                ->dehydrated(),

                        ])->columns(3),


                    Section::make(__('Description Information'))
                        ->collapsible(true)

                        ->schema([

                            // TiptapEditor::make('desc_ar')
                            //     ->label(__('Description (Arabic)'))
                            //     ->required()
                            //     ->extraInputAttributes(['style' => 'min-height: 12rem;']),

                            // TiptapEditor::make('desc_en')
                            //     ->label(__('Description (English)'))

                            //     ->required()
                            //     ->extraInputAttributes(['style' => 'min-height: 12rem;']),
                            RichEditor::make('desc_ar')
                                ->label(__('Description (Arabic)'))
                                ->required(),
                            RichEditor::make('desc_en')
                                ->label(__('Description (English)'))
                                ->required(),


                        ]),

                    Section::make(__('Images Information'))
                        ->collapsible(true)
                        ->schema([
                            FileUpload::make('image')
                                ->label(__('image'))
                                ->disk('public')->directory('blogs')
                                ->columnSpanFull()
                                ->reorderable()
                                ->image()
                                ->required(),
                        ]),




                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading(__('No Blogs Found'))
            ->emptyStateDescription(__('Try creating a new blog.'))
            ->emptyStateIcon('icon-blogger')
            ->striped()
            ->heading(__('Blogs'))
            ->description(__('Blogs are the main content of the website.'))
            ->modifyQueryUsing(function (Builder $query) {
                return $query->latest('created_at');
            })
            ->columns([

                ImageColumn::make('image')
                    ->label(__('image'))
                    ->circular()
                    ->stacked(),
                TextColumn::make('title_' . app()->getLocale())
                    ->searchable()
                    ->label(__('title')),
                TextColumn::make('desc_' . app()->getLocale())
                    ->searchable()
                    ->label(__('Description'))
                    ->wrap()
                    ->html()
                    ->words(50),
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
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),

                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
