import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        auth: false,
        session: "",
        user: {
            UserID: "",
            UserFirstName: "",
            UserLastName: "",
            UserEmail: "",
        },
        tasks: [],
        numLists: "3",
        lists: [{}],
    },
    getters: {},
    mutations: {
        signIn: (state, payload) => {
            state.auth = payload.auth;
            state.session = payload.session;
            state.user.UserID = payload.UserID;
            state.user.UserFirstName = payload.UserFirstName;
            state.user.UserLastName = payload.UserLastName;
            state.user.UserEmail = payload.UserEmail;
        },
        logOut: (state) => {
            state.auth = false;
            state.session = "";
            state.user.UserID = "";
            state.user.UserFirstName = "";
            state.user.UserLastName = "";
            state.user.UserEmail = "";
        },
        getTasks: (state) => {
            state.tasks = [];
            const formdata = new FormData();
            formdata.append("UserID", state.user.UserID);
            formdata.append("SessionID", state.session);
            fetch("http://localhost/flatlist/src/php/getTasks.php", {
                method: "post",
                body: formdata,
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.status == "success") {
                        state.tasks = data.tasks;
                    } else {
                        console.log("data");
                    }
                })
                .then(() => {
                    state.numLists = "3";
                    state.lists = [];
                    for (let i = 0; i < state.numLists; i++) {
                        state.lists[i] = [];
                        state.lists[i][0] = i + 1;
                    }
                    let listToAddTo = 0;
                    state.tasks.forEach((task) => {
                        if (listToAddTo >= state.numLists) {
                            listToAddTo = 0;
                        }
                        state.lists[listToAddTo].push(task);
                        listToAddTo++;
                    });
                });
        },
        setLists: (state, payload) => {
            state.numLists = payload.numLists;
            state.lists = [];
            for (let i = 0; i < state.numLists; i++) {
                state.lists[i] = [];
                state.lists[i][0] = i + 1;
            }
            let listToAddTo = 0;
            let direction = "ascending";
            state.tasks.forEach((task) => {
                if (listToAddTo == state.numLists) {
                    direction = "descending";
                }
                if (listToAddTo == 0) {
                    direction = "ascending";
                }
                state.lists[listToAddTo].push(task);
                if (direction == "ascending") {
                    listToAddTo++;
                } else {
                    listToAddTo--;
                }
            });
        },
    },
    actions: {},
    modules: {},
});
