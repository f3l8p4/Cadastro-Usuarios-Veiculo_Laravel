<template>
  <Home/> 
</template>

<script>

import Home from './components/Home.vue'
import Alert from './components/Alert.vue'
require('./bootstrap.js')
export default {
  name: 'App',
  components: {
    Home, Alert
  }
}
</script>

<style>

</style>
