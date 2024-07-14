function initialState() {
    return {
      rooms: [],
      loading: false
    }
  }
  
  const route = 'rooms'
  
  const getters = {
    rooms: state => state.rooms,
    loading: state => state.loading
  }
  
  const actions = {
    fetchIndexData({ commit }) {
      commit('setLoading', true)
      axios.get(route).then(response => {
        commit('setRooms', response.data.data)
        commit('setLoading', false)
      })
    }
  }
  
  const mutations = {
    setRooms(state, rooms) {
      state.rooms = rooms
    },
    setLoading(state, loading) {
      state.loading = loading
    }
  }
  
  export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
  }
  