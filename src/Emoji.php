<?php

namespace Overtrue\LaravelEmoji;

use Illuminate\Support\Facades\Facade;
use JoyPixels\Client;

/**
 * @method static string toImage(string $string)               Convert Native Unicode Emoji and Shortnames Directly to Images.
 * @method static string toShort(string $string)               Convert Native Unicode Emoji to Shortnames.
 * @method static string unicodeToImage(string $string)        Convert Native Unicode Emoji Directly to Images.
 * @method static string shortnameToImage(string $string)      Convert Shortnames to Images.
 * @method static string shortnameToUnicode(string $string)    Convert Shortnames to Native Unicode.
 */
class Emoji extends Facade
{
    /**
     * Return the facade accessor.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return Client::class;
    }
}
