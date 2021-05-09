<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div v-for="note in data">
                    <h2>{{note.title}}</h2>
                    <p>{{note.note}}</p>
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
    }
</script>
