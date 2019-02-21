<template>
    <div>
        <p  v-show="isTimeOn" v-text=" '00:' + seconds"  ></p>

        <div v-show="timeExpired">Your time expired</div>
    </div>
</template>

<script>
    import $ from 'jquery';
    import moment from 'moment';

    export default {
        name: 'CountDown',
        props: {
            numOfQuestions: Number,
            isTimeOn: Boolean,

        },

        data() {
            return {
                minutes: 0,
                multiplier: 10,
                seconds: '',
                time: false,
                timeExpired:false,

            }
        },

        watch: {},

        computed: {

        },

        created() {
            console.log('countdown created');
            console.log(this.numOfQuestions);
            this.counter();
        },

        methods: {
            counter: function () {
                this.seconds = 5;
                // this.seconds = Math.floor(this.multiplier * this.numOfQuestions);
                this.isTimeOn = true;
                // localStorage.seconds = this.seconds;

                let countDown = setInterval(() => {

                    this.seconds--;
                    console.log(this.seconds);

                    if (this.seconds <= 0) {
                        console.log('ende');
                        this.$emit('timeExpired');
                        this.timeExpired = true;
                        this.seconds = 0;
                        clearInterval(countDown);
                    }

                    if (this.isTimeOn === false) {
                        console.log('offffffffff')
                        clearInterval(countDown)

                    }

                }, 1000);

            }

        }
    }


</script>