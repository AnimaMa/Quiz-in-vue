<template>
    <div class="container">
        <div>
            <a href="#" @click.stop.prevent="start" class="startButton">START☻</a>
            <br>
            <div class="questions" v-if="startQuiz">
                <h1 class="h2 tac"> {{titleQuiz}}D</h1>
                <div class="question">

                    <question v-for="(question, index) in questions"
                              :question="question.text"
                              v-on:answer="question.answer"
                              :answers="question.answers"
                              :type="question.type"
                              :question-number="index+1">

                    </question>

                </div>

                <button @click="submitAnswers"> Submit Answers</button>

            </div>

            <div v-if="this.questions">
                {{ this.questions}}
            </div>

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
                jsonUrl: 'https://api.myjson.com/bins/by3ao',
                startQuiz: false,
                titleQuiz: '',
                questionText: '',
                questionAnswers: [],
                questionOptions: '',
                questions: [],
                que: '',
                type: '',
                answers: []
            }
        },

        computed: {
            checkAnswers: function() {
                this.questions.filter( que => {
                    console.log(que );
                })
            }
        },

        methods: {
            start() {
                console.log('START');

                axios.get(this.jsonUrl)
                    .then((response) => {
                        console.log(response.data);
                        this.startQuiz = true;

                        this.titleQuiz = response.data.title;
                        this.questions = response.data.questions;
                        this.type = response.data.questions.type;

                        response.data.questions.filter(que => {
                            if (que.answers) {
                                this.answers.push(que.answers);
                                console.log(this.answers);
                            }
                        });
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            submitAnswers() {
                console.log('submit');
                this.checkAnswers();
            }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
