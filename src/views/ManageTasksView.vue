<template>
    <div>
        <div v-if="!auth()">
            <unauthorized-user />
        </div>
        <div v-if="auth()">
            <add-tasks />
            <task-list />
        </div>
    </div>
</template>
<script>
import store from "@/store/index.js";
import AddTasks from "@/components/AddTasks.vue";
import TaskList from "@/components/TaskList.vue";
import UnauthorizedUser from "@/components/Unauthorized.vue";
export default {
    components: { AddTasks, TaskList, UnauthorizedUser },
    methods: {
        auth: function () {
            return store.state.auth;
        },
    },
};
</script>
<style scoped></style>
