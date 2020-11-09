<template>
    <div class="container">
        <add-task @task-added="refresh"></add-task>
        <div class="card-header">Task Component</div>
        <ul class="list-group">
            <li class="list-group-item" v-for="task in tasks">
                <a href="#">{{ task.name }}</a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tasks: {}
        }
    },
    created() {
        axios.get('/tasks')
            .then(response => this.tasks = response.data)
            .catch(error =>
                console.log(error))
    },
    methods: {
        refresh(tasks){
            this.tasks = tasks.data
        }
    },
    name: "TaskComponent"
}
</script>

<style scoped>

</style>
