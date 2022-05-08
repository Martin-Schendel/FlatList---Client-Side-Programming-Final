<template>
    <div id="app">
        <header>
            <router-link to="/">
                <img
                    alt="FlatList logo"
                    id="navLogo"
                    src="./assets/FlatListLogo.png"
                />
            </router-link>

            <a href="#" id="toggleButton">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <nav id="navBar">
                <ul>
                    <li v-if="!auth()">
                        <router-link to="/">Home</router-link>
                    </li>
                    <li v-if="!auth()" id="navSignin">
                        <router-link to="/login">Sign In</router-link>
                    </li>
                    <li v-if="auth()" id="navManage">
                        <router-link to="/manage-tasks">
                            Manage Tasks
                        </router-link>
                    </li>
                    <li v-if="auth()" id="navSurvey">
                        <router-link to="/staff-survey">
                            Staff Survey
                        </router-link>
                    </li>
                    <li v-if="auth()" id="navLists">
                        <router-link to="/my-flatlists">
                            My FlatLists
                        </router-link>
                    </li>
                    <li v-if="auth() && FlatLists != 0" id="navLists">
                        <a href="logOut.php">Sign Out</a>
                    </li>
                </ul>
            </nav>
        </header>
        <router-view />
    </div>
</template>
<script>
import store from "@/store/index.js";
export default {
    methods: {
        auth: function () {
            return store.state.auth;
        },
        logOut: function () {
            store.commit("logOut");
        },
        FlatLists: () => {
            console.log("Lists:" + store.state.lists);
            return store.state.lists;
        },
    },
};
</script>
<style>
:root {
    --cc-lightblue: rgb(37, 162, 190);
    --cc-darkblue: rgb(17, 90, 156);
    --cc-lightgreen: rgb(23, 127, 103);
    --cc-darkgreen: rgb(10, 73, 59);
    --cc-yellow: rgb(253, 203, 53);
    --cc-darkyellow: rgb(255, 191, 0);
    /* HexValues:
    lightblue: 25a2be
    darkblue: 115a9c
    lightgreen: 177f67
    darkgreen: 0a493b
    yellow: dcb35
    */
}
html {
    font-family: Geneva, Verdana, sans-serif;
}
body {
    max-width: 900px;
    align-content: center;
}
* {
    border-radius: 0.125rem;
}
#navLogo {
    width: 200px;
}
h1,
h2,
h3,
h4,
li > a {
    color: var(--cc-darkblue);
    margin: 0.5rem;
    text-align: center;
}
h2 {
    text-align: center;
    border: 0.3rem solid var(--cc-darkblue);
    border-radius: 0rem 0rem 0.5rem 0.5rem;
    margin: 0rem;
}
h3 {
    font-size: 2rem;
    text-align: center;
    margin: 0rem;
    background-color: var(--cc-darkblue);
    border-radius: 0.1rem;
    color: white;
}
.centered {
    margin: auto;
    text-align: center;
}
.centered > * > * {
    margin: 1rem;
}
section {
    border: 0.3rem solid var(--cc-lightgreen);
    border-radius: 0.5rem;
    background-color: white;
    color: black;
    margin: 1rem;
}
p {
    margin: 2rem;
}
a {
    color: white;
}
span.flat {
    color: var(--cc-lightgreen);
}

nav {
    font-size: 1rem;
    background-color: var(--cc-darkblue);
}
nav ul {
    list-style-type: none;
    margin: auto;
    padding: 3px;
    display: flex;
}
nav ul li a {
    cursor: pointer;
    padding: 0.5rem;
    flex: auto;
    text-align: center;
    white-space: nowrap;
    color: white;
}
nav ul li:hover {
    background-color: white;
    text-decoration: underline;
}
nav ul li a:hover {
    color: var(--cc-lightgreen);
}
.weak {
    color: rgb(82, 82, 82);
    font-size: smaller;
    width: 40%;
}
button {
    font-size: 1rem;
    border: none;
    padding: 10px;
    width: 100px;
    background-color: var(--cc-lightgreen);
    color: white;
    margin: 1rem;
}
button:hover {
    background-color: var(--cc-darkgreen);
}
button:active {
    background-color: var(--cc-darkblue);
    box-shadow: 0 2px #666;
    transform: translateY(4px);
}
#toggleButton {
    position: absolute;
    top: 0.75rem;
    right: 1rem;
    display: none;
    flex-direction: column;
    justify-content: space-between;
    width: 30px;
    height: 21px;
    margin: 1rem;
}
#toggleButton .bar {
    height: 3px;
    width: 100%;
    background-color: var(--cc-darkblue);
    border-radius: 10px;
}
@media all and (max-width: 650px) {
    #navBar ul {
        flex-direction: column;
        width: 100%;
    }
    #navBar ul li {
        text-align: center;
    }
    #toggleButton {
        display: flex;
    }
    #navBar {
        display: none;
        width: 100%;
    }
    #navBar.active {
        display: flex;
    }
    #navbar li {
        text-align: center;
    }
}
[v-cloak] > * {
    display: none;
}
[v-cloak]::before {
    content: "Loading...";
}
.flatlistbrand > a {
    color: var(--cc-darkblue);
    text-decoration: none;
}
form {
    padding: 1rem;
    text-align: center;
}

label,
input,
select {
    /* In order to define widths */
    display: inline-block;
}

label {
    width: 30%;
    /* Positions the label text beside the input */
    text-align: right;
}
input {
    border: solid var(--cc-lightgreen) 1px;
    margin: 0px;
    font-size: 1rem;
}
label + input,
label + select {
    width: 40%;
    /* margin-left to create a gutter between the label and input */
    margin: 0 0% 1% 6%;
}
</style>
