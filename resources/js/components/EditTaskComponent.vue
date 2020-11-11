<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editLabelModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabelModal">Editer la tâche</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="name">Nom de la tâche :</label>
                                <input name="name" id="name" class="form-control" v-model="editTask.name">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="update" data-dismiss="modal">Enregistrer</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['editTask'],

    methods: {
        update(){
            axios.patch('/tasks/edit/' + this.editTask.id, {
                name: this.editTask.name
            })
            .then(response => this.$emit('updated-task', response))
            .catch(error => console.log(error))
        }
    }
}
</script>
