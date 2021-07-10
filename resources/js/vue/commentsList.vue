<template>
    <div>
        <br>
        <div v-for="(comment, index) in comments" :key="index">
            <single-comment 
                :comment="comment"
            v-on:showmodal="showModal()"/>
        </div>
        <b-modal ref="my-modal" hide-footer title="Using Component Methods">
            <div class="d-block text-center">
                <h3>Hello From My Modal!</h3>
            </div>
            <b-button class="mt-3" variant="outline-danger" block @click="hideModal">Close Me</b-button>
        </b-modal>
    </div>
</template>

<script>
import singleComment from './singleComment.vue'
export default {
    props : ['comments'],
    components: {
        singleComment
    },
    methods: {
        showModal() {
            this.$refs['my-modal'].show();        
        },
        hideModal() {
            this.$refs['my-modal'].hide();
        }
    }
}
</script>