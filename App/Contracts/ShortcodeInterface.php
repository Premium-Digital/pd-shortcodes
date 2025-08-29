<?php
namespace PdShortcodes\Contracts;

interface ShortcodeInterface
{
    /**
     * Returns the shortcode tag (e.g. "hello_box").
     */
    public function getName(): string;

    /**
     * Renders the shortcode output.
     */
    public function render(array $atts = [], ?string $content = null): string;
    
    /**
     * Returns a brief description of the shortcode.
     */
    public function getDescription(): string;
}
