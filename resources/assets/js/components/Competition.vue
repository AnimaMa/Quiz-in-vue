<template>
    <div class="container">


        <div v-for="theme in  themes" v-if="!startQuiz" >
            <!--<input type="radio" name="theme" id="theme" v-model="theme" value="{{ theme}}" @onchange="getData"  >-->
            <input type="radio" name="theme" :id="theme" :value="theme" v-model="themeModel" @change="getData">
            <label :for="theme">{{theme}}</label><br/>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

            <summary-table
                    :quizTheme="objectResults.thema"
                    :correctAnswers="objectResults.right"
                    :percentages="objectResults.percent"/>

    </div>
</template>

<script>
    import Quiz from "./Quiz.vue";
    import SummaryTable from "./SummaryTable.vue";

    export default {
        template: 'Competition',
        components: {
            SummaryTable,
            Quiz
        },

        data() {
            return {
                urls:
                    {
                        food: 'https://api.myjson.com/bins/jqa3o',
                        animals: 'https://api.myjson.com/bins/upx5o',
                        slovakia: 'https://api.myjson.com/bins/f8nfg'
                    },

                themes: ['food', 'animals', 'slovakia'],
                themeModel: '',

                retrievedObjectResults: {},
                objectResults: {}
            }
        },

        computed: {},

        watch: {},

        methods: {
            getData() {
                console.log(this.themeModel);
                this.jsonUrl = this.urls[this.themeModel];
                console.log(this.jsonUrl);

                this.start(this.jsonUrl);

                localStorage.theme = this.themeModel;

            },


            storage() {
                this.objectResults = {
                    'thema': this.themeModel,
                    'right': this.correct,
                    'percent': this.percentageRes
                };
                // Put the object into storage
                localStorage.setItem('objectResults', JSON.stringify(this.objectResults));

                // Retrieve the object from storage
                this.retrievedObjectResults = localStorage.getItem('objectResults');

                console.log('retrievedObject: ', JSON.parse(this.retrievedObjectResults));
                console.log(this.retrievedObjectResults);
                // localStorage.clear();
            }
        },

        mounted() {
            console.log('Component Competition mounted.')
        }
    }
</script>
