<template>
    <div v-show="ShowUpdateModal" class="fixed top-0 right-0 left-0 z-0 w-full md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
           <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                 <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Registro de usuário
                 </h3>
                 <button  @click="$emit('close-modal')" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
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
                     <input v-model="nome" class="bg-white-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text">
                   </div>
                 </div>
                 <div class="md:flex md:items-center mb-6">
                   <div class="md:w-1/3">
                     <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                       CPF
                     </label>
                   </div>
                   <div class="md:w-2/3">
                     <input v-model="cpf" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="password">
                   </div>
                 </div>
    
                 <div class="md:flex md:items-center mb-6">
                     <div class="md:w-1/3">
                       <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                         Email
                       </label>
                     </div>
                     <div class="md:w-2/3">
                       <input v-model="email" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="password">
                     </div>
                   </div>
    
                   <div class="md:flex md:items-center mb-6">
                     <div class="md:w-1/3">
                       <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                         Telefone
                       </label>
                     </div>
                     <div class="md:w-2/3">
                       <input v-model="telefone" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="password">
                     </div>
                   </div>
               </form>
              <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                 <button @click="Atualizar" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Atualizar Usuário</button>
                 <button  @click="$emit('close-modal')" type="button" class="text-white bg-red-700 hover:bg-red-800 ocus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
              </div>
           </div>
        </div>
     </div>
</template>
<script>
    export default{
        data(){
            return{
                form:{
                    nome : '',
                    cpf: '',
                    email:'',
                    telefone:''
                }
        }
        },
        methods: {
            Atualizar(id){
              console.log(this.id)
                let form = {
                    nome: this.form.nome,
                    cpf: this.form.cpf,
                    email: this.form.email,
                    telefone: this.form.telefone
                }
                this.$store.dispatch('user/updateUser',id).then(res=>{console.log(res)})
            }
        },
    }
</script>