import './bootstrap.js';

import Echo from 'laravel-echo';
import Vue from 'vue';

import CurrentTime from './components/CurrentTime';
import GoogleCalendar from './components/GoogleCalendar';
import InternetConnection from './components/InternetConnection';
// import LastFm from './components/LastFm';
import BurleighSpace from './components/BurleighSpace';
import Meetings from './components/Meetings';
import News from './components/News';
import Inside from './components/Inside';
import Outside from './components/Outside';

new Vue({

    el: '#dashboard',

    components: {
        CurrentTime,
        GoogleCalendar,
        InternetConnection,
        // LastFm,
        BurleighSpace,
        Meetings,
        News,
        Inside,
        Outside,
    },

    created() {
        this.echo = new Echo({
            broadcaster: 'pusher',
            key: window.dashboard.pusherKey,
        });
    },
});
