<template>
    <div class="api-calling">
        <div class="create-form">
            <div class="product-name-input">
                <input type="text" v-model="product.name">
            </div>
            <div class="product-name-input">
                <input type="text" v-model.number="product.price">
            </div>
            <div class="button-create">
                <button @click="createProduct">Create</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ApiCalling",
        data() {
            return {
                product: {
                    name: '',
                    price: 0
                }
            }
        },
        methods: {
            createProduct() {
                axios.post('/products', {
                    name: this.product.name,
                    price: this.product.price
                }).then(response => {
                    console.log(response.data.result)
                }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
</script>

<style scoped>

</style>