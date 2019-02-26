<template>
    <div class="container">


        <div class="">
            <div>
                <router-link :to="'quizzes'"><h3 class="h2">Quizzes</h3></router-link>
            </div>

        </div>
        <!--<button @click="storage"> Storage</button>-->

            <!--<summary-table-->
                    <!--:quizTheme="objectResults.thema"-->
                    <!--:correctAnswers="objectResults.right"-->
                    <!--:percentages="objectResults.percent"/>-->

    </div>
</template>

<script>
    import SummaryTable from "./SummaryTable.vue";

    export default {
        template: 'Competitions',
        components: {
            SummaryTable,
            // Quizzes
        },

        data() {
            return {

                retrievedObjectResults: {},
                objectResults: {}
            }
        },

        computed: {},

        watch: {},

        methods: {
            getData() {
                // console.log(this.themeModel);

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
