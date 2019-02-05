<template>

    <div>

        <!--<div class="notification is-danger" v-if="error" v-for="error in errorMessage">-->
        <!--<div class="notification is-danger">-->
        <!--<p v-text="errorMessage"></p>-->
        <!--</div>-->
        <!--<p v-bind="quiz.que"></p>-->

        <div class="que">
            <br>
            <h2 class="h3">{{questionNumber}}. {{ question }}</h2>
            <br>
            <br>
            <div v-if="type === 'tf'">

                <input type="radio" :name="'currentQuestion' + questionNumber" id="trueAnswer" v-model="answerData" value="t">
                <label for="trueAnswer">True</label>
                <br/>

                <input type="radio" :name="'currentQuestion' + questionNumber" id="falseAnswer" v-model="answerData" value="f">
                <label for="falseAnswer">False</label>
                <br/>
            </div>

            <div v-if=" type === 'mc'">

                <div v-for="(mcanswer,index) in  answers">
                    <input type="radio" :id="'answer'+index" :name="'currentQuestion' + questionNumber"
                           v-model="answerData"

                           :value="mcanswer"><label :for="'answer'+index">{{mcanswer}}</label><br/>
                </div>

            </div>

        </div>
    </div>

</template>


<!-- -&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;-->
<!--https://vuejs.org/v2/api/#watch-->
<script>
    import $ from 'jquery';

    export default {
        components: {},
        name: 'Question',
        props: [
            'question', 'answer', 'questionNumber', 'type', 'answers',
        ],

        data() {
            return {
                jsonUrl: 'https://api.myjson.com/bins/by3ao',
                answerData: ''

            }
        },

        watch: {
            answerData: function () {
                console.log('next');
            }
            // '$route'(to, from) {
            //     this.category = this.$route.params.category;
            //     this.value = this.$route.params.id;
            //     this.getData();
            // }
        },

        computed: {},

        created() {
            console.log('question created');
            this.answerData = this.answer;
        },

        methods: {}
    }


</script>