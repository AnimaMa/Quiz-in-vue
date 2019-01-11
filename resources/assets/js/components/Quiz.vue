<template>
    <div class="container">
        <div>
            <button @click="start">START!</button>
            <!--<li v-for="question in questions">-->
            <div class="questions" v-if="startQuiz">
                <question>
                    <!--:question="questions[currentQuestion]"-->
                    <!--v-on:answer="handleAnswer"-->
                    <!--:question-number="currentQuestion+1"-->
                </question>
            </div>
            <!--</li>-->

        </div>


    </div>
</template>

<script>
    import Question from './Question.vue';

    export default {
        template: 'Quiz',
        components: {
            Question
        },
        data() {
            return {
                jsonUrl: 'https://api.myjson.com/bins/t0zvc',
                startQuiz: false,

                questionText: '',
                questionAnswer:'',
                questionOptions: ''
            }
        },

        methods: {
            start(){
                console.log('staarting');
                console.log(this.jsonUrl);
                console.log('SME V GET');
                axios.get(this.jsonUrl)
                    .then((response) => {
                        console.log(response.data);
                        this.startQuiz = true;
                        this.questionText = response.data.questions.text;

                        //
                        // this.error = false;
                        // this.data = response.data;
                        // this.setProperties();
                    })
                    .catch((error) => {
                        console.log(error);
                        // this.loading = false;
                        // this.errorLoad = true;
                        //
                        // if (error.response.data.detail) {
                        //     this.errorDetail = error.response.data.detail;
                        //     this.errorHandle(this.errorDetail);
                        // }

                    });
            }

        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
