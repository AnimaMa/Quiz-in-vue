<template>

    <div>
        <table>
            <tr>
                <th>Question</th>
                <th>Correct answers</th>
                <th>User answer</th>
            </tr>
            <tr>
                <td v-text="question"></td>
                <td v-text="correctAnswer"></td>
                <td v-text="userAnswer"></td>
            </tr>
        </table>
    </div>

</template>

<script>
    export default {
        name: "answers-table",
        props: {
            question: String,
            correctAnswer: String,
            userAnswer: String
        }
    }
</script>

