<template>
   <div class="home">
      <div class="home__options d-flex py-3 justify-content-between">
         <div class="home___options__left d-flex container">
            <img src="../../images/icons/ham.svg" alt="">
            <div class="home___options__left__breadcrum d-flex">
               <span class="text-bold text-contrast">{{appName}} <img src="../../images/icons/open.svg" alt=""></span>
            </div>
         </div>
         <div class="home___options__right d-flex justify-content-end container">
            <input type="text" name="search" id="search">
            <img @click="search()" id="searchIcon" src="../../images/icons/search.svg" alt="">
            <img class="pl-2" src="../../images/icons/3dots.svg" alt="">
         </div>
      </div>
      <div class="home__hero">
         <div class="hero">
            <img src="../../images/logo.svg" alt="">
            <h3 class="text-center text-upper text-regular">Mabelick <br> <b>ADMIN</b></h3>
         </div>
      </div>
      <div class="home__user d-flex align-items-center">
         <div class="circle--dark">
            <img src="../../images/icons/user.svg" alt="">
         </div>
         <span class="text-bold text-contrast">Bienvenido Usuario!</span>
      </div>
      <div class="home__content container">
            <card @click="search()" color="purple" text="Buscar" :icon="require('../../images/icons/search.svg').default"></card>

            <card color="aqua" text="Ventas" :icon="require('../../images/icons/money.svg').default"></card>
            
            <card color="yellow" text="Actualizar precio de materiales" :icon="require('../../images/icons/money.svg').default"></card>

            <card color="red" text="Configurar usuarios" :icon="require('../../images/icons/money.svg').default"></card>

            <card color="cian" text="Agregar nuevo producto" :icon="require('../../images/icons/money.svg').default"></card>
      </div>
   </div>
</template>

<script>
import card from "../components/card.vue";
export default {
   data() {
      return {
         appName: 'Inicio',
         closeSearch: false
      }
   },
   components: {
      'card': card
   },
   methods: {
      search() {
         document.body.addEventListener('click', ()=>{
            if (this.closeSearch) {
               document.body.setAttribute('search', false);
               console.log('No searching', this.closeSearch);  
            } else {
               document.body.setAttribute('search', true);
               console.log('Searching', this.closeSearch);
            }
         });
      }
   },
   mounted() {
         document.getElementById('search').addEventListener('focus', ()=> {
            this.closeSearch = true;
            console.log('focused', this.closeSearch);
         });

         document.getElementById('search').addEventListener('focusout', ()=> {
            this.closeSearch = false;
            console.log('unfocus', this.closeSearch);
         });
   },
}
</script>

<style>
  /* Your styles */
  .center {
     Text-align: center;
  }
</style>
