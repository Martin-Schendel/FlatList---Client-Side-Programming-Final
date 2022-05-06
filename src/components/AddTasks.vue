<template>
    <div>
        <section>
            <h3>Add Tasks</h3>
            <form>
                <label for="UnitID">Task Title:</label>
                <input name="UnitID" type="text" />
                <br />
                <label for="Weight">Initial Weight:</label>
                <input name="Weight" type="number" value="0" />
                <br />
                <button v-on:click.prevent="addTask()">Add</button>
            </form>
        </section>
    </div>
</template>
<script>
export default {
    name: "AddTasks",
};
</script>
<style scoped></style>
