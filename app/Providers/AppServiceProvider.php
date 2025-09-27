<?php

namespace App\Providers;

use App\Models\Career;
use App\Settings\GeneralSettings;
use Illuminate\Support\ServiceProvider;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['ar', 'en']); // also accepts a closure
        });
        $settings = app(GeneralSettings::class);
        $careers = Career::query()->latest()->get();

        $ViewWithSettings = function ($view) use ($settings) {
            $view->with('setting', $settings);
        };
        $ViewWithCarrers = function ($view) use ($careers) {
            $view->with('careers', $careers);
        };

        view()->composer('site.*', $ViewWithSettings);
        view()->composer('site.*', $ViewWithCarrers);
    }
}
