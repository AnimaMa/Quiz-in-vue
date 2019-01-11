<template>
    <div class="container">
        <div>
            <a href="#" @click.stop.prevent="start" class="startButton">START☻</a>
            <br>
            <div class="questions" v-if="startQuiz">
               <h1 class="h2 tac"> {{titleQuiz}}</h1>
                <div class="question">
                    <question v-for="question in questions"
                              :question="question.text"
                        v-on:answer="question.answer"
                    :type="question.type">
                        <!--:question-number="currentQuestion+1"-->
                    <!--&gt;-->
                    </question>
                </div>

                {{this.que}}
            </div>
            <div v-if="this.questions" >
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
                que:'',
                type: ''
            }
        },

        methods: {
            start() {
                console.log('staarting');
                console.log(this.jsonUrl);
                console.log('SME V GET');
                axios.get(this.jsonUrl)
                    .then((response) => {
                        console.log(response.data);
                        this.startQuiz = true;

                        this.titleQuiz = response.data.title;
                        this.questions = response.data.questions;

                        questions.forEach( que => {
                            console.log(que.text);
                            this.type.push(que.type);
                            // this.questions.push(que);
                            // console.log(this.questions);

                            // this.questionAnswers.push(this.question.text);
                            // console.log(this.questionAnswers);
                            // this.que = que.text;
                            // console.log(que.answer);
                            // console.log(que.text);
                        });

                    })
                    .catch((error) => {
                        console.log(error);

                    });
            }

        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
