<template>
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adicionar Veiculo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Placa</label>
                    <input type="text" v-model="placa" class="form-control">
                </div>
    
                
                <div class="form-group">
                    <label for="">cor</label>
                    <input type="text" v-model="cor" class="form-control">
                </div>
    
                
                <div class="form-group">
                    <label for="">Ano</label>
                    <input type="text" v-model="ano" class="form-control">
                </div>
    
                <div class="form-group">
                    <label for="">marca</label>
                    <input type="text" v-model="marca" class="form-control">
                </div>
    
                <div class="form-group">
                    <label for="">modelo</label>
                    <input type="text" v-model="modelo" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Proprietario</label>
                    <input type="text" v-model="proprietario_id" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
              <button  @click="salvar()" class="btn btn-success">Adicionar</button>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
              placa : '',
              cor : '',
              ano : '', 
              marca : '',
              modelo:'',
              proprietario_id:''
        }
    },
    methods: {
        salvar(){
            let url =  'http://127.0.0.1:8000/api/veiculo'
            let veiculo = {
                        placa: this.placa,
                        cor : this.cor,
                        ano: this.ano,
                        marca: this.marca,
                        modelo: this.modelo,
                        proprietario_id: this.proprietario_id
            }
            let config = {
                Headers:{
                    'Content-Type': 'application/json',
                    'Accept':'application/json' 
                }
            }
            axios.post(url,veiculo,config).then(response =>{
                console.log('veiculo atualizado com sucesso')
            }).catch( error =>{
                console.log(error)
            })
            
        }
    }
}
</script>