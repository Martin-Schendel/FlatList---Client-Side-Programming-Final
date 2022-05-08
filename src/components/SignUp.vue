<template>
    <section>
        <h3>Sign Up</h3>
        <form>
            <label>First Name:</label>
            <input type="text" v-model="signUpForm.UserFirstName" />
            <br />
            <label>Last Name:</label>
            <input type="text" v-model="signUpForm.UserLastName" />
            <br />
            <label>Email:</label>
            <input type="text" v-model="signUpForm.UserEmail" />
            <br />
            <label>Password:</label>
            <input type="password" v-model="signUpForm.UserPassword" />
            <br />
            <button v-on:click.prevent="signUp()">Sign Up</button>
        </form>
    </section>
</template>
<script>
import store from "@/store/index.js";
export default {
    name: "SignUp",
    data: function () {
        return {
            signUpForm: {
                UserFirstName: "test",
                UserLastName: "test",
                UserEmail: "test@test.test",
                UserPassword: "test",
            },
        };
    },
    methods: {
        signUp: function () {
            const formdata = new FormData();
            var vm = this;

            formdata.append("UserFirstName", vm.signUpForm.UserFirstName);
            formdata.append("UserLastName", vm.signUpForm.UserLastName);
            formdata.append("UserEmail", vm.signUpForm.UserEmail);
            formdata.append("UserPassword", vm.signUpForm.UserPassword);

            console.log(formdata);
            fetch("http://localhost/flatlist/src/php/addUser.php", {
                method: "post",
                body: formdata,
            })
                .then((response) => response.json())
                .then(function (data) {
                    if (data.status == "success") {
                        store.commit("setAuth", {
                            auth: true,
                            session: data.session,
                        });
                        store.commit("setUser", {
                            UserFirstName: data.UserFirstName,
                            UserLastName: data.UserLastName,
                            UserEmail: data.UserEmail,
                            UserPassword: data.UserPassword,
                        });
                        vm.signUpForm.UserFirstName = "";
                        vm.signUpForm.UserLastName = "";
                        vm.signUpForm.UserEmail = "";
                        vm.signUpForm.UserPassword = "";
                    } else {
                        console.log(data);
                    }
                });
        },
    },
};
</script>
<style scoped></style>
