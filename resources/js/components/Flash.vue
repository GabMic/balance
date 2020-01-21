<template></template>
<script>
    import {EventBus} from "../app";

    export default {
        props: ['message'],

        mounted() {

            EventBus.$on('flash', message =>{
                this.flash(message)
            })
        },

        methods:{
            flash(message) {
                this.$buefy.toast.open({
                    duration: 3000,
                    type: 'is-success',
                    message: message,
                    position: 'is-bottom-right',
                    actionText: null,
                    queue: false
                })
            }
        }

    }
</script>
