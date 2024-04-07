export default {


    async createPost(post, callback) {
        let data = await $axios.post('api/post/store', post);
        callback(data);
    }


}