<template>
    <div>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        <br><br>
        <b-form-input v-model="comment.author" type="text" class="form-control" placeholder="Имя"></b-form-input>
        <br>
        <b-form-input v-model="comment.text" type="text" class="form-control" placeholder="Комментарий"></b-form-input>
        <br>
        <b-button variant="primary"
            :class="[ comment.author && comment.text ? '' : 'disabled']"
            @click="addComment()">Сохранить</b-button>
    </div>
</template>

<script>
    export default {
    data() {
        return {
          comment: {
            author: '',
            text: ''
          }
        }
    },
    methods: {
      addComment() {
        axios.post('api/comment/store', {
            comment: this.comment
        })
        .then(response => {
          if (response.status == 201) {
            this.comment.author = '';
            this.comment.text = '';
          }
        })
        .catch(error => {
          console.log(error);
        });
      }
    }
  }

</script>