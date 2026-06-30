<?php

if (!defined('ABSPATH')) {
    exit;
}

class ME_Assets {

    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue']);
    }

    public function enqueue() {

        // CSS
        wp_enqueue_style(
            'me-layout',
            ME_URL . 'assets/css/layout.css',
            [],
            ME_VERSION
        );

        wp_enqueue_style(
            'me-cards',
            ME_URL . 'assets/css/cards.css',
            ['me-layout'],
            ME_VERSION
        );

        wp_enqueue_style(
            'me-player',
            ME_URL . 'assets/css/player.css',
            ['me-cards'],
            ME_VERSION
        );

        wp_enqueue_style(
            'me-responsive',
            ME_URL . 'assets/css/responsive.css',
            ['me-player'],
            ME_VERSION
        );


        // JavaScript
wp_enqueue_script(
    'me-core',
    ME_URL . 'assets/js/core.js',
    [],
    ME_VERSION,
    true
);

wp_enqueue_script(
    'me-queue',
    ME_URL . 'assets/js/queue.js',
    ['me-core'],
    ME_VERSION,
    true
);

wp_enqueue_script(
    'me-player',
    ME_URL . 'assets/js/player.js',
    ['me-queue'],
    ME_VERSION,
    true
);

wp_enqueue_script(
    'me-app',
    ME_URL . 'assets/js/app.js',
    ['me-player'],
    ME_VERSION,
    true
);





    }

}

new ME_Assets();