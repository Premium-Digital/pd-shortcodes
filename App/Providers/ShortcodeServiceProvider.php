<?php
namespace PdShortcodes\Providers;

use PdShortcodes\Contracts\ShortcodeInterface;
use PdShortcodes\Shortcodes\MetaInfoShortcode;

class ShortcodeServiceProvider
{
    /**
     * @var ShortcodeInterface[]
     */
    private static array $shortcodes = [];

    /**
     * Initialize provider and register shortcodes
     */
    public static function init(): void
    {
        self::registerDefaults();

        foreach (self::$shortcodes as $shortcode) {
            add_shortcode($shortcode->getTag(), [$shortcode, 'render']);
        }
    }

    /**
     * Add a shortcode to the provider
     */
    public static function addShortcode(ShortcodeInterface $shortcode): void
    {
        self::$shortcodes[] = $shortcode;
    }

    /**
     * Register default shortcode classes
     */
    private static function registerDefaults(): void
    {
        self::addShortcode(new MetaInfoShortcode());
    }
}
