<template>
    <div>
        <p v-show="time" v-text=" '00:' + seconds" ></p>

        <div v-show="showAw">Čas vypršal</div>
    </div>
</template>

<script>
    import $ from 'jquery';
    import moment from 'moment';

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
                time: false,
                showAw:false,
            }
        },

        watch: {},

        computed: {},

        created() {
            console.log('countdown created');
            console.log(this.numOfQuestions);
            this.counter();
        },

        methods: {
            counter: function () {
                this.seconds = 8;
                // this.seconds = Math.floor(this.multiplier * this.numOfQuestions);
                this.time = true;

                let down = setInterval(() => {

                    this.seconds--;
                    console.log(this.seconds);


                    if (this.seconds <= 0) {
                        console.log('ende');

                        this.showAw = true;
                        this.time = false;
                        this.$emit('timeExpired');

                        this.seconds = 0;
                        clearInterval(down);
                    }

                }, 1000);
            }

        }
    }


</script>