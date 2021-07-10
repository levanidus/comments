<template>
    <div>
        <div>
            {{ comment.text }} 
            <b-dropdown size="sm" text="" class="m-2">
                <b-dropdown-item-button @click="editComment()">Редактировать</b-dropdown-item-button>
                <b-dropdown-item-button @click="showModal()">Удалить</b-dropdown-item-button>
            </b-dropdown>
            <br>
            <b-icon icon="person"></b-icon>&nbsp;<span class="person">{{ comment.author }}</span>
        </div>
    </div>
</template>

<script>
export default {
    props: ['comment'],
    methods: {
        deleteComment() {
            
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