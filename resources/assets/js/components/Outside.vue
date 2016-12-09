<template>
    <grid :position="grid" modifiers="overflow padded">
        <section class="temperature2">
            <h1 class="temperature__title">Outside</h1>
            <h2 class="temperature__current">{{ current.temperature }}&deg;</h2>

            <ul>
                <li class="temperature__stat" v-for="forecast in forecasts">
                    <h2 class="temperature__type">{{ forecast.day }}</h2>
                    <span class="temperature__value">{{ forecast.max }}&deg;</span>
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
                current: {
                    "temperature": '',
                    "wind": '',
                    "windDirection": '',
                    "rain": ''
                },
                forecasts: [],
            };
        },

        methods: {
            getEventHandlers() {
                return {
                    'Weather.WeatherFetched': response => {
                        console.log(response);

                        this.current = response.weather.current;
                        this.forecasts = response.weather.forecasts;
                    },
                };
            },

            getSaveStateConfig() {
                return {
                    cacheKey: 'outside',
                };
            },
        },
    };
</script>
