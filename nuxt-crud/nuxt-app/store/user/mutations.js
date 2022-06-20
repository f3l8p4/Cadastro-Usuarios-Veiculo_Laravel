export default{
    STORE(state,payload){
        state.usuario = payload
    },
    setData(state, payload) {
        Object.keys(payload).forEach(k => {
          state[k] = payload[k];
        })
      },
      changeData(state,payload){
        
      }
}