<template>
    <div>
        <div v-if="loading" class='loading container'>
            <card :loading="loading" v-for="i in 5"></card>
        </div>
        <div v-else class="container">
            <card v-for="(item, index) in items" circle="cian" :link="item.id" :code="item.code" :name="item.name" :materiales="item.materials" :text="`${item.code +': '+ item.name} ${item.alto}x${item.ancho}x${item.profundo}`"></card>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import card from './card';

export default {
    name: 'Search',
    data() {
        return {
            loading: true,
            items: []
        }
    },
    components: {
        card,
    },
    mounted() {
        axios.post('/product/1').then(response => {
            let {data} = response;
            console.log(data);
            this.items = data;
            this.loading = false;
        })
    },
}
</script>