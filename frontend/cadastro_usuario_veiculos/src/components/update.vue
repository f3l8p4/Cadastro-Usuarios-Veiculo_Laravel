<template>
    <div class="modal fade" id="atualizar-modal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="Atualizar-modal">Atualizar usuário</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" v-model="usuario.nome" class="form-control">
                </div>
    
                
                <div class="form-group">
                    <label for="">cpf</label>
                    <input type="text" v-model="usuario.cpf" class="form-control">
                </div>
    
                
                <div class="form-group">
                    <label for="">telefone</label>
                    <input type="text" v-model="usuario.telefone" class="form-control">
                </div>
    
                <div class="form-group">
                    <label for="">email</label>
                    <input type="text" v-model="usuario.email" class="form-control">
                </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
                <button class="btn btn-success" @click="atualizar(u)">Atualizar usuário</button>
                
            </div>
          </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                GetUser: 'http://127.0.0.1:8000/api/AlterarUser/',
            }
        },
        props:{
            usuario:{
                type: Object,
                default: []
            }
        },
        methods: {
            atualizar(){
                let config = {
                      Headers:{
                          'Content-Type': 'application/json',
                          'Accept':'application/json'
                      }
                }
                this.GetUser = 'http://127.0.0.1:8000/api/AlterarUser/'+this.usuario.id 
                axios.put(this.GetUser).then( response =>{
                    nome = this.usuario.nome,
                    cpf = this.usuario.cpf,
                    telefone =  this.usuario.telefone,
                    email = this.usuario.email,
                    console.log('Usuario Atualizado')
                }).catch(
                    errors =>{console.log(errors)}
                )
            }
        },
    }
</script>