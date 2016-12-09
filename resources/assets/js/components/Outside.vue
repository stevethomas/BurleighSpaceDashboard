<template>
    <grid :position="grid" modifiers="overflow padded">
        <section class="weather">
            <h1 class="weather__title">Outside</h1>
            <h2 class="weather__current">{{ current.temperature }}&deg;</h2>

            <ul>
                <li class="weather__stat" v-for="forecast in forecasts">
                    <h2 class="weather__type">{{ forecast.day }}</h2>
                    <span class="weather__value">{{ forecast.max }}&deg;</span>
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
            Grid
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
                forecasts: []
            };
        },

        methods: {
            getEventHandlers() {
                return {
                    'Weather.WeatherFetched': response => {
                         this.current = response.weather.current;
                        this.forecasts = response.weather.forecasts;
                    },
                };
            },

            getSaveStateConfig() {
                return {
                    cacheKey: 'outside'
                };
            }
        }
    };
</script>
