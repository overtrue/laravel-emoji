# Laravel Emoji

:smile: This package assist you in getting started with emoji easily.

![Laravel Octane Ready Status](https://img.shields.io/badge/Octance-ready-green?style=flat-square)
![GitHub release (latest SemVer)](https://img.shields.io/github/v/release/overtrue/laravel-emoji?style=flat-square)
![GitHub License](https://img.shields.io/github/license/overtrue/laravel-emoji?style=flat-square)
![Packagist Downloads](https://img.shields.io/packagist/dt/overtrue/laravel-emoji?style=flat-square)

[![Sponsor me](https://github.com/overtrue/overtrue/blob/master/sponsor-me-button-s.svg?raw=true)](https://github.com/sponsors/overtrue)

## Installing

```shell
$ composer require overtrue/laravel-emoji
```

## Usage

```php
Emoji::toImage(':smile:'); // <img class="emojione" alt="&#x1f604;" title=":smile:" src="https://cdn.jsdelivr.net/emojione/assets/3.1/png/32/1f604.png"/>'
Emoji::toShort('😄'); // :smile:
Emoji::shortnameToUnicode(':smile:'); // 😄

// using helper
// default transform shorname to unicode, you can change it in config file.
emoji(':smile:'); // 😄

// access emoji services, return \Emojione\Client instance.
app('emoji');
// or 
app(\Emojione\Client::class);
```

### Configurations && emoji images

```shell
// config
$ php artisan vendor:publish --provider="Overtrue\\LaravelEmoji\\EmojiServiceProvider" --tag=config

// png images
$ php artisan vendor:publish --provider="Overtrue\\LaravelEmoji\\EmojiServiceProvider" --tag=public

// sprites images
$ php artisan vendor:publish --provider="Overtrue\\LaravelEmoji\\EmojiServiceProvider" --tag=sprites
```

## :heart: Sponsor me 

[![Sponsor me](https://github.com/overtrue/overtrue/blob/master/sponsor-me.svg?raw=true)](https://github.com/sponsors/overtrue)

如果你喜欢我的项目并想支持它，[点击这里 :heart:](https://github.com/sponsors/overtrue)


## Project supported by JetBrains

Many thanks to Jetbrains for kindly providing a license for me to work on this and other open-source projects.

[![](https://resources.jetbrains.com/storage/products/company/brand/logos/jb_beam.svg)](https://www.jetbrains.com/?from=https://github.com/overtrue)

## PHP 扩展包开发

> 想知道如何从零开始构建 PHP 扩展包？
>
> 请关注我的实战课程，我会在此课程中分享一些扩展开发经验 —— [《PHP 扩展包实战教程 - 从入门到发布》](https://learnku.com/courses/creating-package)

## License

MIT
