<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="table dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                       ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nome
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CPF
                    </th>
                    <th scope="col" class="px-6 py-3">
                        email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Telefone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="usuario in $store.state.user.usuario.data" :key="usuario.id" class="elements dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{usuario.id}}
                    </td>
                    <td class="px-6 py-4">
                        {{usuario.nome}}
                    </td>
                    <td class="px-6 py-4">
                        {{usuario.cpf}}
                    </td>
                    <td class="px-6 py-4">
                        {{usuario.email}}
                        
                    </td>
                    <td class="px-6 py-4">
                        {{usuario.telefone}}
                    </td>
                    <td class="actions">
                        <button @click="getUser(usuario),ShowUpdateModal = true" class="alterar">
                            Alterar
                          </button>
                    </td>
                    <td class="actions">
                        <button @click="deletarUser(usuario.id)" class="remover">
                            Remover
                          </button>
                    </td>

                    <!--Modal De update-->

                    <div v-show="ShowUpdateModal" class="fixed top-0 right-0 left-0 z-0 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                           <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                              <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                 <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Atualização de registro de usuário
                                 </h3>
                                 <button  @click="ShowUpdateModal = false" type="button" class="close text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                 </button>
                              </div>
                              <form class="w-full max-w-md">
                                 <div class="md:flex md:items-center mb-6 py-2">
                                   <div class="md:w-1/3">
                                     <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                       nome 
                                     </label>
                                   </div>
                                   <div class="md:w-2/3">
                                     <input v-model="name" class="input bg-white-200" id="inline-full-name" type="text">
                                   </div>
                                 </div>
                                 <div class="md:flex md:items-center mb-6">
                                   <div class="md:w-1/3">
                                     <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                                       CPF
                                     </label>
                                   </div>
                                   <div class="md:w-2/3">
                                     <input v-model="cpf" class="input bg-white-200" id="inline-text" type="text">
                                   </div>
                                 </div>
                    
                                 <div class="md:flex md:items-center mb-6">
                                     <div class="md:w-1/3">
                                       <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                                         Email
                                       </label>
                                     </div>
                                     <div class="md:w-2/3">
                                       <input v-model="email" class="input bg-white-200" id="inline-text" type="text">
                                     </div>
                                   </div>
                    
                                   <div class="md:flex md:items-center mb-6">
                                     <div class="md:w-1/3">
                                       <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-text">
                                         Telefone
                                       </label>
                                     </div>
                                     <div class="md:w-2/3">
                                       <input v-model="telefone" class="input bg-white-200" id="inline-text" type="text">
                                     </div>
                                   </div>
                               </form>
                              <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                 <button @click="alterarUser(usuario.id)" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Atualizar Usuário</button>
                                 <button  @click="ShowUpdateModal = false" type="button" class="text-white bg-red-700 hover:bg-red-800 ocus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                              </div>
                           </div>
                        </div>
                     </div>
                </tr>


                <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" @click="ShowModal = true">
                    Adicionar Usuario
                    </button>
                    <AddModal v-show="ShowModal" @close-modal="ShowModal = false"/>

            </tbody>
        </table>
        <button class="btn-blue">OLA</button>
      </div>
</template>
<script>
    import Add from './AddModal.vue'
    export default{
        name:'index',
        data(){
            return{
                ShowModal : false,
                ShowUpdateModal : false,
                selected : [],
                id:'',
                name:'',
                cpf:'',
                email:'',
                telefone:''
            }
        },          
        methods:{
            deletarUser(u){
                let id = u
                console.log(id)
                let confirmacao = confirm('Tem certeza que deseja remover o usuário')
                if(!confirmacao) {
                  return false;
                }
                this.$store.dispatch('user/deleteUser',id).then(res=>{
                    console.log('Usuário excluído com sucesso')
                })
            },
            getUser(u){
                this.selected = [u.id,u.nome,u.cpf,u.email,u.telefone]
                this.id = this.selected[0]
                 this.name = this.selected[1]
                this.cpf = this.selected[2]
                this.email = this.selected[3]
                this.telefone = this.selected[4]
            },
            alterarUser(){
                let params = {
                    nome: this.name,
                    cpf:this.cpf,
                    email: this.email,
                    telefone:this.telefone,
                }
                this.$store.dispatch('user/updateUser',this.id,params)
        },
        }
    }
</script>