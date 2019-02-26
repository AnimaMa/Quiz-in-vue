<template>
    <div class="container">
        <div>
            <button  @click="getData" v-show="!startQuiz">Start quizz</button>
            <div class="quiz">
                <h1 class="h2 tac">{{titleQuiz}}</h1>

                <img v-show="!startQuiz" src="/img/load1.gif" alt="loading">

                <count-down :num-of-questions="questions.length"
                            @timeExpired="showResults"
                            :isTimeOn="time"
                            v-show="!timeExpired"


                            />

                <div class="question">

                    <question v-for="(question, index) in questions"
                              v-show="index === questionIndex"
                              @addUserAnswerInToArray="addAnswer"
                              :question="question.text"
                              :answer="question.answer"
                              :answers="question.answers"
                              :type="question.type"
                              :question-number="index+1"
                              :index="index"

                    >
                    </question>

                    <button v-on:click="prevQuestion" :disabled="questionIndex < 1">prev</button>
                    <button v-on:click="nextQuestion" :disabled="questionIndex === questions.length-1">next</button>
                    <br>
                    <br>
                    <br>
                    <button @click="showResults">Submit Answers</button>

                </div>

                <div v-if="showPoints">You got <strong>{{ correct}}</strong> right out of {{questions.length}}. Your
                    percentage is {{percentage}}%
                </div>
            </div>

        </div>

    </div>
</template>

<script>
    import Question from './Question.vue';
    import CountDown from "./CountDown.vue";

    export default {
        template: 'Quiz',
        components: {
            Question,
            CountDown,
        },
        props: [
            'theme', 'jsonUrl', 'id'
        ],

        data() {
            return {
                startQuiz: false,
                titleQuiz: '',
                questionAnswers: [],
                questions: [],
                questionIndex: 0,
                userAnswers: [],
                correctAnswers: [],
                correct: 0,
                showPoints: false,
                showQuestions: false,
                percentage: 0,
                time: false,
                timeExpired: false,
            }
        },

        //ak skor potvrdi submit ako vyplni vsetky tak ho upozornit
        //automaticky po zaskrtnuti sa nacita dalsia otazka //watch
        //mozno po skontrolovani odpovedi pridat aj vysvetlenie preco to je tak
        //musime do this.answer nastavit hodnotu ked sa nacita otazka, nieked kviz
        computed: {
            percentageRes: function () {
                return (this.correct / this.questions.length) * 100;
            }
        },

        watch: {},
        created() {
            console.log('Quiz created');
        },

        methods: {
            getData() {
                console.log('getdataa' + this.jsonUrl);
                this.start(this.jsonUrl);
            },

            start(jsonUrl) {
                console.log(jsonUrl);
                console.log('START');


                axios.get(jsonUrl)
                    .then((response) => {
                        console.log('response' + response.data);
                        console.log(response.data);
                        this.startQuiz = true;
                        this.titleQuiz = response.data.title;
                        this.questions = response.data.questions;
                        this.type = response.data.questions.type;
                        this.showQuestions = true;

                        this.questions.forEach(que => {
                            this.correctAnswers.push(que.answer);
                        });
                        this.showQuestions = true;
                        this.time = true;

                        this.startQuiz = true;
                    })

                    .catch((error) => {
                        console.log(error);
                    });
            },

            nextQuestion() {
                this.questionIndex++;
            },

            prevQuestion() {
                this.questionIndex--;
            },

            addAnswer(value, index) {
                this.userAnswers[index] = value;
            },
            handler(params) {
                console.log(params);
            },

            showResults() {

                this.showQuestions = false;

                this.time = false;

                for (let i = 0; i < this.correctAnswers.length; i++) {
                    if (this.correctAnswers[i] === this.userAnswers[i]) {
                        console.log(this.correctAnswers[i] + ' - - ' + this.userAnswers[i]);
                        this.correct++;
                    }
                }
                this.percentage = this.percentageRes;

                this.showPoints = true;

                console.log('results');
                for (let i = 0; i < this.questions.length; i++) {
                    console.log('results2');

                    if (this.questions[i] === this.userAnswers[i]) {
                        console.log(this.questions[i]);
                    }
                }
            },
        },

        mounted() {
            console.log('Component  Quiz mounted.')
        }
    }
</script>
