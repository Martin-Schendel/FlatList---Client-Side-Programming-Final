<template>
    <div>
        <div v-if="!auth()">
            <section>
                <h3>Oops! That didn't work...</h3>
                <p>Maybe you mistyped your password?</p>
                <p>
                    If you haven't yet made an account, you can do that on the
                    Sign In page as well :)
                </p>
                <button v-on:click.prevent="">
                    <router-link to="/login">Sign In</router-link>
                </button>
            </section>
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
export default {
    components: { AddTasks, TaskList },
    methods: {
        auth: function () {
            return store.state.auth;
        },
    },
};
</script>
<style scoped></style>
