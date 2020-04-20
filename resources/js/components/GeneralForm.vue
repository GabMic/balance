<template>
<div>
    <div class="field">
        <div class="control">
            <input :type="type" class="input" :placeholder="placeholder" :name="name" v-model="data">
        </div>
    </div>

    <button class="button is-success is-outlined is-fullwidth" @click="save()">שמור</button>
</div>
</template>

<script>
    import {EventBus} from "../app";

    export default {
        props: ['type', 'placeholder', 'name', 'persist', 'name'],
        data(){
            return {
                data: null,
                attr: this.name,
                url: this.persist,
                dbname: this.name
            }
        },

        methods: {
            save(){

                axios.post(this.url, {
                       data: this.data
                }).then(() => {
                   EventBus.$emit('flash', "נשמר בהצלחה")
                })
            }
        }
    }
</script>

<style scoped>

</style>
