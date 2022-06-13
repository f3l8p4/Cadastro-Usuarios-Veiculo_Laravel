<template>
 <Home/> 
 <HomeVue/>
</template>

<script>

import Home from './components/Home.vue'
import HomeVue from './components/veiculos/Home_veiculos.vue'
import Vue from 'vue';
import Vuex from 'vuex'

export default {
  name: 'App',
  components: {
    Home,HomeVue
  },
}

const route=[
    {
    path: '/',
    name:'Home',
    component: Home,
    },
    {
    path: '/veiculo',
    component: HomeVue,
    }
  ]

</script>

