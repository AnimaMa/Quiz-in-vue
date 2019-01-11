<template>

    <div>

        <!--<div class="notification is-danger" v-if="error" v-for="error in errorMessage">-->
        <!--<div class="notification is-danger">-->
        <!--<p v-text="errorMessage"></p>-->
        <!--</div>-->
        <!--<p v-bind="quiz.que"></p>-->

        <div class="flex">
            <br>
{{question }}
            <div v-if="this.type === 'tf'">
                <input type="radio" name="currentQuestion" id="trueAnswer" v-model="answer" value="t"><label
                    for="trueAnswer">True</label><br/>
                <input type="radio" name="currentQuestion" id="falseAnswer" v-model="answer" value="f"><label
                    for="falseAnswer">False</label><br/>

            </div>

            <div v-if="this.type === 'mc'">

                <div v-for="(mcanswer,index) in question.answers">
                    {{answer}}
                    <input type="radio" :id="'answer'+index" name="currentQuestion" v-model="answer"

                           :value="mcanswer"><label :for="'answer'+index">{{mcanswer}}</label><br/>
<!--tu som skoncila aaa teraz treba nacitat aj odpovede aj je to mc-->

                </div>

            </div>


        </div>
    </div>

</template>

<script>
    import $ from 'jquery';

    export default {
        components: {},
        name: 'Question',
        props: [
            'question', 'answer', 'question-number', 'type'
        ],

        data() {
            return {
                jsonUrl: 'https://api.myjson.com/bins/by3ao',
            }
        },

        watch: {
            // '$route'(to, from) {
            //     this.category = this.$route.params.category;
            //     this.value = this.$route.params.id;
            //     this.getData();
            // }
        },

        computed: {},

        created() {
            console.log('question created');
        },

        methods: {}
    }


</script>