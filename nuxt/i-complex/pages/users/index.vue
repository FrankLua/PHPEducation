<template>
    <div class="wrapper">
        <h1>{{ pageTitle }}</h1>
        <div v-for="user of users" :key="user.id" class="item">
            <div class="cart-user">
                <div class="user-info">
                    <a href="#" @click.prevent="openUser(user.id)">Профиль</a>

                    <h5>
                        Имя: {{ user.name }}
                    </h5>
                    <h5>
                        Тэг пользователя: {{ user.tag}}
                    </h5>
                </div>
                <div class="user-img">
                    <img src="../../accets/UserAvatar.JPG" alt="">
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    async fetch({store}){
        if(store.getters['users/users'].length === 0)
        {
            await store.dispatch('users/fetch');
        }
    },
    computed:{
        users(){
            return this.$store.getters['users/users']
        }
    },
    data: () => ({
        pageTitle: "Список пользователей"
    }),
    methods:{
        openUser(id){
            this.$router.push('/users/' + id);
        }
    }
}
</script>
<style scope>
.user-info{
    width: 100%; 
}
.wrapper{
    margin: 0 auto;
    width: 750px;
    text-align: center;
}
.cart-user{
    display: flex;
    padding: 0 2%;    
    justify-content: space-between;
    border: 1px solid black;
    border-radius: 25px;
    margin-bottom: 10px ;
    
}
.user-img {
    vertical-align: middle;

    >img {
        margin-top: 4px;
        border-radius: 10px;
        width: 80px;
        height: 80px;
    }
}

</style>