<template>

    <div>

        <!--<div class="notification is-danger" v-if="error" v-for="error in errorMessage">-->
        <div class="notification is-danger">
            <p v-text="errorMessage"></p>
        </div>
Question
        <button @click="getData">getData</button>

        <div class="flex">

            <strong>{{ text }} </strong>
            <br>

            <!--<div v-if="question.type === 'tf'">-->
                <input type="radio" name="currentQuestion" id="trueAnswer" v-model="answer" value="t"><label for="trueAnswer">True</label><br/>
                <input type="radio" name="currentQuestion" id="falseAnswer" v-model="answer" value="f"><label for="falseAnswer">False</label><br/>
            <!--</div>-->



            <!--<div class="box prop">-->
            <!--&lt;!&ndash;&ndash;&gt;-->

            <!--<div class="row bold " v-for="prop in properties">-->

            <!--<span v-text="prop" class="highlight"></span> :-->

            <!--<div v-if=" Array.isArray(data[prop])">-->
            <!--<span v-for="url in data[prop]">-->
            <!--|-->
            <!--<router-link :to="detailUrl(getCategoryFromUrl(url), getValueFromUrl(url))"-->
            <!--v-text="getValueFromUrl(url)">-->
            <!--</router-link>-->
            <!--</span>-->
            <!--</div>-->

            <!--<div v-else-if="typeof data[prop] === 'string' && data[prop].includes('https')">-->
            <!--<a :href="data[prop]" v-text="data[prop].slice(-2, -1)"></a>-->
            <!--</div>-->

            <!--<div v-else>-->
            <!--<span v-text="data[prop]"></span>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->

        </div>
    </div>

</template>

<script>
    import $ from 'jquery';

    export default {
        components: {},
        name: 'Question',
        props: [
            'question'
        ],

        data() {
            return {
                jsonUrl: 'https://api.myjson.com/bins/t0zvc',
                text:''

            }
        },

        watch: {
            // '$route'(to, from) {
            //     this.category = this.$route.params.category;
            //     this.value = this.$route.params.id;
            //     this.getData();
            // }
        },

        computed: {


            // urlApi: function () {
            //     console.log('URLAPI');
            //
            //
            //     if (this.category && this.value) {
            //         this.error = false;
            //
            //         if (!this.value.match(this.regexOnlyNumbers)) {
            //             console.log('VALUE IS NOT NUMBER');
            //
            //             if (this.value.indexOf(' ') >= 0) {
            //                 this.valueWithoutSpaces = this.value.split(' ').join(this.replacementOfSpace);
            //                 console.log('space' );
            //
            //             } else {
            //                 this.valueWithoutSpaces = this.value;
            //
            //             }
            //
            //             this.endOfUrl = this.category + '/?search=' + this.valueWithoutSpaces;
            //
            //             console.log('URLAPI IF IS NOT ID:  ' + this.startUrlApi + this.endOfUrl);
            //             // return this.startUrlApi + this.endOfUrl;
            //             // this.getData(this.startUrlApi + this.endOfUrl);
            //         } else {
            //             console.log('value is number');
            //
            //             this.endOfUrl = this.category + '/' + this.value;
            //             console.log('URL WITH ID: ' + this.startUrlApi + this.endOfUrl);
            //             return this.startUrlApi + this.endOfUrl;
            //         }
            //
            //     } else {
            //         return this.errorMessage = 'vyplnte udaje';
            //     }
            // },

        },

        created() {
            // this.getData();
            console.log('qmounted');
            axios.get(this.jsonUrl)
                .then((response) => {
                    console.log(response.data.questions);
                    this.text = response.data.questions.text;
                })
                .catch((error) => {
                    console.log(error);

                });
        },

        methods: {

            // errorHandle(detail) {
            //     this.error = true;
            //
            //     if (detail === 'Not found') {
            //         this.errorMessage = ' Adresa nebola nájdená';
            //         this.properties = [];
            //     } else if (detail === 'urlapi') {
            //         this.errorMessage = ' ';
            //     }
            //
            // },

            // detailUrl(category, id) {
            //     return '/' + category + '/' + id;
            // },
            //
            // getValueFromUrl(url) {
            //     console.log( 'id ' + this.valueIsId);
            //     if (this.value.match(this.regexOnlyNumbers)) {
            //         let urlWithoutSlash = url.substring(0, url.length - 1);
            //         this.valueIsId = true;
            //         return urlWithoutSlash.substring(urlWithoutSlash.lastIndexOf('/') + 1);
            //     }
            // },
            //
            // getCategoryFromUrl(url) {
            //     if (this.value.match(this.regexOnlyNumbers)) {
            //         console.log('getcat');
            //         let splitUrl = url.split('/');
            //         return splitUrl[4];
            //     }


        getData(url) {
            console.log(this.jsonUrl);
            console.log('SME V GET');
            axios.get(this.jsonUrl)
                .then((response) => {
                    console.log(response.data.questions);
                    //
                    // this.error = false;
                    // this.data = response.data;
                    // this.setProperties();
                })
                .catch((error) => {
                    console.log(error);
                    // this.loading = false;
                    // this.errorLoad = true;
                    //
                    // if (error.response.data.detail) {
                    //     this.errorDetail = error.response.data.detail;
                    //     this.errorHandle(this.errorDetail);
                    // }

                });

    }
    ,

    // setProperties()
    // {
    //     this.properties = [];
    //     for (let property in this.data) {
    //         if (this.data.hasOwnProperty(property)) {
    //             if (!this.forbiddenProperties.includes(property)) {
    //                 this.properties.push(property);
    //             }
    //         }
    //     }
    // }

    }
    }


</script>