<template>
   <div class="home">
     

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

            <card @click="moveToSearch()" color="purple" text="Buscar" :icon="require('../../images/icons/search.svg').default"></card>

            <card color="aqua" text="Ventas" :icon="require('../../images/icons/money.svg').default"></card>
            
            <card color="yellow" text="Actualizar precio de materiales" :icon="require('../../images/icons/money.svg').default"></card>

            <card color="red" text="Configurar usuarios" :icon="require('../../images/icons/money.svg').default"></card>

            <card color="cian" text="Agregar nuevo producto" :icon="require('../../images/icons/money.svg').default"></card>
      </div>
   </div>
</template>

<script>
import card from "./card.vue";
export default {
   name: "Home",
   components: {
      card
   },
   methods: {
      moveToSearch() {
         document.getElementById('search').focus();
      }
   },
   mounted() {
   },
}
</script>

<style>
  /* Your styles */
  .center {
     Text-align: center;
  }
</style>
