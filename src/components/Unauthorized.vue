<template>
    <section>
        <h3>Oops! That didn't work...</h3>
        <p>
            If you haven't yet made an account, you can do that on the Sign In
            page as well :)
        </p>
        <button v-on:click.prevent="">
            <router-link to="/login">Sign In</router-link>
        </button>
    </section>
</template>
<script>
export default {
    name: "UnauthorizedUser",
};
</script>
<style scoped></style>
