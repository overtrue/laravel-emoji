<?php

namespace Overtrue\LaravelEmoji;

use Illuminate\Support\ServiceProvider;
use JoyPixels\Client;
use JoyPixels\Ruleset;

class EmojiServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        if (! file_exists(config_path('emoji.php'))) {
            $this->publishes([
                __DIR__.'/../config/emoji.php' => config_path('emoji.php'),
            ], 'laravel-emoji');
        }

        $this->registerBladeDirectiveIfNeeded();
    }

    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__).'/config/emoji.php', 'emoji');

        $this->app->bind(Client::class, function () {
            $client = new Client(new Ruleset());

            if ($path = \config('emoji.options.image_path')) {
                $client->imagePathPNG = $path;
            }

            $client->sprites = \config('emoji.options.sprites');
            $client->spriteSize = \config('emoji.options.sprite_size');
            $client->emojiSize = \config('emoji.options.emoji_size');
            $client->emojiVersion = \config('emoji.options.emoji_version');
            $client->unicodeAlt = \config('emoji.options.unicode_alt');
            $client->shortcodes = \config('emoji.options.shortcodes');
            $client->ascii = \config('emoji.options.ascii');

            return $client;
        });

        $this->app->alias(Client::class, 'emoji');
    }

    public function provides()
    {
        return [Client::class, 'emoji'];
    }

    protected function registerBladeDirectiveIfNeeded()
    {
        if (class_exists('Illuminate\Support\Facades\Blade')) {
            \Illuminate\Support\Facades\Blade::directive('emoji', function ($expression) {
                return "<?php echo emoji({$expression}); ?>";
            });
        }
    }
}
