<template>
    <div>
        <div>
            <div v-show="!isEditing">
                {{ comment.text }} 
                <b-dropdown size="sm" text="" class="m-2">
                    <b-dropdown-item-button @click="showEditComment()">Редактировать</b-dropdown-item-button>
                    <b-dropdown-item-button @click="showModal()">Удалить</b-dropdown-item-button>
                </b-dropdown>
                <br>
                <b-icon icon="person"></b-icon>&nbsp;<span class="person">{{ comment.author }}</span>
            </div>
            <div v-show="isEditing">
                <b-form-input v-model="editComment.text" type="text" class="form-control" placeholder="Комментарий"></b-form-input>
                <br>
                <b-button variant="primary"
                    @click="saveEditedComment()">Сохранить</b-button> 
                <b-button variant="secondary"
                    @click="hideEditComment()">Отмена</b-button>           
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isEditing: false,
            editComment: {
                author: '',
                text: ''
            }
        }
    },
    props: ['comment'],
    methods: {
        showEditComment() {
            this.isEditing = true;
            this.editComment.text = this.$props.comment.text;
        },
        hideEditComment() {
            this.isEditing = false;
        },
        saveEditedComment() {
            axios.put('/api/comment/' + this.$props.comment.id, {
                comment: this.editComment
            })
            .then(response => {
                if (response.status == 200) {
                    this.isEditing = false;
                    this.$props.comment.text = this.editComment.text;
                }
            })
            .catch(error => {
                console.log(error);
            });
        },
        showModal() {
            this.$emit('showmodal');
        }
    }
}
</script>

<style scoped>
.person {
    font-size: 0.8rem;
}
</style>