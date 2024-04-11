export const state = () => {
    return { postsSearch: [] }
}
export const mutations = {
    updateSearchPosts(state, newPosts) {
        state.postsSearch = newPosts;
    },
    deleteAllSearchPosts(state) {
        state.postsSearch = [];
    },
}
export const actions = {
    deleteAllSerchPosts({ commit }) {
        commit('deleteAllSearchPosts');
    },
    async fetchSearchByTag({ commit }, tag) {
        try {
            const posts = await this.$axios.$get(`api/post/getpostbyuser?tag=${tag}`);
            commit('updateSearchPosts', posts);
            return 200;
        }
        catch (err) {
            return err.response.status;
        }

    },
    async fetchSearchByHash({ commit }, hash) {
        try {
            const posts = await this.$axios.$get(`api/post/getpostbyhash?hash_tag=${hash}`);
            commit('updateSearchPosts', posts);
            return 200;

        }
        catch (err) {
            return err.response.status;
        }

    },
}
export const getters = {
    getSearchPosts(state) {
        return state.postsSearch;
    },
    checkPostById: (state) => (id) => {
        console.log(state.posts);
        if (state.posts !== undefined) {
            let post = state.posts.find((element) => element.id == id);
            return !!post;
        }

    },
    getOne: (state) => (id) => {
        return state.posts.find((element) => element.id == id);
    }

}
