<template>
    <grid :position="grid" modifiers="overflow padded blue">
       <section class="meetings">
           <h1>Meetings</h1>
           <ul class="meetings__meetings">
               <li v-for="meeting in meetings"  class="meetings__meeting">
                   <h2 class="meetings__meeting__title">{{ meeting.name }}</h2>
                   <div class="meetings__meeting__date">
                       {{ timespan(meeting.starts, meeting.ends) }}
                   </div>
               </li>
           </ul>
       </section>
    </grid>
</template>

<script>
import { timespan } from '../helpers';
import echo from '../mixins/echo';
import Grid from './Grid';
import saveState from 'vue-save-state';

export default {

    components: {
        Grid,
    },

    mixins: [echo, saveState],

    props: ['grid'],

    data() {
        return {
            meetings: [],
        };
    },

    methods: {
        timespan,

        getEventHandlers() {
            return {
                'BurleighSpace.MeetingsFetched': response => {
                    this.meetings = response.meetings;
                },
            };
        },

        getSaveStateConfig() {
            return {
                cacheKey: 'meetings',
            };
        },
    },
};
</script>
