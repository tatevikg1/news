<template>
    <div>
        <button @click="publish" v-text="buttonText" v-show="status" class= "btn btn-outline-danger"></button>
        
        <a v-bind:href="url" class='btn btn-outline-primary' v-show="status">Edit</a>

        <!-- <p class='btn btn-outline-success' v-show="!status">Published</p> -->
        <a v-bind:href="articleId" class='btn btn-outline-success' v-show="!status">Published</a>
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
                alert('canceled');
                axios.post('/publish/'+ this.articleId)
                    .then(response => {

                        // if (!this.status) {
                        //     this.url = '';
                        //     return
                        // }

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
