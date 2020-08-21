<template>
    <div>
        <button
                @click="publish"
                v-text="buttonText"
                :class="[status ? 'badge badge-danger' :  'badge badge-success']"></button>
    </div>
</template>

<script>
    export default {
        props: [
            'articleId',
            'published'
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
            }
        }
    }
</script>
