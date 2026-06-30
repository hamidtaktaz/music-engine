<?php
/*
Plugin Name: Music Engine
Description: Core plugin for Music Streaming Website
Version: 1.0.0
Author: Hamid Nasiri
*/

if (!defined('ABSPATH')) {
    exit;
}

/*
|--------------------------------------------------------------------------
| Constants
|--------------------------------------------------------------------------
*/

define('ME_PATH', plugin_dir_path(__FILE__));
define('ME_URL', plugin_dir_url(__FILE__));
define('ME_VERSION', '1.0.0');

/*
|--------------------------------------------------------------------------
| Includes
|--------------------------------------------------------------------------
*/

require_once ME_PATH . 'includes/class-assets.php';
require_once ME_PATH . 'includes/class-player.php';
require_once ME_PATH . 'includes/class-shortcodes.php';
require_once ME_PATH . 'includes/class-search.php';
require_once ME_PATH . 'includes/class-artist.php';
require_once ME_PATH . 'includes/class-router.php';