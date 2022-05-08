<template>
    <section>
        <h3>Current Tasks</h3>
        <table id="manageTasksTable">
            <tr>
                <th>Title</th>
                <th>Weight</th>
                <th>Survey Count</th>
                <th></th>
            </tr>
            <tr v-for="task in tasks" :key="task.TaskID">
                <td>{{ task.TaskID }}</td>
                <td>{{ task.Weight }}</td>
                <td>{{ task.SurveyCount }}</td>
                <td>
                    <button v-on:click.prevent="" class="deleteTaskBtn">
                        Delete
                    </button>
                </td>
            </tr>
        </table>
        <p>
            Once you have added all tasks, I recommend you
            <router-link to="/staff-survey">survey your staff.</router-link>
            The more staff that take the survey, the more accurate your
            FlatLists will be!
        </p>
        <p>
            Remember, you can always generate FlatLists on the
            <router-link to="/my-flatlists">My Flatlists</router-link>
            page!
        </p>
    </section>
</template>
<script>
import store from "@/store/index.js";
export default {
    name: "TaskList",
    computed: {
        tasks: () => {
            return store.state.tasks;
        },
    },
};
</script>
<style scoped>
table,
th,
td {
    border: none;
    text-align: center;
    border-collapse: collapse;
    padding: 1rem;
}
td {
    border-top: var(--cc-darkblue) solid 1px;
}
h3 {
    margin-bottom: 1rem;
}
#manageTasksTable {
    margin: auto;
    padding: 1rem;
}
section {
    padding-bottom: 1rem;
}
.deleteTaskBtn {
    margin: auto;
    background-color: var(--cc-yellow);
}
.deleteTaskBtn:hover {
    background-color: var(--cc-darkyellow);
}
button:active {
    background-color: var(--cc-darkblue);
    box-shadow: 0 2px #666;
    transform: translateY(4px);
}
a {
    color: var(--cc-darkblue);
}
</style>
