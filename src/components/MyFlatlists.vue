<template>
    <div>
        <section>
            <h3>My FlatLists</h3>
            <form>
                <label for="numFlatLists">Number of FlatLists:</label>
                <input type="number" v-model="userinput.num" />
            </form>
            <section v-for="list in FlatLists" :key="list">
                <table>
                    <h3>{{ list[0] }}</h3>
                    <tr>
                        <th>Task</th>
                        <th>Weight</th>
                    </tr>
                    <tr v-for="task in list" :key="task.id">
                        <td>{{ task.TaskID }}</td>
                        <td>{{}}</td>
                    </tr>
                </table>
            </section>
        </section>
    </div>
</template>
<script>
import store from "@/store/index.js";
export default {
    name: "MyFlatLists",
    data: () => {
        return {
            userinput: {
                num: "3",
            },
        };
    },
    methods: {
        setLists: (numLists) => {
            store.commit("setLists", {
                numLists: numLists,
            });
        },
    },
    computed: {
        FlatLists: () => {
            return store.state.lists;
        },
    },
    watch: {
        "userinput.num": {
            handler: function (numLists) {
                this.setLists(numLists);
            },
        },
    },
};
</script>
<style scoped>
input {
    margin: 1rem;
    width: 10%;
}
</style>
