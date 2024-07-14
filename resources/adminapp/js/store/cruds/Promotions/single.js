function initialState() {
  return {
    entry: {
      id: null,
      code: '',
      discount_type: null,
      discount_value: '',
      start_date: '',
      end_date: '',
      status: 'active',
      image_url: [],
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      discount_type: [],
      status: []
    },
    loading: false
  }
}

const route = 'promotions'

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
  setCode({ commit }, value) {
    commit('setCode', value)
  },
  setDiscountType({ commit }, value) {
    commit('setDiscountType', value)
  },
  setDiscountValue({ commit }, value) {
    commit('setDiscountValue', value)
  },
  setStartDate({ commit }, value) {
    commit('setStartDate', value)
  },
  setEndDate({ commit }, value) {
    commit('setEndDate', value)
  },
  setStatus({ commit }, value) {
    commit('setStatus', value)
  },
  insertImageUrlFile({ commit }, file) {
    commit('insertImageUrlFile', file)
  },
  removeImageUrlFile({ commit }, file) {
    commit('removeImageUrlFile', file)
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
  setCode(state, value) {
    state.entry.code = value
  },
  setDiscountType(state, value) {
    state.entry.discount_type = value
  },
  setDiscountValue(state, value) {
    state.entry.discount_value = value
  },
  setStartDate(state, value) {
    state.entry.start_date = value
  },
  setEndDate(state, value) {
    state.entry.end_date = value
  },
  setStatus(state, value) {
    state.entry.status = value
  },
  insertImageUrlFile(state, file) {
    state.entry.image_url.push(file)
  },
  removeImageUrlFile(state, file) {
    state.entry.image_url = state.entry.image_url.filter(item => {
      return item.id !== file.id
    })
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
