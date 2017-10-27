<template>
    <grid :position="grid" modifiers="transparent">
        <section class="burleigh-space">
            <div class="burleigh-space__background"></div>
        </section>
    </grid>
</template>

<script>
import echo from '../mixins/echo';
import Grid from './Grid';
import { addClassModifiers } from '../helpers';
import saveState from 'vue-save-state';

export default {

    components: {
        Grid,
    },

    mixins: [echo, saveState],

    props: ['grid'],

    data() {
        return {
            artist: '',
            trackName: '',
            artwork: '',
            userName: '',
        };
    },

    computed: {
        currentlyPlaying() {
            return !! this.artist;
        },
        hasCover() {
            return !! this.artwork;
        },
    },

    methods: {
        addClassModifiers,

        getEventHandlers() {
            return {
                'LastFm.NothingPlaying': () => {
                    this.artist = '';
                },
                'LastFm.TrackIsPlaying': response => {
                    this.artist = response.trackInfo.artist;
                    this.trackName = response.trackInfo.trackName;
                    this.artwork = response.trackInfo.artwork;
                    this.userName = response.userName;
                },
            };
        },

        getSaveStateConfig() {
            return {
                cacheKey: 'last-fm',
            };
        },
    },
};
</script>
