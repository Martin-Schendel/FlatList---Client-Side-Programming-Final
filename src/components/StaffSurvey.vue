<template>
    <section>
        <h3>Survey</h3>
        <br />
        <p>We want to know how difficult each of these tasks are.</p>
        <p>
            Please rate each task on a scale of 1 to 10, with 10 being a task
            that requires the most time or effort to complete.
        </p>
        <form action="post">
            <table id="staffSurveyTable">
                <tr>
                    <th>Task Title</th>
                    <th>Task Weight</th>
                </tr>
                <tr v-for="task in tasks" :key="task.TaskID">
                    <td>{{ task.TaskID }}</td>
                    <td>
                        <input
                            type="number"
                            v-model="task.Weight"
                            step="0.1"
                            min="1"
                            max="10"
                        />
                    </td>
                </tr>
            </table>
            <button v-on:click.prevent="submitSurvey()" id="submitSurveyBtn">
                Submit Survey
            </button>
        </form>
    </section>
</template>
<script>
import store from "@/store/index.js";
export default {
    name: "StaffSurvey",
    computed: {
        tasks: () => {
            return store.state.tasks;
        },
    },

    methods: {
        submitSurvey: function () {
            const SessionID = store.state.session;
            store.state.tasks.forEach((task) => {
                const formdata = new FormData();

                formdata.append("TaskID", task.TaskID);
                formdata.append("UserID", task.UserID);
                formdata.append("Weight", task.Weight);
                formdata.append("SurveyCount", task.SurveyCount);
                formdata.append("SessionID", SessionID);

                fetch("http://localhost/flatlist/src/php/addTaskSurvey.php", {
                    method: "post",
                    body: formdata,
                });
            });
            store.commit("getTasks");
        },
    },
};
</script>
<style scoped>
p {
    width: 80%;
    margin: auto;
    padding: 0.25rem;
    font-size: small;
}
#staffSurveyTable {
    margin: auto;
    margin-bottom: 1rem;
    text-align: center;
}
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
input {
    text-align: center;
    width: 50%;
    font-size: 1rem;
}
#submitSurveyBtn {
    font-size: 0.78rem;
    align-self: center;
    margin-top: 0;
}
</style>
