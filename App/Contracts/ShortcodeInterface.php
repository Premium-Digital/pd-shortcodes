<?php
namespace PdShortcodes\Contracts;

interface ShortcodeInterface
{
    /**
     * Returns the shortcode tag (e.g. "hello_box").
     */
    public function getTag(): string;

    /**
     * Renders the shortcode output.
     */
    public function render(array $atts = [], ?string $content = null): string;
}
