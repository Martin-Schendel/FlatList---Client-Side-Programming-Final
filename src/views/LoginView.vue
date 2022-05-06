<template>
    <div>
        <div v-if="!this.auth">
            <logIn />
            <h4>- OR -</h4>
            <signUp />
        </div>
    </div>
</template>
<script>
import signUp from "@/components/SignUp.vue";
import store from "@/store/index.js";
import logIn from "@/components/LogInC.vue";

export default {
    name: "LoginView",
    components: {
        signUp,
        logIn,
    },
    computed: {
        auth: function () {
            return store.state.auth;
        },
    },
};
</script>
<style scoped></style>
