<template>
    <div>
        <button
                @click="sendArticle"
                v-text="buttonText"
                v-show="status"
                class="btn btn-outline-danger">
        </button>

        <p class='btn btn-outline-secondary' v-show="!status">Sent</p>

        <a v-bind:href="url"  class='btn btn-outline-primary' v-show="status">Edit</a>

    </div>
</template>

<script>
    export default {
        props: [
            'articleId',
            'sent',
            'url',
        ],

        mounted() {
            console.log("mouted")
        },

        data: function() {
            return  {
                status: this.sent,
            }
        },


        methods: {
            sendArticle() {
                axios.post('send/'+ this.articleId)
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
                return (this.status) ? 'Send' : 'Sent';
            },

        }
    }
</script>
