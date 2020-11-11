<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#exampleModal">
            Ajouter une tâche
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Créer ma tâche</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="name">Nom de la tâche :</label>
                                <input name="name" id="name" class="form-control" v-model="name">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="TaskCreate">Créer ma tâche</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: ''
        }
    },
    methods: {
        TaskCreate() {
            axios.post('/tasks', {
                name: this.name
            })
                .then(response => this.$emit('task-added', response))// * évènement personnalisé
                .catch(error => console.log(error))
        }
    }
}
</script>
