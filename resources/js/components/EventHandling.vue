<template>
    <div class="event-handling">
        <div @click="alertHello" class="click event">
            <div>Current Number: {{ counter }}</div>
            <button @click.stop="counter++">Click</button>
        </div>
        <div class="form event">
<!--            <form v-on:submit.prevent="changeForm">-->
<!--                <button type="submit">Submit</button>-->
<!--            </form>-->
            <form>
                <button type="submit" v-on:click.prevent="changeForm">Submit</button>
            </form>
        </div>
        <div class="key-event event">
            <input @keyup.enter="alertHello">

            <input @keyup.13="alertHello">
        </div>
    </div>
</template>

<script>
    export default {
        name: "EventHandling",
        data() {
            return {
                counter: 0
            }
        },
        methods: {
            alertHello() {
                alert('Hello')
            },
            changeForm() {
                alert('form stop')
            }
        }
    }
</script>

<style scoped>
    .event {
        border: red thin solid;
        margin: 10px;
        padding: 10px;
    }
</style>