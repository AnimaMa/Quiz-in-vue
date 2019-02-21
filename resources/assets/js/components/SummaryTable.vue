<template>
    <div id="some-element">
        <button @click.prevent.default="removeTable"><strong>X</strong></button>

        <table>

            <tr>
                <th>Theme of quiz</th>
                <th>Correct answers</th>
                <th>Percentage</th>


            </tr>
            <tr>
                <td v-text="quizTheme"></td>
                <td v-text="correctAnswers"></td>
                <td v-text="percentages + '%'"></td>


            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        name: "summary-table",

        props: {
            quizTheme: String,
            correctAnswers: Number,
            percentages: Number
        },

        data() {
            return {}
        },

        methods: {
            removeTable() {
                let elem = document.querySelector('#some-element');
                elem.style.display = 'none';
            }
        }

    }
</script>

