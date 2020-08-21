<template>
    <div>
        <button class="badge badge-danger" v-if="sent" @click="sendArticle" v-text="buttonText" ></button>

        <p class="badge badge-success" v-else>Sent</p>


    </div>
</template>

<script>
    export default {
        props: [
            'articleId',
            'sent'
        ],

        mounted() {
            console.log(this.articleId)
        },

        data: function() {
            return  {
                status: this.sent,
            }
        },


        methods: {
            sendArticle() {
                axios.post('/send/' + this.articleId)
                    .then(response => {
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
                return 'Send';
            }
        }
    }
</script>
