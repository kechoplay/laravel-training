<template>
    <div class="user-management">
        <div class="create-user container" v-if="checkIsAdmin">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" v-model="userCreate.name" class="form-control" placeholder="Name...">
                </div>
                <div class="col-md-3">
                    <input type="email" v-model="userCreate.email" class="form-control" placeholder="User email...">
                </div>
                <div class="col-md-3">
                    <select class="form-control" v-model="userCreate.role">
                        <option value="employee">Employee</option>
                        <option value="saler">Saler</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary" @click="createUser">Create</button>
                </div>
            </div>
        </div>
        <div class="list_user table-responsive container">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td v-if="checkIsAdmin()">Action</td>
                </tr>
                </thead>
                <tbody v-if="list_users.length > 0">
                <tr v-for="user in list_users">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>
                        <span v-for="role in user.roles">
                            {{ role.name }}
                        </span>
                    </td>
                    <td v-if="checkIsAdmin()">
                        <button class="btn btn-success">
                            Edit
                        </button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "User",
        data() {
            return {
                currentUser: {},
                list_users: [],
                userCreate: {
                    name: '',
                    email: '',
                    role: 'employee'
                }
            }
        },
        created() {
            this.getCurrentUser();
            this.getListUser();
        },
        methods: {
            getCurrentUser() {
                axios.get('/getCurrentUser')
                    .then(response => {
                        this.currentUser = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            getListUser() {
                axios.get('/users')
                    .then(response => {
                        this.list_users = response.data;
                        this.list_users.forEach(user => {
                            Vue.set(user, 'isEdit', false)
                        })
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            checkIsAdmin() {
                if(this.currentUser.roles) {
                    let check = false;
                    this.currentUser.roles.forEach(role => {
                        if(role.name === 'admin') {
                            check = true
                        }
                    });
                    return check
                }
            },
            createUser() {

            }
        }
    }
</script>

<style scoped>
    .table {
        margin-top: 30px;
    }
</style>