<template>
    <div>
        <button
                @click="sendArticle"
                v-text="buttonText"
                :class="[status ? 'badge badge-danger' :  'badge badge-success']"></button>
    </div>
</template>

<script>
    export default {
        props: [
            'articleId',
            'sent'
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
            }
        }
    }
</script>
