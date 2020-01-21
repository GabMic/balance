<template>
    <section class="section p-0">
        <div class="list">
            <div class="list-item" v-for="(task, index) in notes" :key="index">
                <task :task="task" :place="index"></task>
            </div>
        </div>
        <h4 class="title is-4" v-if="notes.length==0" v-text="noNotes"></h4>
    </section>
</template>
<script>
    import {EventBus} from "../../app";

    export default {
        props: ['tasks'],

        data() {
            return {
                notes: this.tasks,
                noNotes: balance.emptyNotes
            }
        },

        mounted() {
            let path = location.pathname.split('/')[1] + '/tasks';
            EventBus.$on('addTask', task => {
                this.notes.push(task)
                axios.get('/tasks').then((response) => {
                    this.notes = response.data
                })
            })
        }
    }
</script>
