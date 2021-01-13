<template>
    <div>
        <button v-on:click="publish"  v-show="status" class= "btn btn-outline-danger">Publish</button>
        
        <a v-bind:href="url" class='btn btn-outline-primary' v-show="status">Edit</a>

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
                alert('published');
                // axios.post('/publish/'+ this.articleId)
                //     .then(response => {

                //         // if (!this.status) {
                //         //     this.url = '';
                //         //     return
                //         // }

                //         this.status = ! this.status;

                //         console.log(response.data);
                //     })
                //     .catch(errors => {
                //         if (errors.response.status == 401) {
                //             window.location = '/login';
                //         }
                //     });
            }
        }
    }
</script>
