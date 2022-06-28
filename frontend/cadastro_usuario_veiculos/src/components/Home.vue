<template>
  <div class="border w-75 ml-5">
      <table class="table table-hover">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">nome</th>
                  <th scope="col">cpf</th>
                  <th scope="col">telefone</th>
                  <th scope="col">email</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="u in usuario" :key="u.id" >
                  <td>{{u.id}}</td>
                  <td>{{u.nome}}</td>
                  <td>{{u.cpf}}</td>
                  <td>{{u.telefone}}</td>
                  <td>{{u.email}}</td>
                  <td colspan="1">
                      <button class="btn btn-warning btn-sm mr-2 font-weight-light" data-toggle="modal" data-target="#Atualizar-modal" @click="get(u)">Alterar</button>
                       <Update :usuario="u"/>
                      <button  class="btn btn-danger btn-sm font-weight-light"  @click="remover(u)">Remover</button>
                  </td>
              </tr>  
          </tbody>
          <button  type="button" class="btn btn-dark mt-3" data-toggle="modal" data-target="#exampleModal">
              Adicionar usuário
          </button>
    </table>
  </div>
</template>

<script>
   import Update from './update.vue'
  export default {
      
      data(){
          return{
              GetUsers: 'http://127.0.0.1:8000/api/VisualizarUsuario',
              removeUsers: 'http://127.0.0.1:8000/api/excluirUsuario/',
              Status:'',
              usuario:[],
          }
      },
      methods: {
              recuperarDados(){
                    axios.get(this.GetUsers).then(response=>{
                        this.usuario = response.data
                        console.log(this.usuario)
                    }
                    )
              },
              remover(u){

                let usuario = u.id
                this.removeUsers =  'http://127.0.0.1:8000/api/excluirUsuario/'+usuario
                let confirmacao = confirm('Tem certeza que deseja remover o usuário '+u.nome)
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
                get(u){
                    let usuario = u
                    
                    console.log(u.id)
                }
            },
          mounted() {
              this.recuperarDados();
          },
          
          components:{
            Update
          }
  }

</script>
