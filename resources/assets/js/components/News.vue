<template>
    <grid :position="grid" modifiers="overflow padded">
        <section class="news">
            <h1 class="news__title">Top Stories</h1>
            <ul>
                <li v-for="story in news">
                    <h2 class="news__story">{{ story.title }}</h2>

                    <span class="news__tag" v-for="tag in story.tags">{{ tag }}</span>
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
                news: [],
            };
        },

        methods: {
            getEventHandlers() {
                return {
                    'News.NewsFetched': response => {
                        this.news = response.news;
                    },
                };
            },

            getSaveStateConfig() {
                return {
                    cacheKey: 'news',
                };
            },
        },
    };
</script>
