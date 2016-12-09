<template>
    <grid :position="grid" modifiers="overflow padded">
        <section class="temperature">
            <h1 class="temperature__title">Inside</h1>
            <h2 class="temperature__current" :class="statusClass">{{ current }}&deg;</h2>

            <ul>
                <li class="temperature__stat">
                    <h2 class="temperature__type">Average</h2>
                    <span class="temperature__value">{{ average }}&deg;</span>
                </li>
                <li class="temperature__stat">
                    <h2 class="temperature__type">Min</h2>
                    <span class="temperature__value">{{ lowest }}&deg;</span>
                </li>
                <li class="temperature__stat">
                    <h2 class="temperature__type">Max</h2>
                    <span class="temperature__value">{{ highest }}&deg;</span>
                </li>
            </ul>
        </section>
    </grid>
</template>

<script>
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
                current: '',
                status: '',
                average: '',
                lowest: '',
                highest: '',
            };
        },

        computed: {
            statusClass() {
                if (this.status == 1) {
                    return 'temperature__nominal'
                }

                if (this.status == 2) {
                    return 'temperature__cold'
                }

                if (this.status == 3) {
                    return 'temperature__hot'
                }
            }
        },

        methods: {
            getEventHandlers() {
                return {
                    'Temperature.TemperatureFetched': response => {
                        this.current = response.temperature.state.current;
                        this.status = response.temperature.state.status;
                        this.average = response.temperature.state.average;
                        this.lowest = response.temperature.state.lowest;
                        this.highest = response.temperature.state.highest;
                    },
                };
            },

            getSaveStateConfig() {
                return {
                    cacheKey: 'inside',
                };
            },
        },
    };
</script>
