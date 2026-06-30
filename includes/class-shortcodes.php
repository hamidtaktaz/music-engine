<?php

if (!defined('ABSPATH')) {
    exit;
}



class ME_Shortcodes{

    public function __construct(){

        add_shortcode('music_engine',array($this,'home'));

    }

    public function home(){

        ob_start();

        include ME_PATH.'templates/home.php';

        return ob_get_clean();

    }

}

new ME_Shortcodes();






function me_latest_songs_shortcode($atts)
{

    $atts = shortcode_atts(array(
        'limit' => 10,
    ), $atts);

    $query = new WP_Query(array(
        'post_type'      => 'song',
        'posts_per_page' => intval($atts['limit']),
        'post_status'    => 'publish'
    ));

    ob_start();

    if ($query->have_posts()) {

        echo '<div class="me-songs">';

        while ($query->have_posts()) {

            $query->the_post();

            include plugin_dir_path(__FILE__) . '../templates/song-card.php';

        }

        echo '</div>';

    } else {

        echo '<p>هیچ آهنگی یافت نشد.</p>';

    }

    wp_reset_postdata();

    return ob_get_clean();

}

add_shortcode('songs', 'me_latest_songs_shortcode');