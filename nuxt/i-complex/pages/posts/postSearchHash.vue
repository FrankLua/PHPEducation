<template>
    <section>        
    <SearchHashVue></SearchHashVue>
    <div class="list-posts">
            <div v-for="post of posts" :key="post.id" class="post-item">
                <h3>{{ post.title }}</h3>
                <p>
                    {{ post.content }} ...
                </p>
                <h3> {{ post.create_date }}</h3>
                <div class="post-one-dashbord">
                    <button class = "btn btn-info" @click.prevent="openPost(post.id)">Узнать больше</button>
                </div>
            </div>
        </div>
    </section>
    
</template>
<script>
import SearchHashVue from '~/components/SearchHash.vue';


export default{
    async asyncData({store}) {
        if(store.getters['postsSearch/getSearchPosts'].length !== 0 ){            
            store.dispatch('postsSearch/deleteAllSerchPosts');
        }
    },
  components: { SearchHashVue },
  computed:{
    posts(){
        return this.$store.getters['postsSearch/getSearchPosts'];
    }
  }
    ,
    methods:{
        openPost(id) {
            this.$router.push('/posts/' + id);
        }
    }
}
</script>