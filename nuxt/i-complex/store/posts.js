export const state = () => {
    return { posts: [], postsSearch: [] }
}
export const mutations = {
    updateSearchPosts(state, newPosts) {
        state.postsSearch = newPosts;
    },
    updatePosts(state, posts) {
        state.posts = posts
    },
    deleteAllSearchPosts(state) {
        state.postsSearch = [];
    },
    setPost(state, post) {
        state.posts.push(post);
    },
    deletePost(state, id) {
        state.posts = state.posts.filter(item => item.id !== id);
    },
    deleteAll(state) {
        state.posts = [];
    }
}
export const actions = {
    deleteAll({ commit }) {
        commit('deleteAll')
    },
    deleteAllSerchPosts({ commit }) {
        commit('deleteAllSearchPosts');
    },
    async deleteOne({ commit }, id) {
        const posts = await this.$axios.$delete(`api/post/destroy?id=${id}`);
        commit('deletePost', id)
    },
    async fetchPosts({ commit }) {
        const posts = await this.$axios.$get('api/post/getmyposts');
        commit('updatePosts', posts)
    },
    async fetchSearchByTag({ commit }, tag) {
        const posts = await this.$axios.$get(`api/post/getpostbyuser?tag=${tag}`);
        commit('updateSearchPosts', posts);
    },
    async fetchSearchByHash({ commit }, hash) {
        try {
            const posts = await this.$axios.$get(`api/post/getpostbyhash?hash_tag=${hash}`);
            commit('updateSearchPosts', posts);
            return 200;

        }
        catch (e) {
            console.log(e);
            return 500;
        }

    },
    async setOne({ commit }, id) {
        const post = await this.$axios.$get(`api/post?id=${id}`);
        commit('setPost', post)
    }
}
export const getters = {
    getSearchPosts(state) {
        return state.postsSearch;
    },
    allPosts(state) {
        return state.posts;
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
