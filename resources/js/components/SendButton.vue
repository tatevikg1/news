<template>
    <div>
        <button
                @click="sendArticle"
                v-text="buttonText"
                v-show="status"
                class="badge badge-danger">
        </button>

        <p class='badge badge-warning' v-show="!status">Sent</p>

        <a v-bind:href="url" class='badge badge-warning' v-show="status">Edit</a>

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
