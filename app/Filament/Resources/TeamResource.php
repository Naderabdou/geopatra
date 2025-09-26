<?php

namespace App\Filament\Resources;

use App\Models\Team;
use Filament\Tables;
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
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TeamResource\Pages;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $navigationIcon = 'icon-teamwork';
    public static function getModelLabel(): string
    {
        return __('Team');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Teams');
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
                                ->required(),
                        ])->columns(2),

                    Section::make(__('Job Information'))
                        ->collapsible(true)
                        ->schema([
                            TextInput::make('job_title_ar')
                                ->label(__('Job Title (Arabic)'))
                                ->minLength(3)
                                ->maxLength(255)
                                ->required(),

                            TextInput::make('job_title_en')
                                ->label(__('Job Title (English)'))
                                ->minLength(3)
                                ->maxLength(255)
                                ->required(),
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
                        ])->columns(2),

                    Section::make(__('Image Information'))
                        ->collapsible(true)
                        ->schema([
                            FileUpload::make('image')
                                ->label(__('Image'))
                                ->disk('public')
                                ->directory('team')
                                ->columnSpanFull()
                                ->image()
                                ->required(),
                        ]),
                ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading(__('No Members Found'))
            ->emptyStateDescription(__('Try creating a new member.'))
            ->emptyStateIcon('icon-teamwork')
            ->striped()
            ->heading(__('Team Members'))
            ->description(__('Manage the team members shown on the website.'))
            ->modifyQueryUsing(fn(Builder $query) => $query->latest('created_at'))
            ->columns([

                ImageColumn::make('image')
                    ->label(__('Image'))
                    ->circular()
                    ->stacked(),

                TextColumn::make('name_' . app()->getLocale())
                    ->label(__('Name'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('job_title_' . app()->getLocale())
                    ->label(__('Job Title'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('desc_' . app()->getLocale())
                    ->label(__('Description'))
                    ->wrap()
                    ->html()
                    ->words(20),

                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}
