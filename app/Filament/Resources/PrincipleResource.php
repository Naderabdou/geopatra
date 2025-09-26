<?php

namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Principle;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PrincipleResource\Pages;

class PrincipleResource extends Resource
{
    protected static ?string $model = Principle::class;

    protected static ?string $navigationIcon = 'icon-principle';

    public static function getModelLabel(): string
    {
        return __('Principle');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Principles');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Section::make(__('Principle Information'))
                        ->collapsible(true)
                        ->schema([
                            TextInput::make('name_ar')
                                ->label(__('Name (Arabic)'))
                                ->minLength(3)
                                ->unique(ignoreRecord: true)
                                ->maxLength(255)
                                ->required(),

                            TextInput::make('name_en')
                                ->required()
                                ->label(__('Name (English)'))
                                ->minLength(3)
                                ->maxLength(255)
                                ->unique(ignoreRecord: true)
                                ->autofocus(),


                        ])->columns(2),


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
            ->emptyStateHeading(__('No Principles Found'))
            ->emptyStateDescription(__('Try creating a new Principle.'))
            ->emptyStateIcon('icon-principle')
            ->striped()
            ->heading(__('Principles'))
            ->description(__('Principles are the main content of the website.'))
            ->modifyQueryUsing(function (Builder $query) {
                return $query->latest('created_at');
            })
            ->columns([

                ImageColumn::make('image')
                    ->label(__('image'))
                    ->circular()
                    ->stacked(),
                TextColumn::make('name_' . app()->getLocale())
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
            'index' => Pages\ListPrinciples::route('/'),
            'create' => Pages\CreatePrinciple::route('/create'),
            'edit' => Pages\EditPrinciple::route('/{record}/edit'),
        ];
    }
}
