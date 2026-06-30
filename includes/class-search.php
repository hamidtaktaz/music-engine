<?php

if (!defined('ABSPATH')) {
    exit;
}

class ME_Search {

    public function __construct() {

        add_action('wp_ajax_me_search', [$this, 'search']);
        add_action('wp_ajax_nopriv_me_search', [$this, 'search']);

    }

    public function search() {

        check_ajax_referer('me_search_nonce', 'nonce');

        $keyword = sanitize_text_field($_POST['keyword'] ?? '');

        if (strlen($keyword) < 2) {
            wp_send_json_success([
                'songs'   => [],
                'artists' => [],
                'albums'  => []
            ]);
        }

        $result = [
            'songs'   => $this->search_songs($keyword),
            'artists' => $this->search_artists($keyword),
            'albums'  => $this->search_albums($keyword),
        ];

        wp_send_json_success($result);

    }

    private function search_songs($keyword){

    $results = [];

    $query = new WP_Query([
        'post_type'      => 'song',
        'posts_per_page' => 8,
        's'              => $keyword
    ]);

    if($query->have_posts()){

        while($query->have_posts()){

            $query->the_post();

            $artist = get_field('artist');
            $cover  = get_field('cover_image');

            $results[] = [

                'id' => get_the_ID(),

                'title' => get_the_title(),

                'artist' => $artist ? get_the_title($artist) : '',

                'cover' => $cover
                    ? wp_get_attachment_image_url($cover,'thumbnail')
                    : '',

                'url' => get_permalink()

            ];

        }

        wp_reset_postdata();

    }

    return $results;

    }

    private function search_artists($keyword){

    $results = [];

    $query = new WP_Query([
        'post_type'      => 'artist',
        'posts_per_page' => 5,
        's'              => $keyword
    ]);

    if($query->have_posts()){

        while($query->have_posts()){

            $query->the_post();

            $results[] = [

                'id' => get_the_ID(),

                'title' => get_the_title(),

                'url' => get_permalink()

            ];

        }

        wp_reset_postdata();

    }

    return $results;

    }

    private function search_albums($keyword){

        return [];

    }

}

new ME_Search();