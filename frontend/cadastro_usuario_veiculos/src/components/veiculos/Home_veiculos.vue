<template :onLoad="handle">
    <div class="border w-75 ml-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Placa</th>
                    <th scope="col">cor</th>
                    <th scope="col">ano</th>
                    <th scope="col">marca</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="v in veiculo" :key="v.id" >
                    <td>{{v.id}}</td>
                    <td>{{v.placa}}</td>
                    <td>{{v.cor}}</td>
                    <td>{{v.ano}}</td>
                    <td>{{v.marca}}</td>
                    <td>{{v.modelo}}</td>
                    <td colspan="1">
                        <button class="btn btn-warning btn-sm mr-2 font-weight-light" data-toggle="modal" data-target="#Atualizar-modal1">Alterar</button>
                         <Update :veiculo="u"/>    
                        <button  class="btn btn-danger btn-sm font-weight-light"  @click="remover(v)">Remover</button>
                    </td>
                </tr>  
            </tbody>
            <button  type="button" class="btn btn-dark mt-3" data-toggle="modal" data-target="#exampleModal1">
                Adicionar Veiculo
            </button>
      </table>

    </div>
  </template>
  
  <script>
    import Add from './AddVeiculo.vue'
    import Update from './update_veiculo.vue'
    export default {
        
        data(){
            return{
                veiculo:[],
            }
        },
        methods: {
                recuperarVeiculos(){
                    let GetVehicles = 'http://127.0.0.1:8000/api/VisualizarVeiculo'
                      axios.get(GetVehicles).then(response=>{
                          this.veiculo = response.data
                          console.log('Ola')
                      }
                      )
                      console.log('Ola')
                },
                remover(v){
                    let url = 'http://127.0.0.1:8000/api/deleteVeiculo/'+v.id
                    let confirmacao = confirm('Tem certeza que deseja remover o veiculo '+v.placa)
                    if(!confirmacao) {
                        return false;
                    }
                    let config = {
                    Headers:{
                        'Content-type':'aplication/json'
                    }
                    }
                    axios.delete(url,config).then(res=>{
                        console.log('Veiculo excluido com sucesso')
                    }).catch(erro=>{console.log(erro)})
                },
    },
    mounted(){
                this.recuperarVeiculos()
                console.log('Ola')
            },
    component:{
        Add,Update
    }
}
  
  </script>
  