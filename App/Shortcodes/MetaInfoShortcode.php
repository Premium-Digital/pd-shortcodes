<?php
namespace PdShortcodes\Shortcodes;

use PdShortcodes\Contracts\ShortcodeInterface;

class MetaInfoShortcode implements ShortcodeInterface
{
    public function getName(): string
    {
        return 'pd_meta_info';
    }

        public function getDescription(): string
    {
        return  esc_html__('Displays the last modified date and estimated reading time for a post.', 'pd-shortcodes');
    }

    public function render(array $atts = [], ?string $content = null): string
    {
        if (!is_single()) {
            return '';
        }

        $postId       = get_the_ID();
        $modifiedDate = get_the_modified_date('', $postId);
        $readingTime  = $this->getReadingTime($postId);
        $template = PD_SHORTCODES_PLUGIN_DIR_PATH . 'templates/shortcodes/meta-info.php';

        if (!file_exists($template)) {
            return '';
        }

        ob_start();
        include $template;
        return ob_get_clean();
    }

    /**
     * Calculates reading time based on post content.
     */
    private function getReadingTime(int $postId): string
    {
        $content    = get_post_field('post_content', $postId);
        $wordCount  = str_word_count(wp_strip_all_tags($content));
        $minutes    = ceil($wordCount / 200); // 200 words per minute
        return $minutes . ' min czytania';
    }
}
