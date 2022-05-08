<template>
    <div>
        <div v-if="!auth()">
            <unauthorized-user />
        </div>
        <div v-if="auth()">
            <my-flatlists />
        </div>
    </div>
</template>
<script>
import MyFlatlists from "@/components/MyFlatlists.vue";
import UnauthorizedUser from "@/components/Unauthorized.vue";
import store from "@/store/index.js";
export default {
    components: { MyFlatlists, UnauthorizedUser },
    methods: {
        auth: () => {
            return store.state.auth;
        },
    },
};
</script>
<style scoped></style>
