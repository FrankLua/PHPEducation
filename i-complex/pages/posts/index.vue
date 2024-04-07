<template>
    <div>        
        <h1 class="page-title"> {{ pageTitle }} </h1>        
        <div class="list-posts">
            <div class="">
                <button @click="updatePost()" class="btn btn-secondary"> Обновить
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                </button>
            </div>
            <div v-for="post in posts" :key="post.id"  class="post-item">
                <h3>{{ post.title }}</h3>
                <p>
                    {{ post.content }} ...
                </p>
                <h3> {{ post.create_date }}</h3>
                <div class="post-one-dashbord">                    
                    <button class = "btn btn-info" @click.prevent="openPost(post.id)"> Узнать по подробнее </button>
                    <button class="btn btn-danger" v-if="post.user_id == $auth.user.id" @click="deletePost(post.id)"> Удалить</button>                
                </div>
            </div>            
        </div>
    </div>
</template>

<script>
export default{    
    async mounted() {
        if(this.$store.getters['posts/allPosts'].length === 0 ){            
            await this.$store.dispatch('posts/fetchPosts');
        }
    },
    computed: {
        posts(){
            return this.$store.getters['posts/allPosts']
        }
    },
    data: () => ({
        pageTitle: "Моя лента"
    }),
    methods: {
        async deletePost(id){
            this.$store.dispatch('posts/deleteOne',id)       
        },
        async updatePost(){
            await this.$store.dispatch('posts/fetchPosts'); 
            let posts = this.$store.getters['posts/getPosts'];
            this.postsUpdate = posts
        },        
        openPost(id) {
            this.$router.push('/posts/' + id);
        }
    }
}


</script>

<style>
.page-title {
    text-align: center;
    border-bottom: 3px solid black;
}
.list-posts{
    text-align: center;
    width: 100%;    
}
.post-item{
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left:auto ;
    margin-right: auto ;
    border-bottom: 3px solid black;
    padding-bottom: 5px;
    width: 80%;
}

</style>