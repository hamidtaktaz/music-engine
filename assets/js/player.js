/*
====================================
Music Engine Player
Version 2.0.0
====================================
*/

MusicEngine.Player = {

    audio: null,

    currentSong: null,

    playButton: null,
    nextButton: null,
    prevButton: null,

    progress: null,

    currentTime: null,
    duration: null,

    init() {

    if (this.audio) {
        return;
    }

    this.audio = document.getElementById("me-audio");

    if (!this.audio) {
        return;
    }

    this.playButton = document.getElementById("me-play");
    this.nextButton = document.getElementById("me-next");
    this.prevButton = document.getElementById("me-prev");

    this.progress = document.getElementById("me-progress");
    this.currentTime = document.getElementById("me-current-time");
    this.duration = document.getElementById("me-duration");

    this.bindEvents();

},

    bindEvents() {

	this.audio.addEventListener("play", () => {

    		if (this.playButton) {

        		this.playButton.innerHTML = "⏸";

    		}

	});

	this.audio.addEventListener("pause", () => {

    		if (this.playButton) {

        		this.playButton.innerHTML = "▶";

    		}

	});





        /*
        ============================
        Play / Pause
        ============================
        */

        if (this.playButton) {

            this.playButton.addEventListener("click", () => {

                this.toggle();

            });

        }

        /*
        ============================
        Next
        ============================
        */

        if (this.nextButton) {

            this.nextButton.addEventListener("click", () => {

                const song = MusicEngine.Queue.next();

                if (song) {

                    this.load(song);

                }

            });

        }

        /*
        ============================
        Previous
        ============================
        */

        if (this.prevButton) {

            this.prevButton.addEventListener("click", () => {

                const song = MusicEngine.Queue.prev();

                if (song) {

                    this.load(song);

                }

            });

        }

        /*
        ============================
        Song Finished
        ============================
        */

        this.audio.addEventListener("ended", () => {

            const song = MusicEngine.Queue.next();

            if (song) {

                this.load(song);

            }

        });

        /*
        ============================
        Loaded Metadata
        ============================
        */

        this.audio.addEventListener("loadedmetadata", () => {

            if (this.progress) {

                this.progress.max = Math.floor(this.audio.duration);

            }

            if (this.duration) {

                this.duration.textContent = this.formatTime(this.audio.duration);

            }

        });

        /*
        ============================
        Time Update
        ============================
        */

        this.audio.addEventListener("timeupdate", () => {

            if (this.progress) {

                this.progress.value = Math.floor(this.audio.currentTime);

            }

            if (this.currentTime) {

                this.currentTime.textContent = this.formatTime(this.audio.currentTime);

            }

        });

        /*
        ============================
        Progress Seek
        ============================
        */

        if (this.progress) {

            this.progress.addEventListener("input", () => {

                this.audio.currentTime = this.progress.value;

            });

        }

    },

    /*
    ============================
    Load Song
    ============================
    */

    load(song) {

        if (!song) {
            return;
        }

        this.currentSong = song;

        this.audio.src = song.audio;

        this.updateUI(song);

        this.play();

    },

    /*
    ============================
    Play
    ============================
    */

    play() {

        if (!this.audio) {
            return;
        }

        this.audio.play().catch(() => {});


    },

    /*
    ============================
    Pause
    ============================
    */

    pause() {

        if (!this.audio) {
            return;
        }

        this.audio.pause();


    },




    /*
    ============================
    Toggle
    ============================
    

    toggle() {

        if (!this.audio) {
            return;
        }

        if (this.audio.paused) {

            this.play();

        } else {

            this.pause();

        }

    },
    */
    
    toggle() {

    console.log("Toggle Clicked");

    if (!this.audio) {
        return;
    }

    if (this.audio.paused) {

        this.play();

    } else {

        this.pause();

    }

},
    

    /*
    ============================
    Update UI
    ============================
    */

    updateUI(song) {

        const title = document.getElementById("me-title");
        const artist = document.getElementById("me-artist");
        const cover = document.getElementById("me-cover");

        if (title) {
            title.textContent = song.title || "";
        }

        if (artist) {
            artist.textContent = song.artist || "";
        }

        if (cover) {
            cover.src = song.cover || "";
        }

    },

    /*
    ============================
    Format Time
    ============================
    */

    formatTime(seconds) {

        if (isNaN(seconds)) {
            return "00:00";
        }

        const minutes = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);

        return (
            String(minutes).padStart(2, "0") +
            ":" +
            String(secs).padStart(2, "0")
        );

    }

};


