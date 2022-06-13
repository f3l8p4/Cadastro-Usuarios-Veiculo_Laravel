<template>
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
                        <button class="btn btn-warning btn-sm mr-2 font-weight-light" data-toggle="modal" data-target="#Atualizar-modal" @click="get(u)">Alterar</button>
                         <Update :usuario="u"/>    
                        <button  class="btn btn-danger btn-sm font-weight-light"  @click="remover(u)">Remover</button>
                    </td>
                </tr>  
            </tbody>
            <button  type="button" class="btn btn-dark mt-3" data-toggle="modal" data-target="#exampleModal1">
                Adicionar Veiculo
            </button>
            <!--Modal de criação do usuário-->
              <Add/>
            <!--Modal-->
      </table>
    </div>
  </template>
  
  <script>
    import Add from './AddVeiculo.vue'
    import Update from './update_veiculo.vue'
    export default {
        
        data(){
            return{
                GetVehicles: 'http://127.0.0.1:8000/api/VisualizarVeiculo',
                veiculo:[],
            }
        },
        methods: {
                recuperarDados(){
                      axios.get(this.GetVehicles).then(response=>{
                          this.veiculo = response.data
                          console.log(this.veiculo)
                      }
                      )
                },
                remover(v){
                    let veiculo = v.id
                    let url = ''+v.id
                    let confirmacao = confirm('Tem certeza que deseja remover o veiculo '+v.nome)
                    if(!confirmacao) {
                        return false;
                    }
                    let config = {
                    Headers:{
                        'Authorization': this.Authorization,
                        'Content-type':'aplication/json'
                    }
                    }
                    axios.delete(this.removeUsers,config).then(res=>{
                        console.log('Usuário excluido com sucesso')
                    }).catch(erro=>{console.log(erro)})
                },
            mounted() {
                this.recuperarDados();
            },
    },
    component:{
        Add
    }
}
  
  </script>
  