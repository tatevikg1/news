<template>
    <div>
        <button
                @click="publish"
                v-text="buttonText"
                :class="[status ? 'badge badge-danger' :  'badge badge-success']">
        </button>

        <a v-bind:href="url" class='badge badge-warning' v-show="status">Edit</a>

    </div>
</template>

<script>
    export default {
        props: [
            'articleId',
            'published',
            'url',
        ],

        mounted() {
            console.log("mouted")
        },

        data: function() {
            return  {
                status: this.published,
            }
        },


        methods: {
            publish() {
                axios.post('publish/'+ this.articleId)
                    .then(response => {

                        if (!this.status) {
                            this.url = '';
                            return
                        }

                        this.status = ! this.status;

                        console.log(response.data);
                    })
                    .catch(errors => {
                        if (errors.response.status == 401) {
                            window.location = '/login';
                        }
                    });
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Publish' : 'Published';
            },

        }
    }
</script>
