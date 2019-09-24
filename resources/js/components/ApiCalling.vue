<template>
    <div class="api-calling">
        <div class="error">
            <span></span>
        </div>
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
        <hr>
        <div class="list-products">
            <h2>LIST PRODUCT</h2>
            <div class="product-table">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date created</th>
                        <th>Sửa</th>
<!--                        <th>Xóa</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(prod, key) in list_products">
<!--                        <td>{{ key + 1 }}</td>-->
<!--                        <td>{{ prod.name }}</td>-->
<!--                        <td>{{ prod.price }}</td>-->
<!--                        <td>{{ prod.created_at }}</td>-->
<!--                        <td><button @click="edit()">Sửa</button></td>-->
<!--                        <td><button>Xóa</button></td>-->
                        <td>{{ prod.id }}</td>
                        <td v-if="!prod.isEdit">
                            {{ prod.name }}
                        </td>
                        <td v-else>
                            <input type="text" class="form-control" v-model="prod.name">
                        </td>
                        <td v-if="!prod.isEdit">
                            {{ prod.price }}
                        </td>
                        <td v-else>
                            <input type="text" class="form-control" v-model.number="prod.price">
                        </td>
                        <td>{{ prod.created_at }}</td>
                        <td v-if="!prod.isEdit"><button class="btn btn-success" @click="prod.isEdit = true">Edit</button></td>
                        <td v-else>
                            <button class="btn btn-primary" @click="updateProduct(prod)">Save</button>
                            <button class="btn btn-danger" @click="prod.isEdit = false">Cancel</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        name: "ApiCalling",
        data() {
            return {
                product: {
                    name: '',
                    price: 0
                },
                list_products: []
            }
        },
        created() {
            this.getListProducts();
        },
        methods: {
            formatDate(d) {
                var dformat = [ d.getFullYear(), (d.getMonth()+1),
                        d.getDate()
                    ].join('/')+
                    ' ' +
                    [ d.getHours(),
                        d.getMinutes(),
                        d.getSeconds()].join(':');
                return dformat
            },
            createProduct() {
                var error = $('.error');
                axios.post('/products', {
                    name: this.product.name,
                    price: this.product.price
                }).then(response => {
                    if (!response.data.success) {
                        error.html('');
                        if (response.data.errors.name) {
                            error.append(`<span>${response.data.errors.name[0]}</span>`);
                        }
                        if (response.data.errors.price) {
                            error.append(`<span>${response.data.errors.price[0]}</span>`);
                        }
                        return;
                    }
                    this.list_products.push({
                        id: response.data.data.id,
                        name: response.data.data.name,
                        price: response.data.data.price,
                        // created_at: response.data.data.created_at,
                        created_at: moment().format('YYYY-MM-DD HH:mm:ss'),
                        isEdit: false
                    });
                    alert('thanh cong');
                    // location.reload();
                }).catch(error => {
                    console.log(error)
                })
            },
            getListProducts() {
                axios.get('/products')
                    .then(response => {
                        this.list_products = response.data;
                        this.list_products.forEach(item => {
                            // item.isEdit = false;
                            Vue.set(item, 'isEdit', false)
                        });
                        console.log(this.list_products);
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            updateProduct(product) {
                axios.put('/products/' + product.id, {name: product.name, price: product.price})
                    .then(response => {
                        console.log(response.data.result)
                        product.isEdit = false
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors.name
                    })
            }
        }
    }
</script>

<style scoped>
    .error {
        color: red;
    }
</style>