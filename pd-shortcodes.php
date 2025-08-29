<?php
/**
 * Plugin Name:       PD Shortcodes
 * Description:       Collection of custom shortcodes.
 * Version:           1.0.7
 * Author:            kkarasiewicz
 * Text Domain:       pd-shortcodes
 * Domain Path:       /languages
 * Plugin icon:       /src/assets/images/pd-shortcode-icon.webp
 */

namespace PdShortcodes;
use PdShortcodes\PluginManager;

if (!defined('WPINC')) {
    die;
}

if (!defined('PD_SHORTCODES_PLUGIN_DIR_PATH')) {
    define('PD_SHORTCODES_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
}

if (!defined('PD_SHORTCODES_PLUGIN_DIR_URL')) {
    define('PD_SHORTCODES_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));
}

if (!defined('PD_SHORTCODES_REPO_URL')) {
    define('PD_SHORTCODES_REPO_URL', 'https://github.com/Premium-Digital/pd-shortcodes');
}

require PD_SHORTCODES_PLUGIN_DIR_PATH . 'vendor/autoload.php';

class PdShortcodes
{
    public function __construct()
    {
        load_plugin_textdomain(
            'pd-shortcodes',
            false,
            dirname(plugin_basename(__FILE__)) . '/languages'
        );

        new PluginManager();
    }
}

new PdShortcodes();

register_activation_hook(__FILE__, [PluginManager::class, 'activate']);
register_deactivation_hook(__FILE__, [PluginManager::class, 'deactivate']);
