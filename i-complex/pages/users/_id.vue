<template>
    <section>
        <div class="page-user">
            <div class="information">
                <div class="info-block">
                    <button label="Show toast" @click="toast.add({ title: 'Hello world!' })"></button>
                    <h2>
                        Имя: {{ user.name }}
                    </h2>
                    <div class="mini-block">
                        <h2>
                            Тэг: {{ user.tag }}
                        </h2>
                    </div>
                    <div class="user-dashbord">
                        <button v-if='user.isSubscribe && user.id != $auth.user.id' class="btn btn-danger" @click="unSubscribe(user.id)">
                            Отписаться
                        </button>
                        <button v-if ="!user.isSubscribe && user.id != $auth.user.id" class="btn btn-success" @click="subscribeUser(user.id)">
                            Подписаться
                        </button>
                    </div>
                </div>
                <div class="user-page-img">
                    <img src="../../accets/UserAvatar.JPG" alt="">
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {    
    async asyncData({ $axios, params }) {
        let id = params.id        
        let userRaw = await $axios.get(`api/user?id=${id}`)
        let user = userRaw.data;
        return { user }
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
    methods:{
        async unSubscribe(id) {
            console.log(id)
            let response = await this.$axios.post('api/user/unsubscribeuser',{
                influence_id : this.user.id
            })
            if(response.status == 204){
                let userRaw = await this.$axios.get(`api/user?id=${id}`)
                this.$store.dispatch('posts/fetchPosts')
                this.user = userRaw.data;
                alert('Вы успешно отписались')
                return
            }
            else{
                lert('Что то пошло не так(')
            }
            
        },
        async subscribeUser(id){
            let response = await this.$axios.post('api/user/subscribeuser', {
                influence_id: this.user.id
            })
            if (response.status == 200) {
                let userRaw = await this.$axios.get(`api/user?id=${id}`)
                this.$store.dispatch('posts/fetchPosts')
                this.user = userRaw.data;
                alert('Вы успешно подписались')
                return
            }
            else {
                alert('Что то пошло не так(')
            }
        }
    }
}
</script>
<style scope>
.information {
    display: flex;
    justify-content: space-between;

}

.user-page-img {
    >img {
        border-radius: 10px;
        width: 250px;
        height: 250px;
    }
}
</style>