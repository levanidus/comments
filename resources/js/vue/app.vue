<template>
    <div class="container">
        <div class="row">
            <div class="col-2">&nbsp;</div>
            <div class="col-8">
                <add-comment />
                <comments-list />
            </div>
            <div class="col-2">&nbsp;</div>
        </div>
    </div>
</template>

<script>
import addComment from './addComment'
import commentsList from './commentsList'
import CommentsList from './commentsList.vue'

export default {
    components: { addComment, commentsList }
}
</script>

        CommentsList