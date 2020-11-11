<template>
    <div class="container">
        <add-task @task-added="refresh"></add-task>
        <ul class="list-group mt-4">
            <li class="list-group-item d-flex justify-content-between " v-for="task in tasks" :key="task.id">
                <a href="#">{{ task.name }}</a>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editModal" @click="getTask(task.id)">Editer</button>
            </li>
            <edit-task v-bind:editTask="editTask" @updated-task="refresh"></edit-task>
        </ul>
    </div>
</template>

<script>
export default {
    data:function () {
        return {
            tasks: {}, // * tableau vide
            editTask: ''
        }
    },
    created() {
        axios.get('/tasks')
            .then(response => this.tasks = response.data)
            .catch(error =>
                console.log(error))
    },
    methods: {
        getTask(id){
          axios.get('/tasks/edit/' + id)
          .then(response => this.editTask = response.data)
          .catch(error => console.log(error))
        },

        refresh(tasks){
            this.tasks = tasks.data
        }
    },

    mounted(){
        console.log('Composant monté.')
    }
}
</script>
