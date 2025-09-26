<?php

namespace App\Filament\Pages;

use Tabs\Tab;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use App\Settings\GeneralSettings;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;

class Settings extends SettingsPage
{
    public static function getNavigationGroup(): ?string
    {
        return __('Settings');
    }
    public static function getNavigationLabel(): string
    {
        return __('Settings');
    }
    public function getTitle(): string
    {
        return __('Settings');
    }
    public static function canAccess(): bool
    {
        return auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('admin');
    }

    protected static ?string $navigationIcon = 'icon-settings';
    protected static ?int $navigationSort = 7;
    protected static string $settings = GeneralSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Settings')
                    ->tabs([
                        Tabs\Tab::make(__('General'))
                            ->icon('icon-settings')
                            ->badge(4)
                            ->schema([
                                TextInput::make('site_name_ar')
                                    ->label(__('Site Name (Arabic)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),
                                TextInput::make('site_name_en')
                                    ->label(__('Site Name (English)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),
                                Textarea::make('hero_desc_one_ar')
                                    ->label(__('Hero Description One (Arabic)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->rows(10)
                                    ->extraAttributes(['dir' => 'rtl'])
                                    ->required(),
                                Textarea::make('hero_desc_one_en')
                                    ->label(__('Hero Description One (English)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->rows(10)
                                    ->extraAttributes(['dir' => 'rtl'])
                                    ->required(),
                                Textarea::make('hero_desc_two_ar')
                                    ->label(__('Hero Description Two (Arabic)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->rows(10)
                                    ->extraAttributes(['dir' => 'rtl'])
                                    ->required(),
                                Textarea::make('hero_desc_two_en')
                                    ->label(__('Hero Description Two (English)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->rows(10)
                                    ->extraAttributes(['dir' => 'rtl'])
                                    ->required(),
                                FileUpload::make('hero_media')
                                    ->label(__('Hero Media'))
                                    ->acceptedFileTypes(['video/*'])
                                    ->disk('public')
                                    ->directory('settings')
                                    ->columnSpanFull()
                                    ->reorderable()
                                    ->required(),
                                FileUpload::make('logo')
                                    ->label(__('Logo'))
                                    ->image()
                                    ->disk('public')
                                    ->directory('settings')
                                    ->columnSpanFull()
                                    ->reorderable()
                                    ->required(),
                                FileUpload::make('favicon')
                                    ->label(__('Favicon'))
                                    ->image()
                                    ->disk('public')
                                    ->directory('settings')
                                    ->columnSpanFull()

                                    ->reorderable()
                                    ->required(),



                            ])->columns(2),
                        Tabs\Tab::make(__('Contact Details'))
                            ->icon('icon-tech-support')
                            ->badge(11)
                            ->schema([
                                TextInput::make('email')
                                    ->label(__('Email'))
                                    ->autofocus()
                                    ->email()
                                    ->columnSpanFull()
                                    ->minLength(3)
                                    ->required(),
                                TextInput::make('phone')
                                    ->label(__('Phone'))
                                    ->autofocus()
                                    ->maxLength(15)
                                    ->required(),
                                TextInput::make('whatsapp')
                                    ->label(__('whatsapp'))
                                    ->autofocus()
                                    ->maxLength(20)
                                    ->required(),

                                TextInput::make('facebook')
                                    ->label(__('Facebook'))
                                    ->autofocus()
                                    ->url()
                                    ->required(),

                                TextInput::make('instagram')
                                    ->label(__('Instagram'))
                                    ->autofocus()
                                    ->url()
                                    ->required(),

                                TextInput::make('linkedin')
                                    ->label(__('LinkedIn'))
                                    ->autofocus()
                                    ->url()
                                    ->required(),

                                TextInput::make('twitter')
                                    ->label(__('Twitter'))
                                    ->url()
                                    ->autofocus()
                                    ->required(),

                                TextInput::make('address')
                                    ->label(__('Address'))
                                    ->autofocus()
                                    ->placeholder(__('Enter your address'))
                                    ->required()
                                    ->columnSpanFull()
                                    ->maxLength(255),
                                Map::make('location')
                                    ->hiddenLabel()
                                    ->columnSpanFull()

                                    ->mapControls([
                                        'mapTypeControl' => true,
                                        'scaleControl' => true,
                                        'rotateControl' => true,
                                        'fullscreenControl' => true,
                                        'searchBoxControl' => false, // creates geocomplete field inside map
                                        'zoomControl' => false,
                                    ])
                                    ->height(fn() => '400px') // map height (width is controlled by Filament options)
                                    ->defaultZoom(5) // default zoom level when opening form
                                    ->autocomplete('address') // field on form to use as Places geocompletion field
                                    ->draggable(false) // allow dragging to move marker

                                    ->clickable(false), // allow clicking to move marker

                            ])->columns(2),


                        Tabs\Tab::make(__('About Us Page'))
                            ->icon('icon-info')
                            ->badge(14)
                            ->schema([
                                Fieldset::make(__('About Us'))
                                    ->schema([
                                        TextInput::make('about_title_ar')
                                            ->label(__('About Us Title (Arabic)'))
                                            ->autofocus()
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->required(),
                                        TextInput::make('about_title_en')
                                            ->label(__('About Us Title (English)'))
                                            ->autofocus()
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->required(),
                                        Textarea::make('about_desc_ar')
                                            ->label(__('About Us Description (Arabic)'))
                                            ->autofocus()
                                            ->minLength(3)
                                            ->rows(10)
                                            ->extraAttributes(['dir' => 'rtl'])
                                            ->required(),
                                        Textarea::make('about_desc_en')
                                            ->label(__('About Us Description (English)'))
                                            ->autofocus()
                                            ->minLength(3)
                                            ->rows(10)
                                            ->extraAttributes(['dir' => 'ltr'])
                                            ->required(),
                                        FileUpload::make('about_image')
                                            ->label(__('About Us Image'))
                                            ->image()
                                            ->disk('public')
                                            ->directory('settings')
                                            ->columnSpanFull()
                                            ->reorderable()
                                            ->required(),

                                    ]),

                                Fieldset::make(__('vision & Goals & Mission'))
                                    ->schema([
                                        Textarea::make('our_vision_ar')
                                            ->label(__('Vision (Arabic)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'rtl'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),
                                        Textarea::make('vision_en')
                                            ->label(__('Vision (English)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'ltr'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),
                                        Textarea::make('our_goals_ar')
                                            ->label(__('Goals (Arabic)'))
                                            ->autofocus()
                                            ->minLength(3)
                                            ->extraAttributes(['dir' => 'rtl'])
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),
                                        Textarea::make('our_goals_en')
                                            ->label(__('Goals (English)'))
                                            ->autofocus()
                                            ->minLength(3)
                                            ->extraAttributes(['dir' => 'ltr'])
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),

                                        Textarea::make('our_mission_ar')
                                            ->label(__('Mission (Arabic)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'rtl'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),
                                        Textarea::make('our_mission_en')
                                            ->label(__('Mission (English)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'ltr'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),

                                    ]),

                            ])->columns(2),
                        Tabs\Tab::make(__('Banner Info'))
                            ->icon('icon-info')
                            ->badge(14)
                            ->schema([
                                TextInput::make('span_banner_ar')
                                    ->label(__('Span Banner (Arabic)'))
                                    ->autofocus()
                                    ->extraAttributes(['dir' => 'rtl'])
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),
                                TextInput::make('span_banner_en')
                                    ->label(__('Span Banner (English)'))
                                    ->autofocus()
                                    ->extraAttributes(['dir' => 'ltr'])
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),
                                TextInput::make('title_banner_ar')
                                    ->label(__('Banner Title (Arabic)'))
                                    ->autofocus()
                                    ->extraAttributes(['dir' => 'rtl'])
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),
                                TextInput::make('title_banner_en')
                                    ->label(__('Banner Title (English)'))
                                    ->autofocus()
                                    ->extraAttributes(['dir' => 'ltr'])
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),


                                Textarea::make('desc_banner_ar')
                                    ->label(__('Banner Description (Arabic)'))
                                    ->autofocus()
                                    ->extraAttributes(['dir' => 'ltr'])
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->rows(6)
                                    ->required(),
                                Textarea::make('desc_banner_en')
                                    ->label(__('Banner Description (English)'))
                                    ->autofocus()
                                    ->extraAttributes(['dir' => 'ltr'])
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->rows(6)
                                    ->required(),
                                FileUpload::make('banner_image')
                                    ->label(__('Banner Image'))
                                    ->image()
                                    ->disk('public')
                                    ->directory('settings')
                                    ->columnSpanFull()
                                    ->reorderable()
                                    ->required(),
                            ]),

                        Tabs\Tab::make(__('Titles Page'))
                            ->icon('icon-info')
                            ->badge(14)
                            ->schema([
                                Fieldset::make(__('Services section'))
                                    ->schema([
                                        Textarea::make('services_title_ar')
                                            ->label(__('Services Title (Arabic)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'rtl'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),
                                        Textarea::make('services_title_en')
                                            ->label(__('Services Title (English)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'ltr'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),

                                    ]),

                                Fieldset::make(__('Projects section'))
                                    ->schema([

                                        Textarea::make('projects_title_ar')
                                            ->label(__('Projects Title (Arabic)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'rtl'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),
                                        Textarea::make('projects_title_en')
                                            ->label(__('Projects Title (English)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'ltr'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),

                                    ]),
                                Fieldset::make(__('Team section'))
                                    ->schema([

                                        Textarea::make('team_title_ar')
                                            ->label(__('Team Title (Arabic)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'rtl'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),
                                        Textarea::make('team_title_en')
                                            ->label(__('Team Title (English)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'ltr'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),

                                    ]),

                                Fieldset::make(__('Careers section'))
                                    ->schema([

                                        Textarea::make('careers_title_ar')
                                            ->label(__('Careers Title (Arabic)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'rtl'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),
                                        Textarea::make('careers_title_en')
                                            ->label(__('Careers Title (English)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'ltr'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),

                                    ]),


                                Fieldset::make(__('Blog section'))
                                    ->schema([

                                        Textarea::make('blog_title_ar')
                                            ->label(__('Blog Title (Arabic)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'rtl'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),
                                        Textarea::make('blog_title_en')
                                            ->label(__('Blog Title (English)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'ltr'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),

                                    ]),

                                Fieldset::make(__('Values section'))
                                    ->schema([

                                        Textarea::make('values_title_ar')
                                            ->label(__('Values Title (Arabic)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'rtl'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),
                                        Textarea::make('values_title_en')
                                            ->label(__('Values Title (English)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'ltr'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),

                                    ]),
                                Fieldset::make(__('Principles section'))
                                    ->schema([

                                        Textarea::make('principles_title_ar')
                                            ->label(__('Principles Title (Arabic)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'rtl'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),
                                        Textarea::make('principles_title_en')
                                            ->label(__('Principles Title (English)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'ltr'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),

                                    ]),
                                Fieldset::make(__('Contact Section'))
                                    ->schema([

                                        Textarea::make('contact_title_ar')
                                            ->label(__('Contact Title (Arabic)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'rtl'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),
                                        Textarea::make('contact_title_en')
                                            ->label(__('Contact Title (English)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'ltr'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),

                                    ]),
                                Fieldset::make(__('Technology info section'))
                                    ->schema([
                                        TextInput::make('technology_span_ar')
                                            ->label(__('Technology Span (Arabic)'))
                                            ->autofocus()
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->required(),
                                        TextInput::make('technology_span_en')
                                            ->label(__('Technology Span (English)'))
                                            ->autofocus()
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->required(),
                                        TextInput::make('technology_title_ar')
                                            ->label(__('Technology Title (Arabic)'))
                                            ->autofocus()
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->required(),
                                        TextInput::make('technology_title_en')
                                            ->label(__('Technology Title (English)'))
                                            ->autofocus()
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->required(),

                                        Textarea::make('technology_desc_ar')
                                            ->label(__('Technology Description (Arabic)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'rtl'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),
                                        Textarea::make('technology_desc_en')
                                            ->label(__('Technology Description (English)'))
                                            ->autofocus()
                                            ->extraAttributes(['dir' => 'ltr'])
                                            ->minLength(3)
                                            ->maxLength(255)
                                            ->rows(6)
                                            ->required(),
                                        FileUpload::make('technology_image')
                                            ->label(__('Technology Image'))
                                            ->image()
                                            ->disk('public')
                                            ->directory('settings')
                                            ->columnSpanFull()
                                            ->reorderable()
                                            ->required(),
                                    ]),


                            ])->columns(2),









                    ]),
            ])->columns(1);
    }
}
