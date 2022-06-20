<template>
  <home/>
</template>

<script>
export default {
  name: 'IndexPage',
  created(){
    this.$store.dispatch('user/getUser')
  }
}
</script>
