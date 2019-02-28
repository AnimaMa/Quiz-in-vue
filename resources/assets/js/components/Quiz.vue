<template>
    <div class="container">
        <div>
            <button class="red"  @click="start" v-show="!startQuiz">Start quizz</button>
            <div class="quiz">
                <h1 class="h1 tac">{{titleQuiz}}</h1>

                <img v-show="!dataLoaded" src="/img/load1.gif" alt="loading" class="loadingImg">

                <count-down :num-of-questions="questions.length"
                            @timeExpired="showResults"
                            :isTimeOn="time"
                            v-show="!timeExpired"
                            :quiz-started="startQuiz"
                            />

                <div class="question" v-show="time" >

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
                    <button class="green" @click="showResults" v-show="time">Submit Answers</button>

                </div>
                <button class="green" @click="showAnswers" >Show answers</button>

                <p v-if="showPoints">You got <strong>{{ correct}}</strong> right out of {{questions.length}}. Your
                    percentage is <strong>{{percentage}}%</strong>
                </p>

                    <answers-table  v-show="!time"
                                   :userAnswer="userA"
                    />

                    <div v-for="(ans, index) in userAnswers">
                    Your answer>
                  {{ans}}
                    <div v-for="(que, i) in questions">
                        <p v-if="i === index">
                            {{que["text"]}}
                        </p>
                        <!--{{que}} + {{ i}}-->
                    </div>

                    <div v-for="(cor, ind) in correctAnswers">
                        <p v-if="ind === index">
                            Corect answer> {{cor}} </p>
                        {{question}}
                        <p v-if="questionIndex === ind">
                            {{question}}
                        </p>

                    </div>
                    <br>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import EventBus  from '../EventBus.js';
    import Question from './Question.vue';
    import CountDown from './CountDown.vue';
    import AnswersTable from "./AnswersTable.vue";

    export default {
        template: 'Quiz',
        components: {
            AnswersTable,
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
                userA: '',
                dataLoaded: false
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

            start() {
                console.log('START');

                axios.get(this.jsonUrl)
                    .then((response) => {
                        console.log('response' + response.data);
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
                        this.dataLoaded = true;

                        this.startQuiz = true;
                        EventBus.$emit('quizStarted', this.questions.length);

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
                if (!value  ){
                    console.log('pozor undefined ')
                }
                this.userAnswers[index] = value;
                console.log('answers ');
                console.log(this.userAnswers);
                console.log('answers ');
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
                        console.log('totot' + this.questions[i]);
                    }
                }
            },

            showAnswers() {
                console.log(this.userAnswers);
                console.log(this.questions);

                this.userAnswers.forEach((userAnswer, indexAns) => {
                    console.log('USER ODPOVED: ' + userAnswer + indexAns);
                    // this.userA = userAnswer;
                    this.questions.forEach((question, indexQue)=> {

                        if(indexQue === indexAns) {
                            console.log('toto je otazka ' + question.text);
                            console.log('toto je spravna ans ' + question.answer)
                        }
                    });


                });
                console.log(this.correctAnswers );
            }
        },

        mounted() {
            console.log('Component  Quiz mounted.')
        }
    }
</script>
