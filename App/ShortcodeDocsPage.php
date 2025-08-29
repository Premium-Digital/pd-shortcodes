<?php
namespace PdShortcodes;

use PdShortcodes\Providers\ShortcodeServiceProvider;

class ShortcodeDocsPage
{
    public static function init(): void
    {
        add_action('admin_menu', [self::class, 'registerMenu']);
    }

    public static function registerMenu(): void
    {
        add_menu_page(
            __('PD Shortcodes', 'pd-shortcodes'),
            __('PD Shortcodes', 'pd-shortcodes'),
            'manage_options',
            'pd-shortcodes-docs',
            [self::class, 'renderPage'],
            'dashicons-editor-code',
            80
        );
    }

    public static function renderPage(): void
    {
        $shortcodes = ShortcodeServiceProvider::all();
        $templateFile = PD_SHORTCODES_PLUGIN_DIR_PATH . 'templates/admin/admin-shortcodes-page.php';

        if (file_exists($templateFile)) {
            include $templateFile;
        }
    }
}
