/*
====================================
Music Engine App
Version 1.0
====================================
*/

document.addEventListener("DOMContentLoaded", function () {

    // راه‌اندازی Player
    if (MusicEngine.Player) {
        MusicEngine.Player.init();
    }

    // دریافت دکمه‌های پخش
    const buttons = document.querySelectorAll(".me-play-button");

    const songs = [];

    buttons.forEach(function (button) {

        songs.push({

            id: button.dataset.id,
            title: button.dataset.title,
            artist: button.dataset.artist,
            audio: button.dataset.audio,
            cover: button.dataset.cover

        });

    });

    // ارسال آهنگ‌ها به Queue
    MusicEngine.Queue.set(songs);

    // رویداد کلیک روی هر آهنگ
    buttons.forEach(function (button) {

        button.addEventListener("click", function () {

            const index = songs.findIndex(function (song) {

                return song.id === button.dataset.id;

            });

            const song = MusicEngine.Queue.play(index);

            if (song) {

                MusicEngine.Player.load(song);

            }

        });

    });

});