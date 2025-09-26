<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Career;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CareerResource\Pages;

class CareerResource extends Resource
{
    protected static ?string $model = Career::class;

    protected static ?string $navigationIcon = 'icon-career';
    public static function getModelLabel(): string
    {
        return __('Career');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Careers');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Section::make(__('General Informatio'))
                        ->collapsible(true)
                        ->schema([
                            TextInput::make('name_ar')
                                ->label(__('Name (Arabic)'))
                                ->minLength(3)
                                ->maxLength(255)
                                ->unique(ignoreRecord: true)
                                ->required(),

                            TextInput::make('name_en')
                                ->required()
                                ->label(__('Name (English)'))
                                ->minLength(3)
                                ->maxLength(255)
                                ->unique(ignoreRecord: true)
                                ->autofocus()
                                ->lazy()
                                ->afterStateUpdated(function (Set $set, ?string $state) {
                                    $set('slug', str()->slug($state));
                                }),
                            TextInput::make('slug')
                                ->required()

                                ->unique(Career::class, 'slug', ignoreRecord: true)
                                ->disabled()
                                ->dehydrated(),

                        ])->columns(3),


                    Section::make(__('Description Information'))
                        ->collapsible(true)

                        ->schema([
                            Textarea::make('desc_ar')
                                ->label(__('Description (Arabic)'))
                                ->autofocus()
                                ->extraAttributes(['dir' => 'rtl'])
                                ->minLength(3)
                                ->maxLength(10000)
                                ->rows(6)
                                ->required(),
                            Textarea::make('desc_en')
                                ->label(__('Description (English)'))
                                ->autofocus()
                                ->extraAttributes(['dir' => 'ltr'])
                                ->minLength(3)
                                ->maxLength(10000)
                                ->rows(6)
                                ->required(),
                            TagsInput::make('requirements_ar')
                                ->placeholder(__('Press enter to add a requirement'))
                                ->label(__('Requirements (Arabic)')),
                            TagsInput::make('requirements_en')
                                ->placeholder(__('Press enter to add a requirement'))
                                ->label(__('Requirements (English)')),

                            FileUpload::make('icon')
                                ->label(__('image'))
                                ->disk('public')->directory('careers')
                                ->columnSpanFull()
                                ->reorderable()
                                ->image()
                                ->required(),
                        ])->columns(1),





                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading(__('No Careers Found'))
            ->emptyStateDescription(__('Try creating a new Career.'))
            ->emptyStateIcon('icon-career')
            ->striped()
            ->heading(__('Careers'))
            ->description(__('Careers are the main content of the website.'))
            ->modifyQueryUsing(function (Builder $query) {
                return $query->latest('created_at');
            })
            ->columns([
                ImageColumn::make('icon')
                    ->label(__('image'))
                    ->circular()
                    ->stacked(),
                TextColumn::make('name_' . app()->getLocale())
                    ->label(__('Name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('desc_' . app()->getLocale())
                    ->label(__('Description'))
                    ->wrap()
                    ->html()
                    ->words(50),
                TextColumn::make('requirements_' . app()->getLocale())
                    ->label(__('Requirements'))
                    ->listWithLineBreaks()
                    ->bulleted(),
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
            'index' => Pages\ListCareers::route('/'),
            'create' => Pages\CreateCareer::route('/create'),
            'edit' => Pages\EditCareer::route('/{record}/edit'),
        ];
    }
}
