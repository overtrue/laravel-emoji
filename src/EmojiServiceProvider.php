<?php

/*
 * This file is part of the overtrue/laravel-emoji.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Overtrue\LaravelEmoji;

use Emojione\Client;
use Emojione\Ruleset;
use Illuminate\Support\ServiceProvider;

/**
 * Class EmojiServiceProvider.
 *
 * @author overtrue <i@overtrue.me>
 */
class EmojiServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Application bootstrap event.
     */
    public function boot()
    {
        if (!file_exists(config_path('emoji.php'))) {
            $this->publishes([
                __DIR__.'/../config/emoji.php' => config_path('emoji.php'),
            ], 'laravel-emoji');
        }

        $this->registerBladeDirectiveIfNeeded();
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__).'/config/emoji.php', 'emoji');

        $this->app->bind(Client::class, function () {
            $client = new Client(new Ruleset());

            if ($path = config('emoji.options.image_path')) {
                $client->imagePathPNG = $path;
            }

            $client->sprites = config('emoji.options.sprites');
            $client->spriteSize = config('emoji.options.sprite_size');
            $client->emojiSize = config('emoji.options.emoji_size');
            $client->emojiVersion = config('emoji.options.emoji_version');
            $client->unicodeAlt = config('emoji.options.unicode_alt');
            $client->shortcodes = config('emoji.options.shortcodes');
            $client->ascii = config('emoji.options.ascii');

            return $client;
        });

        $this->app->alias(Client::class, 'emoji');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Client::class, 'emoji'];
    }

    /**
     * Register blade directives.
     */
    protected function registerBladeDirectiveIfNeeded()
    {
        if (class_exists('Illuminate\Support\Facades\Blade')) {
            \Illuminate\Support\Facades\Blade::directive('emoji', function ($expression) {
                return "<?php echo emoji({$expression}); ?>";
            });
        }
    }
}
