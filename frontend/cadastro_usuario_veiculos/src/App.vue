<template>
  <Home/> 
</template>

<script>

import Home from './components/Home.vue'
import { createStore } from 'vuex'
import Alert from './components/Alert.vue'
import Vue from 'vue';
import Vuex from 'vuex'

require('./bootstrap.js')
export default {
  name: 'App',
  components: {
    Home, Alert
  },
}

</script>

<style>

</style>
