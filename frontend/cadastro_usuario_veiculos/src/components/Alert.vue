<template>
    <div :class="estilo" role="alert">
       {{titulo}}
    </div>
</template>
<script>
    export default{
        props:['tipo','titulo'],
        computed:{
            estilo(){
                return 'Alert Alert-danger'+this.tipo
            }
        }
    }
</script>