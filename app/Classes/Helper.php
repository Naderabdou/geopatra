<?php

use App\Models\User;
use App\Settings\GeneralSettings;
use Filament\Notifications\Events\DatabaseNotificationsSent;
use Filament\Notifications\Notification as FilamentNotification;
use Filament\Notifications\Actions\Action;


/*curr
|--------------------------------------------------------------------------
| Detect Active Routes Function
|--------------------------------------------------------------------------
|
| Compare given routes with current route and return output if they match.
| Very useful for navigation, marking if the link is active.
|
*/

function isActiveRoute($route, $output = "link-active")
{
    if (\Route::currentRouteName() == $route) return $output;
}

function areActiveRoutes(array $routes, $output = "active")
{

    foreach ($routes as $route) {
        if (\Route::currentRouteName() == $route) return $output;
    }
}

function areActiveMainRoutes(array $routes, $output = "active")
{

    foreach ($routes as $route) {
        if (\Route::currentRouteName() == $route) return $output;
    }
}

function getSetting($key, $lang = null)
{
    $generalSettings = app(GeneralSettings::class);

    if ($lang == null) {
        $property = $key;
    } else {
        $property = $key . '_' . $lang;
    }

    return $generalSettings->$property ?? null;
}
function transWord($word, $locale = null)
{

    if (!$locale) {
        $locale = app()->getLocale();
    }

    $translationsFile = 'translations.json';

    // Check if the translations file exists, and create it if not
    if (!file_exists($translationsFile)) {
        file_put_contents($translationsFile, json_encode([], JSON_PRETTY_PRINT));
    }

    // Load existing translations from the JSON file
    $translations = json_decode(file_get_contents($translationsFile), true);

    // Check if the translation already exists for the given word and locale
    if (isset($translations[$locale][$word])) {
        $translatedWord = $translations[$locale][$word];
    } else {
        // If not found, translate the word
        $translateClient = new \Stichoza\GoogleTranslate\GoogleTranslate();
        $translatedWord = $translateClient->setSource(null)->setTarget($locale)->translate($word);

        // Save the translated word to the JSON file
        $translations[$locale][$word] = $translatedWord;
        file_put_contents($translationsFile, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    return $translatedWord;
}

function getCount(string $model)
{
    $modelClass = "App\Models\\" . ucfirst($model);

    $count = 0;

    if (class_exists($modelClass)) {
        $instance = new $modelClass;
        $count = $instance->count();
    }

    return $count;
}
// send code to mail
// function SendCode($email, $code,$name)
// {

//     $data = [
//         'code'  => $code,
//         'name'  => $name
//     ];

//     Mail::to($email)->send(new ResetPassword($data));

//     return true;
// } // end of send code


function sendNotifyAdmin($title, $label, $route)
{
    $admin = User::role('admin')->first();
    FilamentNotification::make()
        ->title($title)
        ->actions([
            Action::make('view')
                ->label($label)
                ->button()

                ->url(function () use ($route) {
                    return $route;
                })
                ->markAsRead()

        ])
        // ->broadcast(User::role('admin')->first());
        ->sendToDatabase($admin);

    event(new DatabaseNotificationsSent($admin));
}

function format_price($amount)
{
    return app('currency_formatter')->formatCurrency($amount, 'SAR');
}

function sendSms($phone, $msg)

{
    $bearer = '72c3ed12d3df263890e84dcf46917ab5';
    $taqnyt = new TaqnyatSms($bearer);

    $body = $msg;

    $phone = ltrim($phone, '0');
    $recipients = ['966' . $phone];

    $sender = 'nilegardens';

    $message = $taqnyt->sendMsg($body, $recipients, $sender);


    // dd($message);
}
