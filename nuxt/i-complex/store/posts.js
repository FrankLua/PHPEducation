export const state = () => {
    return { posts: [] }
}
export const mutations = {
    updatePosts(state, posts) {
        state.posts = posts
    },
    setPost(state, post) {
        state.posts.push(post);
    },
    deletePost(state, id) {
        state.posts = state.posts.filter(item => item.id !== id);
    },
    deleteAll(state){
        state.posts = [];
    }
}
export const actions = {
    async deleteAll({commit}) {
      commit('deleteAll')
    },
    async deleteOne({ commit }, id) {
        const posts = await this.$axios.$delete(`api/post/destroy?id=${id}`);
        commit('deletePost', id)
    },
    async fetchPosts({ commit }) {
        const posts = await this.$axios.$get('api/post/getmyposts');
        commit('updatePosts', posts)
    },
    async setOne({ commit }, id) {
        const post = await this.$axios.$get(`api/post?id=${id}`);
        commit('setPost', post)
    }
}
export const getters = {
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
