export default{
    getUser({commit},context){
        return this.$axios.get('VisualizarUsuario').then(res => {
            commit('STORE',res)
            console.log(res)
        })},
    createUser({ commit, dispatch },params) {
            commit('SetData',params)
            return this.$axios.post('Usuario',params)
        },
    deleteUser({commit,dispatch},id){
            return this.$axios.delete('excluirUsuario/'+id)
        },
    updateUser({commit, dispatch}, id,param){
            return this.$axios.put('AlterarUser/'+id,param).then(res=>{
                console.log(res)
            }).catch(error=>{{usuario}})
        }
}