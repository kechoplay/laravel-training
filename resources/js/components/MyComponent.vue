<template>
    <div class="my-component">
        This is my first component
        <div>
            <button v-on:click="sayHello">Click me</button>
            <p>{{ title }}</p>
<!--            <p>{{ sayHello() }}</p>-->
            <p>{{ reverseMessage }}</p>
            <input type="text" v-model="message">
        </div>
    </div>
</template>

<script>
    export default {
        name: "MyComponent",
        data() {
            return {
                title: 'Xin chao',
                // title: this.sayHello()
                message: ''
            }
        },
        computed: {
            reverseMessage() {
                return this.message.split('').reverse().join('')
            }
        },
        watch: {
            message: function(newValue, oldValue) {
                console.log('message changed');
                if (newValue.length > 50)
                    this.message = oldValue;
            },
            reverseMessage() {
                console.log('Computed changed')
            }
        },
        methods: {
            sayHello() {
                // return 'this function return value'
                // alert('this function return value')
                this.title = 'this function return value'.toUpperCase();
                this.message = 'welcome to my house'
            }
        }
    }
</script>

<style scoped>
    .my-component {
        color: #ff0000;
    }
</style>