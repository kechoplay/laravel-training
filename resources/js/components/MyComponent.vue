<template>
    <div class="my-component">
        This is my first component
        <div>
            <button v-on:click="sayHello">Click me</button>
            <p>{{ title }}</p>
<!--            <p>{{ sayHello() }}</p>-->
            <p>{{ reverseMessage }}</p>
            <input type="text" v-model="message">
            <div class="list-rendering">
                <ul>
                    <li v-for="(food, index) in foods" v-if="food.id > 1">{{ index }} - {{ food.name }}</li>
                </ul>
                <ul>
<!--                    sử dụng computed thay cho v-if-->
                    <li v-for="(food, index) in listCompletedFoods">{{ index }} - {{ food.name }}</li>
                </ul>
                <ul>
                    <li v-for="(info, index) in myInfo">{{ index }} - {{ info }}</li>
                </ul>
            </div>
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
                message: '',
                foods: [
                    {id: 1, name: 'Hamburger'},
                    {id: 2, name: 'Sandwich'},
                    {id: 3, name: 'Chicken chop'},
                ],
                myInfo: {
                    name: 'Mai Trung Duc',
                    age: '2x',
                    country: 'vietnam'
                }
            }
        },
        computed: {
            reverseMessage() {
                return this.message.split('').reverse().join('')
            },
            listCompletedFoods() {
                return this.foods.filter(item => item.id > 1)
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