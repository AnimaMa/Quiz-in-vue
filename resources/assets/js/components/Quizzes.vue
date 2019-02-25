<template>
    <div class="container">
        <div>
            <!--<a href="#" @click.stop.prevent="start" class="startButton">START☻</a>-->
            <br>

            <p class="h3">Choose a theme</p>
            <br>

            <router-link :to="{detailUrl(key), params: { msg }}" v-for="(value, key) in urlsOfQuizzes"  >
                <div class="themeGroup" >
                    <input type="radio" :name="key" :id="key" :value="key" :v-model="key" :title="key"  >
                    <label :for="theme">{{key}}</label><br/>
                </div>
            </router-link>

            <!--<router-link :to="detailUrl(key)" v-for="(value, key) in urlsOfQuizzes" @click="getData">-->
                <!--<quiz class="themeGroup" :theme="key" :jsonUrl="value">-->
                <!--</quiz>-->
            <!--</router-link>-->
            <br>
        </div>

    </div>
</template>

<script>
    import Quiz from './Quiz.vue';

    export default {
        template: 'Quizzes',
        components: {
            Quiz,
        },

        data() {
            return {
                urlsOfQuizzes:
                    {
                        food: 'https://api.myjson.com/bins/jqa3o',
                        animals: 'https://api.myjson.com/bins/upx5o',
                        slovakia: 'https://api.myjson.com/bins/f8nfg',
                    },
            }
        },

        computed: {},
        watch: {},

        methods: {
            detailUrl(theme) {
                return '/' + 'quiz' + '/' + theme;
            },

        },

        mounted() {
            console.log('Component Quizzes mounted.');

        }
    }
</script>
