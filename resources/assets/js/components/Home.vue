<template>
    <div class="container">
        <div>
            Chcem vyskusat
            <router-link :to="'quiz'">Quiz</router-link>
        </div>

    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
