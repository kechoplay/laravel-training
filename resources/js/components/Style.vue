<template>
<!--    <div class="welcome-text">-->
<!--        This is child-->
<!--        <p class="text">This is child child</p>-->
<!--    </div>-->
    <div class="welcome-text">
        This is child
        <p class="text">This is child child</p>
    </div>
</template>

<script>
    export default {
        name: "Style"
    }
</script>

<style lang="scss" scoped module>
    .welcome-text {
        color: red;
        .text {
            color: blue;
        }
    }
</style>