<template>
    <div  v-show=" modalActive" class="background-modal">
        <div v-if="modalActive" class="modal-content">
            <slot></slot>
            <button class="btn btn-danger" @click="$emit('close-modal')"> Закрыть </button>
        </div>
    </div>
</template>

<script >
export default {
    props:{
        modalActive: {
            type: Boolean,
            default: false,
        }
    },
    methods:{
        /* closeModal(){
            this.$emit('modalActive', false)
        } */
    }

    
}
</script>

<style>
.background-modal{
    text-align: center;
        display: flex;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
}
.modal-content{
    z-index: 2;
    background: #1C1E20;
    
    color: white;
    margin: 15% auto;
    border-radius: 25px ;
    height: 700px;
    padding-bottom: 30px;
    padding-top:1% ;
    padding-left: 5%;
    padding-right: 5%;
    /* 15% from the top and centered */
    border: 1px solid #888;
    width: 80%;
}

</style>