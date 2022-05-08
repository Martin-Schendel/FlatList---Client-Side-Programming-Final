<template>
    <div>
        <section>
            <h3>Add Tasks</h3>
            <form>
                <label for="TaskID">Task Title:</label>
                <input
                    name="TaskID"
                    type="text"
                    v-model="addTaskForm.TaskID"
                    ref="taskinput"
                />
                <br />
                <label for="Weight">Initial Weight(1-10):</label>
                <input
                    name="Weight"
                    type="number"
                    value="0"
                    step="0.1"
                    v-model="addTaskForm.Weight"
                />
                <br />
                <span class="weak">
                    Weight represents how difficult a task is to complete.
                    <br />
                    I recommend you and your staff think about it as effort or
                    time required.
                    <br />
                    The more effort a task requires, the higher the weight.
                </span>
                <br />
                <button v-on:click.prevent="addTask()" v-if="showButton()">
                    Add Task
                </button>
            </form>
        </section>
    </div>
</template>
<script>
import store from "@/store/index.js";
export default {
    name: "AddTasks",
    data: function () {
        return {
            addTaskForm: {
                TaskID: "",
                UserID: "",
                Weight: "5.5",
            },
            validForm: false,
        };
    },
    computed: {
        session: () => {
            return store.state.session;
        },
    },
    methods: {
        addTask: function () {
            const formdata = new FormData();
            var vm = this;

            formdata.append("TaskID", vm.addTaskForm.TaskID);
            formdata.append("UserID", store.state.user.UserID);
            formdata.append("Weight", vm.addTaskForm.Weight);
            formdata.append("SessionID", this.session);

            fetch("http://localhost/flatlist/src/php/addTask.php", {
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
                    vm.addTaskForm.TaskID = "";
                    vm.addTaskForm.Weight = "5.5";
                    vm.$refs.taskinput.focus();
                });
        },
        enforceWeightLimit: function (newWeight) {
            if (newWeight > 10) {
                this.addTaskForm.Weight = 10;
            } else if (newWeight < 1) {
                this.addTaskForm.Weight = 1;
            }
        },
        showButton: function () {
            return this.validForm;
        },
        validateForm: function (TaskID) {
            if (TaskID != "") {
                this.validForm = true;
            } else {
                this.validForm = false;
            }
        },
    },
    watch: {
        "addTaskForm.Weight": {
            handler: function (newWeight) {
                this.enforceWeightLimit(newWeight);
            },
        },
        "addTaskForm.TaskID": {
            handler: function (TaskID) {
                this.validateForm(TaskID);
            },
        },
        deep: true,
    },
};
</script>
<style scoped>
input {
    text-align: center;
    width: 10%;
}
</style>
