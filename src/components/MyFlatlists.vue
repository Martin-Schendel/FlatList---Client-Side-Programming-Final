<template>
    <div>
        <section>
            <h3>My FlatLists</h3>
            <form>
                <label for="numFlatLists">Number of FlatLists:</label>
                <input type="number" v-model="userinput.num" />
                <br />
                <label for="algorithm">Algorithm:</label>
                <select>
                    <option value="snaking" selected>Snaking</option>
                </select>
            </form>
            <div
                style="
                    display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                    justify-content: space-between;
                "
            >
                <div
                    v-for="(item, propertyName, index) in FlatLists"
                    :key="index"
                >
                    <div style="">
                        <h3 v-text="'List ' + item[0]"></h3>
                        <table class="centered">
                            <tr>
                                <th>Task</th>
                                <th>Weight</th>
                            </tr>
                            <tr
                                v-for="(task, propertyName, index) in item"
                                :key="index"
                            >
                                <td v-text="task.TaskID"></td>
                                <td v-text="task.Weight"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
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
select {
    width: 11%;
    margin: 1rem;
    background-color: white;
    border: 1px solid var(--cc-lightgreen);
}
td {
    padding: 1rem;
    max-width: 10rem;
    border-top: 1px dotted var(--cc-darkblue);
}
table {
    margin: 3rem;
    border-collapse: collapse;
}
</style>
