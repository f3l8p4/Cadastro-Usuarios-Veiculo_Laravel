<template>
    <div class="modal fade" id="Atualizar-modal" tabindex="-1" role="dialog"  aria-hidden="true">
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
                    <label for="">Telefone</label>
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
                type:Object,
                default:[]
            }
        },
        methods: {
            atualizar(u){
                console.log(u.id)
                let user = {
                    nome : this.usuario.nome,
                    telefone : this.usuario.telefone,
                    cpf : this.usuario.cpf,
                    email : this.usuario.email,
                }
                let config = {
                      Headers:{
                          'Content-Type': 'application/json',
                          'Accept':'application/json',
                          'Authorization': this.Authorization,
                      }
                }
                this.GetUser = 'http://127.0.0.1:8000/api/AlterarUser/'+this.usuario.id
                axios.put(this.GetUser,user,config).then( response =>{
                    console.log(this.usuario)
                }).catch(
                    errors =>{console.log(errors)}      
                )
                console.log(this.usuario)
            }
        },
    }
</script>