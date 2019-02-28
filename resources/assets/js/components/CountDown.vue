<template>
    <div>
        <p v-show="isTimeOn" :isTimeOn="time"     v-text=" '00:' + seconds"></p>

        <p class="expired" v-show="timeExpired">Your time expired!</p>
        <br>

    </div>
</template>

<script>
    import EventBus  from '../EventBus.js';

    import $ from 'jquery';
    import moment from 'moment';

    export default {
        name: 'CountDown',
        props: {
            numOfQuestions: Number,
            isTimeOn: Boolean,
            quizStarted: Boolean
        },

        data() {
            return {
                minutes: 0,
                multiplier: 10,
                seconds: 5,
                time: true,
                timeExpired: false,
            }
        },

        computed: {
        },

        created() {
            EventBus.$on('quizStarted', (numOfQuestions) => {
                this.counter();
            });
        },

        mounted() {
            console.log('countdown mounted');
        },

        watch: {
        },

        methods: {

            counter() {
                console.log('counter in countdown');
                // this.seconds = Math.floor(this.multiplier * this.numOfQuestions);
                // this.isTimeOn = true;

                    this.seconds = 5;
                    let countDown = setInterval(() => {
                        // this.seconds = 5;

                        this.seconds--;
                        if (this.seconds <= 0) {
                            console.log('seconds == 0 ');
                            this.$emit('timeExpired');
                            this.timeExpired = true;
                            this.seconds = 0;
                            clearInterval(countDown);
                        }

                        if (this.isTimeOn === false) {
                            console.log('timeon is false ')
                            clearInterval(countDown)
                        }

                    }, 1000);
            }

        }
    }


</script>