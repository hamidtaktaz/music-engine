<?php
if (!defined('ABSPATH')) exit;
?>

<div class="me-home">

    <div class="me-container">

        <?php include ME_PATH.'templates/header.php'; ?>

        <div class="me-layout">

            <?php include ME_PATH.'templates/sidebar.php'; ?>

            <main class="me-content">

                <section class="me-section">

                    <h2>جدیدترین آهنگ‌ها</h2>

                    <div class="me-songs">

                        <?php

                        $songs = new WP_Query([
                            'post_type'=>'song',
                            'posts_per_page'=>12
                        ]);

                        while($songs->have_posts()):

                            $songs->the_post();

                            include ME_PATH.'templates/song-card.php';

                        endwhile;

                        wp_reset_postdata();

                        ?>

                    </div>

                </section>

            </main>

        </div>

    </div>

</div>