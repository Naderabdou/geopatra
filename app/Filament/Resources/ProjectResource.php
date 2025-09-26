<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Project;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProjectResource\Pages;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'icon-project';
    public static function getModelLabel(): string
    {
        return __('Project');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Projects');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Section::make(__('Project Information'))
                        ->collapsible(true)
                        ->schema([

                            Fieldset::make('Name Information')
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
                                        ->autofocus()
                                        ->unique(ignoreRecord: true)
                                        ->lazy()
                                        ->afterStateUpdated(function (Set $set, ?string $state) {
                                            $set('slug', str(Str::limit($state ?? '', 255))->slug());
                                        }),
                                    TextInput::make('slug')
                                        ->required()
                                        ->unique(Project::class, 'slug', ignoreRecord: true)
                                        ->disabled()
                                        ->dehydrated(),
                                ])->columns(3),
                            Fieldset::make('Location Information')
                                ->schema([
                                    TextInput::make('location_ar')
                                        ->label(__('Location (Arabic)'))
                                        ->minLength(3)
                                        ->maxLength(255)
                                        ->required(),

                                    TextInput::make('location_en')
                                        ->required()
                                        ->label(__('Location (English)'))
                                        ->minLength(3)
                                        ->maxLength(255)
                                        ->autofocus(),

                                    TextInput::make('space')
                                        ->label(__('Space'))
                                        ->autofocus()
                                        ->minLength(3)
                                        ->maxLength(255)
                                        ->required(),

                                    TextInput::make('duration')
                                        ->label(__('Duration'))
                                        ->autofocus()
                                        ->minLength(3)
                                        ->maxLength(255)
                                        ->required(),

                                ]),




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


                        ]),

                    Section::make(__('Images Information'))
                        ->collapsible(true)
                        ->schema([
                            FileUpload::make('image')
                                ->label(__('image'))
                                ->disk('public')->directory('projects')
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
            ->emptyStateHeading(__('No Projects Found'))
            ->emptyStateDescription(__('Try creating a new Project.'))
            ->emptyStateIcon('icon-project')
            ->striped()
            ->heading(__('Projects'))
            ->description(__('Projects are the main content of the website.'))
            ->modifyQueryUsing(fn(Builder $query) => $query->latest('created_at'))
            ->columns([

                ImageColumn::make('image')
                    ->label(__('image'))
                    ->circular()
                    ->stacked()
                    ->disk('public'),

                TextColumn::make('name_' . app()->getLocale())
                    ->searchable()
                    ->label(__('Name')),

                TextColumn::make('location_' . app()->getLocale())
                    ->searchable()
                    ->label(__('Location')),

                TextColumn::make('space')
                    ->label(__('Space'))
                    ->sortable(),

                TextColumn::make('duration')
                    ->label(__('Duration'))
                    ->sortable(),

                // TextColumn::make('desc_' . app()->getLocale())
                //     ->label(__('Description'))
                //     ->html()
                //     ->wrap()
                //     ->words(30),

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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
