<template>
    <div class="container">
        <div>
            <router-link :to="'competition'"><h3 class="h2">Competitions</h3></router-link>
        </div>

    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component Home mounted.')
        }
    }
</script>
