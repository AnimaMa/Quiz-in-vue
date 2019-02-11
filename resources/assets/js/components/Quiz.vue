<template>
    <div class="container">
        <div>
            <!--<a href="#" @click.stop.prevent="start" class="startButton">START☻</a>-->
            <br>

            <div v-for="theme in  themes" v-if="!startQuiz">
                <!--<input type="radio" name="theme" id="theme" v-model="theme" value="{{ theme}}" @onchange="getData"  >-->
                <input type="radio" name="theme" :id="theme" :value="theme" v-model="themeModel" @change="getData">
                <label :for="theme">{{theme}}</label><br/>
            </div>

            <div class="questions" v-if="startQuiz">
                <h1 class="h2 tac"> {{titleQuiz}}</h1>
                <div class="question">

                    <question v-for="(question, index) in questions" v-show="index === questionIndex " @addUserAnswerInToArray="addAnswer"
                              :question="question.text"
                              :answer="question.answer"
                              :answers="question.answers"
                              :type="question.type"
                              :question-number="index+1"
                    >
                    </question>

                    <button v-on:click="prevQuestion" :disabled="questionIndex < 1">prev</button>
                    <button v-on:click="nextQuestion" >next</button>

                </div>
                <button > Submit Answers</button>

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
                jsonUrl: '',
                // https://api.myjson.com/bins/upx5o,https://api.myjson.com/bins/f8nfg
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
                // questionText: '',
                questionAnswers: [],
                // questionOptions: '',
                questions: [],
                // answers: [],
                questionIndex: 0,
                userAnswers:[]
            }
        },
//ak skor potvrdi submit ako vyplni vsetky tak ho upozornit
        //automaticky po zaskrtnuti sa nacita dalsia otazka //watch
//mozno po skontrolovani odpovedi pridat aj vysvetlenie preco to je tak
        computed: {
            checkAnswers: function () {
                console.log('check answers');
                // this.questions.filter( que => {
                //     console.log(que);
                // })
            },

        },

        watch: {

        },

        methods: {
            getData() {
                console.log(this.themeModel);
                this.jsonUrl = this.urls[this.themeModel];
                console.log(this.jsonUrl);
                this.start(this.jsonUrl);


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

                        response.data.questions.filter(que => {

                            if (que.answers) {
                                this.answers.push(que.answers);
                                // this.answer = que.answer;
                                console.log(this.answers);
                            }
                        });


                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
//musime do this.answer nastavit hodnotu ked sa nacita otazka, nieked kviz

            nextQuestion() {
                this.questionIndex++;
            },

            prevQuestion() {
                this.questionIndex--;

            },

            addAnswer(value) {

                console.log('------*-*');
                console.log(this.answer);
                this.userAnswers.push(value);



                // console.log(this.question.ans);
                // this.questions.forEach( que => {
                //
                //     if(value === this.answer) {
                //         console.log('yes');
                //     }
                //     else {
                //         console.log('nope');
                //     }
                // });

              //   this.userAnswers = value;
                console.log(this.userAnswers)
            },

            // showResults(value) {
            //     console.log( value);
            //     this.child = value;
            //     console.log(this);
            //     this.questions.forEach( que  => {
            //         console.log(que.answer);
            //         console.log('------------------------');
            //
            //         // console.log(this.answerData);
            //         // console.log(questionIndex + 1);
            //     })
            //
            // },

        },

        mounted() {
            console.log('Compon ent mounted.')
        }
    }
</script>
