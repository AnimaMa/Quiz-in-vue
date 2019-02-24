<template>
    <div class="container">
        <div>
            <!--<a href="#" @click.stop.prevent="start" class="startButton">START☻</a>-->
            <br>

            <p class="h3">Choose a theme</p>

            <quiz v-for="theme in  themes" v-if="!startQuiz" class="themeGroup" >
                <input type="radio" name="theme" :id="theme" :value="theme" v-model="themeModel" @change="getData" title="themeModel">
                <label :for="theme">{{theme}}</label><br/>
            </quiz>

            <!--<div class="questions" v-if="startQuiz">-->
                <!--<h1 class="h2 tac">{{titleQuiz}}</h1>-->

                <!--<count-down :num-of-questions="questions.length"-->
                            <!--@timeExpired="showResults"-->
                            <!--:isTimeOn="time"/>-->

                <!--<div class="question" v-show="showQuestions">-->

                    <!--<question v-for="(question, index) in questions"-->
                              <!--v-show="index === questionIndex"-->
                              <!--@addUserAnswerInToArray="addAnswer"-->
                              <!--:question="question.text"-->
                              <!--:answer="question.answer"-->
                              <!--:answers="question.answers"-->
                              <!--:type="question.type"-->
                              <!--:question-number="index+1"-->
                              <!--:index="index"-->
                    <!--&gt;-->
                    <!--</question>-->

                    <!--<button v-on:click="prevQuestion" :disabled="questionIndex < 1">prev</button>-->
                    <!--<button v-on:click="nextQuestion" :disabled="questionIndex === questions.length-1">next</button>-->
                    <!--<br>-->
                    <!--<br>-->
                    <!--<br>-->
                    <!--<button @click="showResults">Submit Answers</button>-->


                <!--</div>-->

                <!--<div v-if="showPoints">You got <strong>{{ correct}}</strong> right out of {{questions.length}}. Your-->
                    <!--percentage is {{percentage}}%-->
                <!--</div>-->
            <!--</div>-->

            <!--<div v-if="this.questions">-->
                <!--{{ this.questions}}-->
            <!--</div>-->
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
                urls:
                    {
                        food: 'https://api.myjson.com/bins/jqa3o',
                        animals: 'https://api.myjson.com/bins/upx5o',
                        slovakia: 'https://api.myjson.com/bins/f8nfg'
                    },

                themes: ['food', 'animals', 'slovakia'],
                themeModel: '',
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
                time: true,

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

        methods: {
            getData() {
                console.log(this.themeModel);
                this.jsonUrl = this.urls[this.themeModel];
                console.log(this.jsonUrl);
                this.start(this.jsonUrl);
                localStorage.theme = this.themeModel;

            },

            start(jsonUrl) {
                console.log('START');
                axios.get(jsonUrl)
                    .then((response) => {
                        console.log(response.data);
                        this.startQuiz = true;
                        this.titleQuiz = response.data.title;
                        this.questions = response.data.questions;
                        this.type = response.data.questions.type;
                        this.showQuestions = true;

                        this.questions.forEach(que => {
                            this.correctAnswers.push(que.answer);
                        });
                        // this.$refs.timeR.counter();
                        // this.$on('start', () => {
                        //    console.log('noooo');
                        // });

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
            console.log('Component  Quizzes mounted.')
        }
    }
</script>
