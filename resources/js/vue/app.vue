<template>
    <div class="container">
        <div class="row">
            <div class="col-2">&nbsp;</div>
            <div class="col-8">
                <add-comment v-on:newcomment="getComments()" />
                <comments-list :comments="comments" v-on:loadcommentslist="getComments()"/>
            </div>
            <div class="col-2">&nbsp;</div>
        </div>
    </div>
</template>

<script>
import addComment from './addComment'
import commentsList from './commentsList'

export default {
    components: { addComment, commentsList },
    data: function() {
        return {
            comments: []
        }
    }, 
    methods: {
        getComments()  {
            axios.get('/api/comments')
            .then(response => {
                this.comments = response.data
            })
            .catch(error => {
                console.log(error)
            });
        }
    },
    created() {
        this.getComments();
    }

}
</script>

        CommentsList