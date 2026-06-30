<?php

if (!defined('ABSPATH')) {
    exit;
}

function me_render_player(){

    include plugin_dir_path(__FILE__) . '../templates/player.php';

}

add_action('wp_footer','me_render_player');