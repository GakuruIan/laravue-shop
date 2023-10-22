import Vuex from "vuex";

import { createStore } from 'vuex';

import createPersistedState from "vuex-persistedstate";
import SecureLS from "secure-ls";

const ls = new SecureLS({ isCompression: false });

const store =  createStore({

    state:{
        user:null,
        LoggedIn:false
    },

    mutations:{
        setUser(state,user){
            state.user = user;
        },

        clearUser(state){
            state.user = null
        },

        successLogin(state,LoggedIn){
            state.LoggedIn = LoggedIn
        },

        failedLogin(state,LoggedIn){
            state.LoggedIn = LoggedIn
        }
    },

    actions:{
        setUser({commit},user){
            commit('setUser',user)
        },

        clearUser({commit},user){
            commit('clearUser',user)
        },

        setSuccessLogin({commit},LoggedIn){
            commit('successLogin',LoggedIn)
        },

        setFailedLogin({commit},LoggedIn){
            commit('failedLogin',LoggedIn)
        }
    },

    getters:{
      user: (state) => state.user,
      LoggedIn:(state) => state.LoggedIn
    },

    plugins:[
        createPersistedState({
            storage: {
                getItem: key => ls.get(key),
                setItem: (key, value) => ls.set(key, value),
                removeItem: key => ls.remove(key)
              }
        })
    ]
})

export default store;