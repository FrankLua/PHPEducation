<template>
    <section>
        <h1 class="page-title">Пост</h1>
        <div class="big-one-post">
            <div class="post-child">
                <h1>{{ post.title }}</h1>
                <p class="text-big-post">{{ post.content }}</p>
                <div class="post-footer">
                    <h4>Автор: {{ post.user_tag }}</h4>
                    <h4>Дата создания: {{ post.create_data}}</h4>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    async asyncData({$axios,params}) {
        let id = params.id
        let postRaw = await $axios.get(`api/post?id=${id}`)
        let post = postRaw.data;
        return { post }
    },

    data: () => ({
        /*  user: {
             firstname:'Загружаем',
             lastname: 'Загружаем'            
         } */
    }),
    validate({ params }) { // this несуществует!
        return true
    },


}
</script>
<style scope>
.big-one-post {
    min-height: 100vh;
    border-radius: 25px;
    position: relative;
    text-align: center;
    >div>form {
        padding-left: 10%;
        padding-right: 10%;
    }
}
.big-one-post:after {
    content: '';
    width: 100%;
    min-height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0.75;
}

.post-child {
    position: relative;
    z-index: 1;
}

.big-one-post {
    color: white;

}

.text-big-post {
    height: 800px;
}
</style>