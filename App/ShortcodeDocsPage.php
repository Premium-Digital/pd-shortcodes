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
            __('Shortcodes', 'pd-shortcodes'),
            __('Shortcodes', 'pd-shortcodes'),
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
        ?>
        <div class="wrap">
            <h1><?php _e('Available Shortcodes', 'pd-shortcodes'); ?></h1>
            <table class="widefat striped">
                <thead>
                    <tr>
                        <th><?php _e('Tag', 'pd-shortcodes'); ?></th>
                        <th><?php _e('Description', 'pd-shortcodes'); ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($shortcodes as $shortcode): ?>
                    <tr>
                        <td><code>[<?php echo esc_html($shortcode->getTag()); ?>]</code></td>
                        <td><?php echo esc_html($shortcode->getDescription()); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}
