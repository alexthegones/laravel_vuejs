<template>
    <div class="container">
        <div class="form-row">
            <div class="col-row">
                <label for="search">Rechercher :</label>
                <input type="search" id="search" name="query" class="form-control" @keyup="searchTask" v-model="query"
                       placeholder="Rechercher une tâche">
            </div>
        </div>
        <add-task @task-added="refresh"></add-task>
        <ul class="list-group mt-4">
            <li class="list-group-item d-flex bd-highlight" v-for="task in tasks">
                <div class="mr-auto p-2 bd-highlight">
                    <a href="#">{{ task.name }}</a>
                </div>
                <div class="mr-2 bd-highlight">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editModal"
                            @click="getTask(task.id)">Editer
                    </button>
                </div>
                <div class=" bd-highlight">
                    <button type="button" class="btn btn-danger" @click="deleteTask(task.id)">X</button>
                </div>
            </li>
            <edit-task v-bind:editTask="editTask" @updated-task="refresh"></edit-task>
        </ul>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            tasks: {}, // * tableau vide
            editTask: '',
            query: ''
        }
    },
    created() {
        axios.get('/tasks')
            .then(response => this.tasks = response.data)
            .catch(error => console.log(error))
    },
    methods: {
        getTask(id) {
            axios.get('/tasks/edit/' + id)
                .then(response => this.editTask = response.data)
                .catch(error => console.log(error))
        },

        deleteTask(id) {
            axios.delete('/tasks/delete/' + id)
                .then(response => this.tasks = response.data)
                .catch(error => console.log(error))
        },

        searchTask() {
            if (this.query.length > 3) {
                axios.get('/tasks/' + this.query)
                    .then(response => this.tasks = response.data)
                    .catch(error => console.log(error))
            } else {
                axios.get('/tasks/')
                    .then(response => this.tasks = response.data)
                    .catch(error => console.log(error))
            }
        },

        refresh(tasks) {
            this.tasks = tasks.data
        }
    },
    mounted() {
        console.log('Composant monté.')
    }
}
</script>
