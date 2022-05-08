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
                <td>
                    <input
                        type="number"
                        step="0.1"
                        v-model="task.Weight"
                        min="1"
                        max="10"
                    />
                    <button
                        class="updateWeightBtn"
                        v-on:click.prevent="
                            overwriteTask(task.TaskID, task.Weight)
                        "
                    >
                        Change Weight
                    </button>
                </td>
                <td>{{ task.SurveyCount }}</td>
                <td>
                    <button
                        v-on:click.prevent="deleteTask(task.TaskID)"
                        class="deleteTaskBtn"
                    >
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
    methods: {
        deleteTask: (TaskID) => {
            const formdata = new FormData();

            formdata.append("TaskID", TaskID);
            formdata.append("SessionID", store.state.session);
            formdata.append("UserID", store.state.user.UserID);
            fetch("http://localhost/flatlist/src/php/deleteTask.php", {
                method: "post",
                body: formdata,
            })
                .then((response) => response.json())
                .then(function (data) {
                    if (data.status == "success") {
                        store.commit("getTasks");
                    }
                });
        },
        overwriteTask: (TaskID, Weight) => {
            const formdata = new FormData();
            const UserID = store.state.user.UserID;
            const SessionID = store.state.session;

            formdata.append("TaskID", TaskID);
            formdata.append("SessionID", SessionID);
            formdata.append("UserID", UserID);
            fetch("http://localhost/flatlist/src/php/deleteTask.php", {
                method: "post",
                body: formdata,
            })
                .then((response) => response.json())
                .then(function (data) {
                    if (data.status == "success") {
                        store.commit("getTasks");
                    }
                })
                .then(() => {
                    const frmdata = new FormData();
                    frmdata.append("TaskID", TaskID);
                    frmdata.append("UserID", UserID);
                    frmdata.append("Weight", Weight);
                    frmdata.append("SessionID", SessionID);

                    fetch("http://localhost/flatlist/src/php/addTask.php", {
                        method: "post",
                        body: frmdata,
                    })
                        .then((response) => response.json())
                        .then(function (data) {
                            if (data.status == "success") {
                                store.commit("getTasks");
                            }
                        });
                });
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
    margin: auto;
}
.updateWeightBtn {
    font-size: 0.7rem;
}
button:active {
    background-color: var(--cc-darkblue);
    box-shadow: 0 2px #666;
    transform: translateY(4px);
}
a {
    color: var(--cc-darkblue);
}
input {
    text-align: center;
    width: 20%;
    margin: auto;
}
</style>
