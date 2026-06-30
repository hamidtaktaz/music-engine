<?php

if (!defined('ABSPATH')) {
    exit;
}

$cover    = get_field('cover_image');
$artist   = get_field('artist');
$duration = get_field('duration');
$audio    = get_field('audio_url');

/* نام هنرمند */
$artist_name = '';

if ($artist) {
    $artist_name = get_the_title($artist);
}

/* آدرس کاور */
$cover_url = '';

if ($cover) {
    $cover_url = wp_get_attachment_image_url($cover, 'medium');
}

?>

<div class="me-song">

    <div class="me-song-cover">

        <?php

        if ($cover) {

            echo wp_get_attachment_image($cover, 'medium');

        } else {

            echo '<div class="me-no-cover">🎵</div>';

        }

        ?>

    </div>

    <div class="me-song-content">

        <h3 class="me-song-title">
            <?php the_title(); ?>
        </h3>

        <p class="me-artist">

            <?php

            if ($artist) {

                echo '<a href="' . get_permalink($artist) . '">';
                echo esc_html($artist_name);
                echo '</a>';

            } else {

                echo 'هنرمند نامشخص';

            }

            ?>

        </p>

        <?php if ($duration): ?>

            <span class="me-duration">

                <?php echo esc_html($duration); ?>

            </span>

        <?php endif; ?>

        <button
            class="me-play-button"

            data-id="<?php the_ID(); ?>"

            data-audio="<?php echo esc_url($audio); ?>"

            data-title="<?php echo esc_attr(get_the_title()); ?>"

            data-artist="<?php echo esc_attr($artist_name); ?>"

            data-cover="<?php echo esc_url($cover_url); ?>">

            ▶ پخش

        </button>

    </div>

</div>