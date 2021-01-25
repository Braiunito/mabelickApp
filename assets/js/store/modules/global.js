import axios from 'axios'

var state = ()=>({
  roles: ['ROLE_USER']
})

// getters
const getters = {
  getRoles(state){
    return state.roles;
  }
}

// actions
const actions = {
  async fetchRoles({ commit }){
    axios.post("/permission")
      .then( async response => await response.data )
      .then( data => {
        console.log(data);
        commit('setRoles', data);
      }).catch(error=>{
        let data = ['ROLE_USER'];
        console.error('Error retriving roles, a default role user will be set');
        commit('setRoles', data);
      });
  }
}

// mutations
const mutations = {
  setRoles(state, data) {
    state.roles = data;
    console.log(state.roles);
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}