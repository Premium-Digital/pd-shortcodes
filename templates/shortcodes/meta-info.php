<?php
/**
 * Template for Meta Info Shortcode
 *
 * @var string $modifiedDate
 * @var string $readingTime
 */
?>
<ul class="pd-meta-info">
    <li class="meta-date">
        <strong>Data utworzenia:</strong> <span><?php echo esc_html($createdDate); ?></span>
    <li class="meta-date">
        <strong>Data aktualizacji:</strong> <span><?php echo esc_html($modifiedDate); ?></span>
    </li>
    <li class="meta-reading-time">
        <span><?php echo esc_html($readingTime); ?></span>
    </li>
</ul>
