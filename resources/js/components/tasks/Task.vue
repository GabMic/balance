<template>
    <div class="message is-info">
        <div class="message-header" style="border-radius: 0; flex-direction: row-reverse">
             <i class="mdi mdi-trash-can-outline mdi-24px" @click="deleteTask" style="cursor: pointer"></i>
            <button class="button is-small" style="border-radius: 50%">{{place + 1}}</button>
        </div>
        <div class="message-body">
            {{task.content}}
        </div>
    </div>
</template>

<script>
    export default {
        props: ['task', 'place'],
        methods:{
            deleteTask(){

                axios.delete('/tasks/' + this.task.id, {
                    data:{
                        id: this.task.id
                    }
                }).then(() => {
                    location.reload()
                })
            }
        }
    }
</script>
