<?php

namespace Overtrue\LaravelEmoji\Tests;

use Illuminate\Support\Facades\Blade;
use JoyPixels\Client;
use Orchestra\Testbench\TestCase;
use Overtrue\LaravelEmoji\Emoji;
use Overtrue\LaravelEmoji\EmojiServiceProvider;

class EmojiTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [EmojiServiceProvider::class];
    }

    public function test_helper_converts_shortnames_to_unicode(): void
    {
        $this->assertSame('😄', emoji(':smile:'));
    }

    public function test_helper_defaults_to_unicode_when_method_is_not_configured(): void
    {
        $config = $this->app['config']->get('emoji');
        unset($config['default_helper_method']);
        $this->app['config']->set('emoji', $config);

        $this->assertSame('😄', emoji(':smile:'));
    }

    public function test_helper_uses_the_configured_conversion_method(): void
    {
        $this->app['config']->set('emoji.default_helper_method', 'toShort');

        $this->assertSame(':smile:', emoji('😄'));
    }

    public function test_helper_resolves_the_registered_joypixels_client(): void
    {
        $client = $this->createMock(Client::class);
        $client->expects($this->once())
            ->method('shortnameToUnicode')
            ->with(':smile:')
            ->willReturn('converted');
        $this->app->instance(Client::class, $client);

        $this->assertSame('converted', emoji(':smile:'));
    }

    public function test_blade_directive_renders_emoji(): void
    {
        $this->assertSame('😄', Blade::render('@emoji($shortname)', ['shortname' => ':smile:']));
    }

    public function test_facade_and_alias_resolve_joypixels_clients(): void
    {
        $this->assertInstanceOf(Client::class, $this->app->make('emoji'));
        $this->assertSame('😄', Emoji::shortnameToUnicode(':smile:'));
    }

    public function test_helper_uses_configured_client_options(): void
    {
        $this->app['config']->set('emoji.default_helper_method', 'toImage');
        $this->app['config']->set('emoji.options.image_path', 'https://example.com/emoji/');

        $this->assertStringContainsString('https://example.com/emoji/', emoji(':smile:'));
    }

    public function test_configuration_can_be_published_with_documented_tag(): void
    {
        $this->assertContains(config_path('emoji.php'), EmojiServiceProvider::pathsToPublish(
            EmojiServiceProvider::class,
            'laravel-emoji'
        ));
    }
}
