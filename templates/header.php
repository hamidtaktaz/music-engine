<?php
if (!defined('ABSPATH')) exit;
?>

<header class="me-header">

    <div class="me-header-right">

        <div class="me-logo">
            🎵 Music Engine
        </div>

    </div>

    <div class="me-header-center">

        <input
            type="text"
            id="me-search"
            placeholder="جستجوی آهنگ، هنرمند، آلبوم ...">

    </div>

    <div class="me-header-left">

        <?php if(is_user_logged_in()): ?>

            <span class="me-user">

                سلام،
                <?php echo wp_get_current_user()->display_name; ?>

            </span>

        <?php else: ?>

            <a href="<?php echo wp_login_url(); ?>" class="me-login">

                ورود

            </a>

        <?php endif; ?>

    </div>

</header>