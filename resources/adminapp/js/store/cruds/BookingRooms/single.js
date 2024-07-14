function initialState() {
  return {
    entry: {
      id: null,
      booking: [],
      room: [],
      check_in_date: '',
      check_out_date: '',
      actual_check_in_date: '',
      actual_check_out_date: '',
      price: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      booking: [],
      room: []
    },
    loading: false
  }
}

const route = 'booking-rooms'

const getters = {
  entry: state => state.entry,
  lists: state => state.lists,
  loading: state => state.loading
}

const actions = {
  storeData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      axios
        .post(route, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  updateData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      params.set('_method', 'PUT')
      axios
        .post(`${route}/${state.entry.id}`, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  setBooking({ commit }, value) {
    commit('setBooking', value)
  },
  setRoom({ commit }, value) {
    commit('setRoom', value)
  },
  setCheckInDate({ commit }, value) {
    commit('setCheckInDate', value)
  },
  setCheckOutDate({ commit }, value) {
    commit('setCheckOutDate', value)
  },
  setActualCheckInDate({ commit }, value) {
    commit('setActualCheckInDate', value)
  },
  setActualCheckOutDate({ commit }, value) {
    commit('setActualCheckOutDate', value)
  },
  setPrice({ commit }, value) {
    commit('setPrice', value)
  },
  setCreatedAt({ commit }, value) {
    commit('setCreatedAt', value)
  },
  setUpdatedAt({ commit }, value) {
    commit('setUpdatedAt', value)
  },
  setDeletedAt({ commit }, value) {
    commit('setDeletedAt', value)
  },
  fetchCreateData({ commit }) {
    axios.get(`${route}/create`).then(response => {
      commit('setLists', response.data.meta)
    })
  },
  fetchEditData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}/edit`).then(response => {
      commit('setEntry', response.data.data)
      commit('setLists', response.data.meta)
    })
  },
  fetchShowData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}`).then(response => {
      commit('setEntry', response.data.data)
    })
  },
  resetState({ commit }) {
    commit('resetState')
  }
}

const mutations = {
  setEntry(state, entry) {
    state.entry = entry
  },
  setBooking(state, value) {
    state.entry.booking = value
  },
  setRoom(state, value) {
    state.entry.room = value
  },
  setCheckInDate(state, value) {
    state.entry.check_in_date = value
  },
  setCheckOutDate(state, value) {
    state.entry.check_out_date = value
  },
  setActualCheckInDate(state, value) {
    state.entry.actual_check_in_date = value
  },
  setActualCheckOutDate(state, value) {
    state.entry.actual_check_out_date = value
  },
  setPrice(state, value) {
    state.entry.price = value
  },
  setCreatedAt(state, value) {
    state.entry.created_at = value
  },
  setUpdatedAt(state, value) {
    state.entry.updated_at = value
  },
  setDeletedAt(state, value) {
    state.entry.deleted_at = value
  },
  setLists(state, lists) {
    state.lists = lists
  },
  setLoading(state, loading) {
    state.loading = loading
  },
  resetState(state) {
    state = Object.assign(state, initialState())
  }
}

export default {
  namespaced: true,
  state: initialState,
  getters,
  actions,
  mutations
}
