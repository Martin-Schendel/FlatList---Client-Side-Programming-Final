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
    },
    getters: {},
    mutations: {
        setAuth: function (state, payload) {
            state.auth = payload.auth;
            state.session = payload.session;
        },
        setUser: function (state, payload) {
            state.user.UserId = payload.UserId;
            state.user.UserFirstName = payload.UserFirstName;
            state.user.UserLastName = payload.UserLastName;
            state.user.UserEmail = payload.UserEmail;
        },
        logOut: function (state) {
            state.auth = false;
            state.session = "";
            state.user.UserId = "";
            state.user.UserFirstName = "";
            state.user.UserLastName = "";
            state.user.UserEmail = "";
        },
    },
    actions: {},
    modules: {},
});
