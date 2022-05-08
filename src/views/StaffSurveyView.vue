<template>
    <div>
        <div v-if="!auth()">
            <unauthorized-user />
        </div>
        <div v-if="auth()">
            <staff-survey />
        </div>
    </div>
</template>
<script>
import StaffSurvey from "@/components/StaffSurvey.vue";
import UnauthorizedUser from "@/components/Unauthorized.vue";
import store from "@/store/index.js";
export default {
    components: { StaffSurvey, UnauthorizedUser },
    methods: {
        auth: () => {
            return store.state.auth;
        },
    },
};
</script>
<style scoped></style>
