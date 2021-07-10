<template>
    <div>
        <br>
        <div v-for="(comment, index) in comments" :key="index">
            <single-comment 
                :comment="comment"
            v-on:showmodal="showModal(comment.id)"/>
        </div>
        <b-modal ref="delmodal" hide-header hide-footer>
            <div class="d-block text-center">
                <h5>Вы уверены что хотите удалить комментарий?</h5>
                <b-button variant="danger" @click="deleteComment()">Да</b-button>
                <b-button variant="outline-secondary" @click="hideModal()">Нет</b-button>
            </div>
        </b-modal>
    </div>
</template>

<script>
import singleComment from './singleComment.vue'
export default {
    data() {
        return {
            deletecommentid: 0
        }
    },
    props : ['comments'],
    components: {
        singleComment
    },
    methods: {
        showModal(deletecommentid) {
            this.$refs['delmodal'].show();
            this.deletecommentid = deletecommentid;        
        },
        hideModal() {
            this.$refs['delmodal'].hide();
        }, 
        deleteComment() {
            axios.delete('api/comment/' + this.deletecommentid, {
            })
            .then(response => {
                if (response.status == 200) {
                    this.$refs['delmodal'].hide();
                    this.$emit('loadcommentslist');        
                }
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
}
</script>