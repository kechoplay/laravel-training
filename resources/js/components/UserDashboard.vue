<template>
    <div class="user-dashboard">
        This is user dashboard
        <div class="list-user-comp">
            <h4>List User</h4>
<!--            <ListUser @userSelected="childrenSelectUser"></ListUser>-->
            <ListUser @userSelected="childrenSelectUser('this í tét string', ...arguments)"></ListUser>
        </div>
        <div class="user-detail-comp">
            <h4>User Detail</h4>
<!--            <UserDetail v-bind:userDetailInfo="userSelectedFromChild"></UserDetail>-->
            <UserDetail :userDetailInfo="userSelectedFromChild"></UserDetail>
        </div>
    </div>
</template>

<script>
    import ListUser from './ListUser.vue'
    import UserDetail from './UserDetail.vue'

    export default {
        name: "UserDashboard",
        components: {
            ListUser,
            UserDetail
        },
        data() {
            return {
                userSelectedFromChild: {}
            }
        },
        methods: {
            // childrenSelectUser(user) {
            //     console.log(user)
            //     this.userSelectedFromChild = user
            // }
            childrenSelectUser(string, user) {
                console.log(string);
                this.userSelectedFromChild = user
            }
        }
    }
</script>

<style scoped>

</style>