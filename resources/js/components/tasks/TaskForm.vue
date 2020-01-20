<template>
<section style="width: 90%">
<div class="card">
    <div class="card-content">
        <div class="field">
            <div class="control">
                <textarea class="textarea is-info" placeholder="מה צריך לעשות?" name="content" v-model="content"></textarea>
            </div>
        </div>
        <b-field  label="לאיזה נושא זה קשור?">
            <b-select aria-placeholder="בחרו נושא" placeholder="בחרו נושא" class="rtl" name="type_id" id="type">
                <option v-for="(type, index) in types" :key="index" :value="type.id">{{type.name}}</option>
            </b-select>
        </b-field>
        <button class="button is-fullwidth is-outlined is-info" @click="save">שלח</button>
    </div>
</div>
</section>
</template>

<script>
    import {EventBus} from "../../app";

    export default {
        props: ['types'],

        data(){
            return{
                content: '',
            }
        },

        methods:{

            save(){
                const target = document.getElementById("type");
                const type = target.options[target.selectedIndex].value;
                let task = {content: this.content, type: type}
                axios.post('/tasks', {
                    content: this.content,
                    type_id: type
                }).then(({data}) => {
                    EventBus.$emit('addTask', task)
                    EventBus.$emit('flash', data.message)
                }).catch(function (error) {
                    console.log(error);
                });
                this.clearInputs()
            },

            clearInputs(){
                this.content = '';
            }
        }

    }
</script>


<style scoped>
    .rtl{
        text-align: right;
    }
</style>
