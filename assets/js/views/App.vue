<template>
    <div>
        <div class="app__options d-flex py-3 justify-content-between">
            <div class="app___options__left d-flex container">
            <img src="../../images/icons/ham.svg" alt="">
            <div class="app___options__left__breadcrum d-flex">
                <span class="text-bold text-contrast">{{$route.name}} <img src="../../images/icons/open.svg" alt=""></span>
            </div>
            </div>
            <div class="app___options__right d-flex justify-content-end container">
            <input type="text" name="search" id="search">
            <img @click="moveToSearch()" id="searchIcon" src="../../images/icons/search.svg" alt="">
            <img class="pl-2" src="../../images/icons/3dots.svg" alt="">
            </div>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
  export default {
    name: "App",
    data() {
        return {
            closeSearch: true
        }
    },
    mounted() {
        document.body.addEventListener('click', ()=>{
            if (this.closeSearch) {
               document.body.setAttribute('search', false);
               console.log('No searching', this.closeSearch);  
            } else {
               document.body.setAttribute('search', true);
               console.log('Searching', this.closeSearch);
            }
         });

         document.getElementById('search').addEventListener('focus', ()=> {
            this.$router.push("search");
            this.closeSearch = false;
            console.log('focused', this.closeSearch);
         });

         document.getElementById('search').addEventListener('focusout', ()=> {
            this.closeSearch = true;
            console.log('unfocus', this.closeSearch);
            if (document.getElementById('search').value == '') {
                this.$router.back();
            }
         });
    },
  }
</script>

<style scoped>

</style>