<template>
    <div>
        <a v-if="ref" :href="ref" :class="cardClass">

            <div :class="'circle--'+color">
                <img :src="icon" alt="">
            </div>
            <span>{{text}}</span>

        </a>
        <div v-else :class="cardClass">

            <div :class="'circle--'+color">
                <img :src="icon" alt="">
            </div>
            <span>{{text}}</span>

        </div>
    </div>
</template>

<script>
export default {
    name: 'card',
    props: ['color', 'icon', 'text'],
    data() {
        return {
            cardClass: 'card d-flex flex-row align-items-center'
        }
    },
}
</script>