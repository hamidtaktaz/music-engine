/*
====================================
Music Engine Queue
====================================
*/

MusicEngine.Queue = {

    songs: [],

    currentIndex: -1,

    set(songs) {


    	if(!Array.isArray(songs)){

        	songs=[];

    	}

    	this.songs=songs;

    	this.currentIndex=-1;

    },

    currentSong() {

        if (this.currentIndex < 0) {
            return null;
        }

        return this.songs[this.currentIndex];

    },

    play(index) {

        if (index < 0 || index >= this.songs.length) {
            return null;
        }

        this.currentIndex = index;

        return this.currentSong();

    },

    next() {

        if (!this.songs.length) {
            return null;
        }

        this.currentIndex++;

        if (this.currentIndex >= this.songs.length) {

            this.currentIndex = 0;

        }

        return this.currentSong();

    },

    prev() {

        if (!this.songs.length) {
            return null;
        }

        this.currentIndex--;

        if (this.currentIndex < 0) {

            this.currentIndex = this.songs.length - 1;

        }

        return this.currentSong();

    },

	hasSongs(){

    	return this.songs.length>0;

	}



};