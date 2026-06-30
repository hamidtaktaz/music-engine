<?php

if (!defined('ABSPATH')) {
    exit;
}

$artist = new ME_Artist();

$count = $artist->songs_count(get_the_ID());

$songs = $artist->get_songs(get_the_ID());

get_header();

?>

<div class="me-container">

<div class="me-artist-header">

    <div class="me-artist-cover">

        <?php

        if(has_post_thumbnail()){

            the_post_thumbnail('large');

        }

        ?>

    </div>

    <div class="me-artist-info">

        <span class="me-label">
            هنرمند
        </span>

        <h1>

            <?php the_title(); ?>

        </h1>

        <p>

            <?php the_content(); ?>

        </p>

        <strong>

            <?php echo $count; ?>

            آهنگ

        </strong>

        <br><br>

        <button class="me-play-all">

            ▶ پخش همه

        </button>

    </div>

</div>

<h2 class="me-section-title">

آخرین آهنگ‌ها

</h2>

<div class="me-songs">

<?php

while($songs->have_posts()){

$songs->the_post();

include ME_PATH.'templates/song-card.php';

}

wp_reset_postdata();

?>

</div>

</div>

<?php get_footer(); ?>