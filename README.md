<h1 align="center"> Laravel Emoji </h1>

<p align="center"> :smile: This package assist you in getting started with emoji easily.</p>

## Installing

```shell
$ composer require overtrue/laravel-emoji
```

> Laravel 5.5 auto-discovery supported.

If you are using < laravel 5.5

### Add service provider

```php
Overtrue\LaravelEmoji\EmojiServiceProvider::class,
```

### Add alias

```php
'Emoji' => Overtrue\LaravelEmoji\Emoji::class,
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

If you like the work I do and want to support it, [you know what to do :heart:](https://github.com/sponsors/overtrue)

如果你喜欢我的项目并想支持它，[点击这里 :heart:](https://github.com/sponsors/overtrue)

## PHP 扩展包开发

> 想知道如何从零开始构建 PHP 扩展包？
>
> 请关注我的实战课程，我会在此课程中分享一些扩展开发经验 —— [《PHP 扩展包实战教程 - 从入门到发布》](https://learnku.com/courses/creating-package)

## License

MIT
