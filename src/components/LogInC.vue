<template>
    <div>
        <section>
            <h3>Log In</h3>
            <form>
                <label for="UserEmail">Email:</label>
                <input type="text" v-model="logInForm.UserEmail" />
                <br />
                <br />
                <label for="UserPassword">Password:</label>
                <input type="password" v-model="logInForm.UserPassword" />
                <br />
                <br />
                <router-link to="/">
                    <button v-on:click.prevent="logIn()">Sign In</button>
                </router-link>
            </form>
        </section>
        <section v-if="auth()">
            <router-link to="/manage-tasks">
                <button v-on:click.prevent="">Get Started</button>
            </router-link>
        </section>
    </div>
</template>
<script>
import store from "@/store/index.js";
export default {
    name: "LogIn",
    data: function () {
        return {
            logInForm: {
                UserEmail: "test@test.test",
                UserPassword: "test",
            },
        };
    },
    methods: {
        auth: function () {
            return store.state.auth;
        },
        logIn: function () {
            const formdata = new FormData();

            var vm = this;

            formdata.append("UserEmail", vm.logInForm.UserEmail);
            formdata.append("UserPassword", vm.logInForm.UserPassword);

            fetch("http://localhost/flatlist/src/php/logIn.php", {
                method: "post",
                body: formdata,
            })
                .then((response) => response.json())
                .then(function (data) {
                    if (data.status == "success") {
                        store.commit("signIn", {
                            auth: data.auth,
                            session: data.session,
                            UserID: data.UserID,
                            UserFirstName: data.UserFirstName,
                            UserLastName: data.UserLastName,
                            UserEmail: data.UserEmail,
                        });
                        vm.logInForm.UserEmail = "";
                        vm.logInForm.UserPassword = "";
                    } else {
                        console.log(data);
                    }
                })
                .then(() => {
                    store.commit("getTasks");
                });
            vm.$router.push("manage-tasks");
        },
    },
};
</script>
<style scoped></style>
