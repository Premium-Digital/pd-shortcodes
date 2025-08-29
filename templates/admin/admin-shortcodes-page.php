<?php
/** @var array $shortcodes Array of PdShortcodes\Shortcode objects */
?>

<div class="wrap">
    <h1><?php _e('Available Shortcodes', 'pd-shortcodes'); ?></h1>
    <table class="widefat striped">
        <thead>
            <tr>
                <th><?php _e('Shortcode', 'pd-shortcodes'); ?></th>
                <th><?php _e('Description', 'pd-shortcodes'); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($shortcodes as $shortcode): ?>
            <tr>
                <td><code>[<?php echo esc_html($shortcode->getName()); ?>]</code></td>
                <td><?php echo esc_html($shortcode->getDescription()); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
