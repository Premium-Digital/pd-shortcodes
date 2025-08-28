<?php

namespace PdShortcodes;

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

class Updater
{
    public static function init()
    {
        if (!defined('PD_SHORTCODES_REPO_URL')) {
            error_log('[PD Shortcodes] Constant PD_SHORTCODES_REPO_URL is not defined.');
            return;
        }

        if (!class_exists(PucFactory::class)) {
            error_log('[PD Shortcodes] Plugin Update Checker is not available.');
            return;
        }

        $pluginFile = PD_SHORTCODES_PLUGIN_DIR_PATH . '/pd-shortcodes.php';

        $updateChecker = PucFactory::buildUpdateChecker(
            PD_SHORTCODES_REPO_URL,
            $pluginFile,
            'pd-shortcodes'
        );

        $updateChecker->getVcsApi()->enableReleaseAssets();
    }
}