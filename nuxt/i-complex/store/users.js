export const state = () => {
    return { users: [] }
}
export const mutations = {
    setUsers(state, users) {
        state.users = users
    },
    setUser(state, user) {
        state.users.push(user);
    }
}
export const actions = {
    async fetch({ commit }) {
        const url = `${process.env.apiUrl}api/user/getusers`;
        const users = await this.$axios.$get(url);
        commit('setUsers', users)
    },
    async setOne({ commit }, id) {
        const url = `${process.env.apiUrl}api/user/?id=${id}`;
        const user = await this.$axios.$get(url);
        commit('setUser', user)
    }
}
export const getters = {
    users(state) {
        return state.users;
    },
    checkUserById: (state) => (id) => {
        let user = state.users.find((element) => element.id == id);
        return !!user;
    },
    getOne: (state) => (id) => {
        return state.users.find((element) => element.id == id);
    }

}