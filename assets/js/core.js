/*
====================================
Music Engine Core
Version 1.0
====================================
*/

window.MusicEngine = {

    version: "1.0.0",

    config: {

        debug: true,
        autoplay: true,
        repeat: false,
        shuffle: false,
        volume: 1

    },

    modules: {

        player: null,
        queue: null,
        playlist: null

    },

    init() {

        if (this.config.debug) {

            console.log(
                "Music Engine v" + this.version + " initialized"
            );

        }

    }

};

document.addEventListener("DOMContentLoaded", function () {

    MusicEngine.init();

});