<template>
 <Home/> 
 <HomeVue/>
 <Modal/>
 <Add/>

</template>

<script>

import Home from './components/Home.vue'
import HomeVue from './components/veiculos/Home_veiculos.vue'
import Vue from 'vue';
import Vuex from 'vuex'
import Modal from './components/add.vue'
import Add from './components/veiculos/AddVeiculo.vue'
import VueBasicAlert from 'vue-basic-alert'


export default {
  name: 'App',
  components: {
    Home,HomeVue,Modal,Add
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

