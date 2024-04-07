<template>
    <section>
        <div class="auth-form">
            <div v-show = "validateProp.isError" class="alert alert-danger">
                {{validateProp.message}}
            </div>
        <form @submit.prevent="onSubmit">
            <h1>Вход</h1>
            <div v-show="validateProp.isValidEmail" class="alert alert-danger">
                {{ validateProp.messageEmail }}
            </div>
            <div class="form-group">
                <input v-model="userLogin.email" type="text" class="form-control" placeholder="Ваш емайл" name="login">
            </div>
            <div class="form-group">
                <input v-model="userLogin.password" type="password" class="form-control" placeholder="Ваш пароль" name="password">
            </div>
            <div v-show="validateProp.isValidPassword" class="alert alert-danger">
                {{ validateProp.messagePassword }}
            </div>
            <button class="btn " style="background-color: #8064A2; width: 90%;" type="submit"> Войти </button>
        </form>
        </div>        
    </section>

</template>

<script>
import validate from '~/mixins/validate/validate';
import Empty from '../../layouts/empty.vue';
import axios from 'axios';


export default{
    layout: 'empty',
    data () {
        return {
            userLogin:{
                email:'',
                password:''
            },
            validateProp:{
                isValidEmail:false,
                messageEmail:'',
                isValidPassword:false,
                messagePassword:'',
                isError:false,
                message:''
            }

        }
    },
    methods:{
        async onSubmit() {
            
            
            if(!this.validate(this.userLogin)){
                return;
            }
            try{
            await this.$auth.loginWith('local',{
                data: {
                    email: this.userLogin.email,
                    password: this.userLogin.password
                }                
            });
            } catch(ex){
                this.validateProp.isError = true;
                this.validateProp.message = 'Неправильный пароль или емайл'                
            }
            
        },
        handlerError(){

        },
        validate(user){
            if(!validate.validateLength(user.email,8,50)){
                this.validateProp.messageEmail = "Максимальная длина емайла 50 символов минимальная 8";
                this.validateProp.isValidEmail = true;
                return false
            }
            if(!validate.validateEmail(user.email)){
                this.validateProp.messageEmail = "Введите правильно свой емайл";
                this.validateProp.isValidEmail = true;
                return false
            }
            if(!validate.validateLength(user.password,8,50)){
                this.validateProp.messagePassword = "Пароль не может быть меньше 8 символов";
                this.validateProp.isValidPassword = true;
                return false
            }
            return true;
        }
    }
}

</script>

<style scoped>

.auth-form{
    background: #1C1E20;
    width: 800px;
    text-align: center;
    color: white;
    border-radius: 25px;
    padding: 10%;
}
form {
    width: 500px;
    margin: 0 auto;
    
}
.form-group{
    margin:2%;
}

</style>