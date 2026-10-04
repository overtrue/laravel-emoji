<?php

/*
 * This file is part of the overtrue/laravel-emoji.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use JoyPixels\Client;

if (! function_exists('emoji')) {
    /**
     * Convert emoji using the configured helper method.
     *
     * @param  string  $shortname
     * @return string
     */
    function emoji($shortname)
    {
        return call_user_func([app(Client::class), config('emoji.default_helper_method', 'shortnameToUnicode')], $shortname);
    }
}
