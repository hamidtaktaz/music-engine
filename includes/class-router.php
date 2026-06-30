<?php

if (!defined('ABSPATH')) {
    exit;
}

class ME_Router {

    public function __construct() {

        add_filter('template_include', [$this, 'load_template']);

    }

    public function load_template($template) {

        if (is_singular('artist')) {

            $file = ME_PATH . 'templates/single-artist.php';

            if (file_exists($file)) {
                return $file;
            }

        }

        return $template;

    }

}

new ME_Router();