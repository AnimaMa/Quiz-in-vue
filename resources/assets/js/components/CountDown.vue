<template>
    <div>

        <p @click="counter">button</p>
        <p v-show="time" v-text=" '00:' + seconds"></p>
    </div>
</template>

<script>
    import $ from 'jquery';

    export default {
        name: 'CountDown',
        props: {
            numOfQuestions: Number
        },

        data() {
            return {
                minutes: 0,
                multiplier: 10,
                seconds: '',
                time: false
            }
        },

        watch: {},

        computed: {
            // getSeconds: function () {
            //    return this.seconds = Math.floor(this.multiplier * this.numOfQuestions);
            //
            // }


        },

        created() {
            console.log('countdown created');
            console.log(this.numOfQuestions);
        },

        methods: {
            counter() {
                this.seconds = 5;
                // this.seconds = Math.floor(this.multiplier * this.numOfQuestions) + 1;
                this.time = true;
                // this.$emit('startCountDown');
                let down = setInterval(() => {

                    this.seconds--;
                    console.log(this.seconds);
                    if (this.seconds === 0) {
                        console.log('ende');
                        this.seconds = 0;
                        clearInterval(down);
                        // this.$emit('showResults');
                this.$emit('eventGreet');

                    }

                }, 1000);
                console.log(this.getSeconds);

            }

        }
    }


</script>