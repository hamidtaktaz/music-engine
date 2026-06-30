<?php
if (!defined('ABSPATH')) {
    exit;
}
?>


<div id="me-player">

    <div class="me-player-cover">
        <img id="me-cover" src="" alt="">
    </div>

    <div class="me-player-info">

        <div id="me-title">
            هیچ آهنگی انتخاب نشده
        </div>

        <div id="me-artist">
            ---
        </div>

    </div>

    <div class="me-player-progress">

        <span id="me-current-time">00:00</span>

        <input
            id="me-progress"
            type="range"
            min="0"
            max="100"
            value="0">

        <span id="me-duration">00:00</span>

    </div>

    <div class="me-player-controls">

        <button id="me-prev">⏮</button>

        <button id="me-play">▶</button>

        <button id="me-next">⏭</button>

    </div>

    <audio id="me-audio"></audio>

</div>