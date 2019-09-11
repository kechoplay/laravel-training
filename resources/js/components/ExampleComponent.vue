<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ header }}</div>

                    <div class="card-body">
                        {{ message }}
                    </div>
                    {{ write("tung vo doi") }}
                    <my-component></my-component>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        updated() {
            console.log('Component updated.')
        },
        created() {
            console.log('Component created.')
        },
        data() {
            return {
                message: 'I\'m an example component.',
                header: 'Example Component',
                write(message) {
                    console.log(message)
                }
            }
        }
    }
</script>
