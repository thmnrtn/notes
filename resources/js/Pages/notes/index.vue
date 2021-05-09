<template>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-sm btn-primary mt-3 mb-3" @click="openModal()">Create Note</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div v-for="note in data" class="mb-3">
                    <h2>{{note.title}}</h2>
                    <p>{{note.note}}</p>
                    <button @click="editNote(note)" class="btn btn-sm btn-primary">Edit</button>
                    <button @click="deleteNote(note)" class="btn btn-sm btn-danger">Delete</button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Note</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" v-model="model.title"/>
                        </div>
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea class="form-control" id="note" rows="5" v-model="model.note"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" @click="closeModal()">Cancel</button>
                        <button type="submit" class="btn btn-success" v-show="!isEditing" @click="create(model)">Create</button>
                        <button type="submit" class="btn btn-success" v-show="isEditing" @click="update(model)">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            data: {
                type: Array,
                required: true
            },
        },
        data() {
            return {
                isEditing: false,
                model: this.initialModelData()
            }
        },
        methods: {
            /**
             * Open the modal
             */
            openModal()  {
                $('#modal').modal('show')
            },
            /**
             * Close the modal
             */
            closeModal() {
                $('#modal').modal('hide')
                this.resetModel();
                this.isEditing = false;
            },
            /**
             * Reset the model
             */
            resetModel() {
                this.model = this.initialModelData();
            },
            /**
             * Get the initial model data
             * @return Object
             */
            initialModelData() {
                return {
                    id: null,
                    title: null,
                    note: null,
                }
            },
            /**
             * Populate the model and open the edit modal for the note
             * @param note
             */
            editNote(note) {
                this.model.id = note.id;
                this.model.title = note.title;
                this.model.note = note.note;
                this.isEditing = true;
                this.openModal();
            },
            /**
             * Create a new note
             */
            create(data) {
                this.$inertia.post(`${this.$page.props.rootUrl}/notes`, data)
                this.resetModel();
                this.closeModal();
            },
            /**
             * Update the note
             * @param data
             */
            update(data) {
                data._method = 'PUT';
                this.$inertia.post(`${this.$page.props.rootUrl}/notes/`  + data.id, data)
                this.resetModel();
                this.isEditing = false;
                this.closeModal();
            },
            /**
             * Delete the note
             * @param data
             */
            deleteNote(data) {
                data._method = 'DELETE';
                this.$inertia.post(`${this.$page.props.rootUrl}/notes/` + data.id, data)
                this.resetModel();
                this.closeModal();
            }
        }
    }
</script>
