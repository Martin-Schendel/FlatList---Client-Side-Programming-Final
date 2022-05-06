<template>
    <section>
        <h3>Current Tasks</h3>
        <table id="manageTasksTable">
            <tr>
                <th></th>
                <th>Title</th>
                <th>Weight</th>
            </tr>
            <tr>
                <td><input type="checkbox" /></td>
                <td>103</td>
                <td>3.6</td>
            </tr>
        </table>
    </section>
</template>
<script>
export default {
    name: "TaskList",
};
</script>
<style scoped>
table,
th,
td {
    border: 1px dashed lightgrey;
    text-align: center;
    border-collapse: collapse;
    padding: 1rem;
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
</style>
