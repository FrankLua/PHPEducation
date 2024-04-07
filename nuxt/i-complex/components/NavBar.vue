<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5" style="background: #3D4348;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Bitter</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">                    
                    <li class="nav-item" v-if="$auth.loggedIn">
                        <nuxt-link active-class="active" class="nav-link" to="/posts">Моя лента</nuxt-link>
                    </li>
                    <li class="nav-item" v-if="$auth.loggedIn">
                        <nuxt-link active-class="active" class="nav-link" to="/posts/postsearchperson">Поиск человека</nuxt-link>
                    </li>
                    <li class="nav-item" v-if="$auth.loggedIn">
                        <nuxt-link active-class="active" class="nav-link" to="/posts/postsearchhash">Поиск хэштега</nuxt-link>
                    </li>
                    <li class="nav-item" v-if="$auth.loggedIn">
                        <nuxt-link active-class=" active" class="nav-link" to="/users">Пользователи</nuxt-link>
                    </li>                    
                    <li class="nav-item" v-if="$auth.loggedIn">
                        <a active-class="active" class="nav-link" v-on:click="openModal() ">Написать пост</a>
                    </li>
                    <li class="nav-item" v-else>
                        <nuxt-link active-class="active" class="nav-link" to="/auth/login">Войти</nuxt-link>
                    </li>
                    <li class="nav-item" v-if="$auth.loggedIn">
                        <a @click.prevent="$auth.logout()" active-class="active" class="nav-link">Выйти</a>
                    </li>
                    <li class="nav-item" v-if="!$auth.loggedIn">
                        <nuxt-link active-class="active" class="nav-link"
                            to="/auth/registration">Регистрация</nuxt-link>
                    </li>  
                </ul>
                 <span class="navbar-text" v-if="$auth.loggedIn">
                    Вы авторизованны
                </span>
                <span class="navbar-text" v-else>
                    Вы не авторизованны
                </span>
            </div>
        </div>
        <CreatePostModal :modalActive="showModal" @close-modal="closeModal()">
            <form name="createPost" id="sendPost" @submit.prevent="sendPost">
                <h3>Создание поста</h3>
                <div class="alert alert-danger" role="alert" v-show="isError">
                    {{this.message}}
                </div>
                <div class="form-group">
                    <div class="alert alert-danger" role="alert" v-show="validate.isValidTitle">
                        {{validate.title}}
                    </div>
                    <input  v-model.trim="post.title" type="text" placeholder="Заголовок" class="post-input">
                </div>
                <div class="form-group">                    
                    <textarea v-model.trim="post.content" cols="30" rows="8"
                        class="post-input" placeholder="Содержание">
                    </textarea>
                    <div class="alert alert-danger" role="alert" v-show="validate.isValidContent">
                        {{ validate.content }}
                    </div>
                </div>
                <button type="submit" class="btn btn-success w-100 mb-1">Создать пост</button>
            </form>
        </CreatePostModal>
    </nav>
</template>


    <script>
    import validate from '~/mixins/validate/validate';
    import BaseModal from '~/components/BaseModal.vue'
    export default {
        components: { CreatePostModal: BaseModal},
        data() {
            return {
                post:{
                    content:'',
                    title: '', 
                },                           
                showModal: false,
                message: '',
                isError: false,
                validate: {
                    title: '',
                    isValidTitle: false,
                    isValidContent: false,
                    content: ''
                } 
            }
        },
        methods:{
            openModal(){
                this.showModal = true;       
            },
            closeModal(){
                this.showModal= false;
            },
            async sendPost(){
                if(this.validateParam()){
                    let data = await this.callApi('api/post/store','post',this.post);
                    this.handlerSend(data);
                }                
            },
            validateParam() {
                debugger
                if(!validate.validateLength(this.post.title,8,80)){
                    this.validate.isValidTitle = true
                    this.validate.title = "Минимальный размер заголовка поста - 8 символов, максимальный 80";
                    return false;                    
                }
                if(!validate.validateLength(this.post.content,50,255)){
                    this.validate.isValidContent = true
                    this.validate.content = "Минимальный размер контента - 50 символов, максимальный 255"
                    return false;                                   
                }
                return true
            },
            handlerSend(data){
                switch(data.status){
                    case 201:
                        this.$store.dispatch('posts/fetchPosts');
                        this.$router.push('/posts')
                        this.closeModal()
                        break;
                    case 400:
                        this.isError = true;
                        this.message = 'Нету пользователя с таким тегом!';
                        break;
                    case 500:
                        this.isError = true;
                        this.message = 'Что то пошло не так';
                        break;
                }
            }
        }
    }
    

</script>

<style>
.validate-error{
    background: red;
    color: black;
    border-radius: 3px;
    font-size: 14px ;
}
.post-input{
    background: #6E757D;
    text-align: center;
    width: 100%;
    border-radius: 8px;
    padding: 3px;
    color: white;
    font-size: 24px ;
}
post-input:focus{
    border: white 1px solid;
}
.form-group {
    
    margin-top: 20px;
    >textarea {
        background: #6E757D;
        resize: none;
    }
}

</style>