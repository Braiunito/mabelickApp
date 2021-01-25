<template>
    <div>
        <router-link v-if="link" :to="`/${link}`" :class="cardClass">
            

            <div v-if="code" class="code">{{code}}</div>
            <div v-else :class="'circle--'+color">
                <img :src="icon" alt="">
            </div>
            <div class="d-flex flex-column">
                <span>
                    <span v-for="(item, index) in materiales" class="text-darklight text-tiny">{{item.name+' '}}</span>
                </span>
                <span class="text-dark">{{name}}</span>
            </div>

        </router-link>
        
        <div v-else-if="loading" :class="cardClass">
            <div class="circle--gray">
                <img src="" alt="">
            </div>
                <span class="mockup--text"></span>
        </div>

        <div v-else :class="cardClass">

            <div :class="'circle--'+color">
                <img :src="icon" alt="">
            </div>
            <span>{{link}}</span>

        </div>
    </div>
</template>

<script>
export default {
    name: 'card',
    props: ['color', 'link', 'icon', 'text', 'loading', 'code', 'name', 'alto', 'ancho', 'profundo', 'materiales'],
    data() {
        return {
            cardClass: 'card d-flex flex-row align-items-center'
        }
    },
}
</script>