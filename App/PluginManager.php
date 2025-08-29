<?php

namespace PdShortcodes;

use PdShortcodes\Updater;
use PdShortcodes\Providers\ShortcodeServiceProvider;
use PdShortcodes\ShortcodeDocsPage;

class PluginManager
{
    public function __construct()
    {
        Updater::init();
        ShortcodeServiceProvider::init();
        ShortcodeDocsPage::init();
    }

    public static function activate()
    {
        \flush_rewrite_rules();
    }

    public static function deactivate()
    {
        \flush_rewrite_rules();
    }

}