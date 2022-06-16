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
                    <th scope="col">Modelo</th>
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
                        <button type="button" class="btn btn-warning btn-sm mr-2 font-weight-light" data-toggle="modal" data-target="#Atualizar" @click="get(v)">Alterar</button>
                        <UpdateV :veiculo="v"/>
                        <button  class="btn btn-danger btn-sm font-weight-light"  @click="remover(v)">Remover</button>
                    </td>
                    <!--Update-->
                    <div class="modal fade" id="Atualizar" tabindex="-1" role="dialog"  aria-hidden="false">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="Atualizar">Atualizar Veiculo</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                
                                <div class="form-group">
                                    <label for="">Placa</label>
                                    <input type="text" v-model="selected[1]" class="form-control">
                                </div>
                    
                                
                                <div class="form-group">
                                    <label for="">cor</label>
                                    <input type="text" v-model="selected[2]" class="form-control">
                                </div>
                    
                                
                                <div class="form-group">
                                    <label for="">marca</label>
                                    <input type="text" v-model="selected[3]" class="form-control">
                                </div>
                    
                                <div class="form-group">
                                    <label for="">modelo</label>
                                    <input type="text" v-model="selected[4]" class="form-control">
                                </div>
                
                                <div class="form-group">
                                    <label for="">ano</label>
                                    <input type="text" v-model="selected[5]" class="form-control">
                                </div>
                
                            </div>
                
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
                                <button class="btn btn-success" @click="atualizar(v)">Atualizar</button>
                              
                            </div>
                          </div>
                        </div>
                    </div>
                    <!--Fim do update-->
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
    export default {
        
        data(){
            return{
                veiculo:[],
                selected:[]
            }
        },
        methods: {
                recuperarVeiculos(){
                    let GetVehicles = 'http://127.0.0.1:8000/api/VisualizarVeiculo'
                      axios.get(GetVehicles).then(response=>{
                          this.veiculo = response.data
                      }
                      )
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
                get(v){
                    this.selected = [v.id,v.placa,v.cor,v.modelo,v.marca,v.ano]
                    console.log(this.selected)
                },
                atualizar(v){
                let selected = this.selected
                let veiculo = {
                    placa : selected[1],
                    cor :  selected[2],
                    ano :  selected[5],
                    marca : selected[4],
                    modelo : selected[3],
                }
                let config = {
                      Headers:{
                          'Content-Type': 'application/json',
                          'Accept':'application/json',
                      }
                }
                let GetVehicle = 'http://127.0.0.1:8000/api/AlterarVeiculo/'+selected[0]
                axios.put(GetVehicle,veiculo,config).then( response =>{
                    console.log(response)
                }).catch(
                    errors =>{console.log(errors)}      
                )
            }
            },
            mounted(){
                this.recuperarVeiculos()
            },
    component:{
        Add
    }
}
  
  </script>
  