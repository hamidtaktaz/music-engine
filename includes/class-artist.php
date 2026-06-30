<?php

if (!defined('ABSPATH')) {
    exit;
}

class ME_Artist {

    public function __construct() {

        add_action('init', [$this, 'register_post_type']);

    }

    /**
     * ثبت Post Type هنرمندان
     */
    public function register_post_type() {

        register_post_type('artist', [

            'labels' => [
                'name'               => 'هنرمندان',
                'singular_name'      => 'هنرمند',
                'add_new'            => 'افزودن هنرمند',
                'add_new_item'       => 'افزودن هنرمند جدید',
                'edit_item'          => 'ویرایش هنرمند',
                'new_item'           => 'هنرمند جدید',
                'view_item'          => 'مشاهده هنرمند',
                'search_items'       => 'جستجوی هنرمند',
                'not_found'          => 'هنرمندی یافت نشد',
            ],

            'public' => true,

            'has_archive' => true,

            'rewrite' => [
                'slug' => 'artist'
            ],

            'menu_icon' => 'dashicons-microphone',

            'supports' => [
                'title',
                'editor',
                'thumbnail'
            ],

            'show_in_rest' => true

        ]);

    }

    /**
     * گرفتن تمام آهنگ‌های یک هنرمند
     */
    public function get_songs($artist_id) {

        return new WP_Query([

            'post_type' => 'song',

            'posts_per_page' => -1,

            'meta_query' => [

                [
                    'key' => 'artist',
                    'value' => $artist_id,
                    'compare' => '='
                ]

            ]

        ]);

    }

    /**
     * تعداد آهنگ‌ها
     */
    public function songs_count($artist_id) {

        return $this->get_songs($artist_id)->found_posts;

    }

}

new ME_Artist();