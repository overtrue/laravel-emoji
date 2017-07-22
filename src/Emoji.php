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
use Illuminate\Support\Facades\Facade;

/**
 * Class Emoji.
 *
 * @author overtrue <i@overtrue.me>
 *
 * @method string toImage(string $string)               Convert Native Unicode Emoji and Shortnames Directly to Images.
 * @method string toShort(string $string)               Convert Native Unicode Emoji to Shortnames.
 * @method string unicodeToImage(string $string)        Convert Native Unicode Emoji Directly to Images.
 * @method string shortnameToImage(string $string)      Convert Shortnames to Images.
 * @method string shortnameToUnicode(string $string)    Convert Shortnames to Native Unicode.
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
