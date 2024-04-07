<template>
    <div>
        <header>
            <NavBar />
        </header>        
        <main>
            <div class="container">
                <nuxt></nuxt>
            </div>
        </main>
        <footer>
            <Footer></Footer>
        </footer>
    </div>
</template>



<script>
import NavBar from '../components/NavBar.vue'
import Footer from '~/components/Footer.vue';
export default {
    components: {
        NavBar,
        Footer
    }

}
</script>

<style>

main{
    background: #3D4348;
    color:white;
    min-height: 100vh;
    display: grid;
    grid-template-rows: auto 1fr auto;
}
html{
    height: 100%;
}
footer{

}

</style>