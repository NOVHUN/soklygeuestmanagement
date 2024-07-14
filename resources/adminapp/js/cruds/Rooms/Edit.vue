<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.edit') }}
                <strong>{{ $t('cruds.room.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.room_type_id !== null,
                      'is-focused': activeField == 'room_type'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.room.fields.room_type')
                    }}</label>
                    <v-select
                      name="room_type"
                      label="type"
                      :key="'room_type-field'"
                      :value="entry.room_type_id"
                      :options="lists.room_type"
                      :reduce="entry => entry.id"
                      @input="updateRoomType"
                      @search.focus="focusField('room_type')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.room_name,
                      'is-focused': activeField == 'room_name'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.room.fields.room_name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.room_name"
                      @input="updateRoomName"
                      @focus="focusField('room_name')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.price_per_night,
                      'is-focused': activeField == 'price_per_night'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.room.fields.price_per_night')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.price_per_night"
                      @input="updatePricePerNight"
                      @focus="focusField('price_per_night')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.max_people,
                      'is-focused': activeField == 'max_people'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.room.fields.max_people')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.max_people"
                      @input="updateMaxPeople"
                      @focus="focusField('max_people')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.description,
                      'is-focused': activeField == 'description'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.room.fields.description')
                    }}</label>
                    <textarea
                      class="form-control"
                      rows="5"
                      :value="entry.description"
                      @input="updateDescription"
                      @focus="focusField('description')"
                      @blur="clearFocus"
                    ></textarea>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.room.fields.image_url') }}</label>
                    <attachment
                      :route="getRoute('rooms')"
                      :collection-name="'room_image_url'"
                      :media="entry.image_url"
                      :model-id="$route.params.id"
                      :max-file-size="20"
                      :component="'pictures'"
                      :accept="'image/*'"
                      @file-uploaded="insertImageUrlFile"
                      @file-removed="removeImageUrlFile"
                      :max-files="1"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import Attachment from '@components/Attachments/Attachment'

export default {
  components: {
    Attachment
  },
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('RoomsSingle', ['entry', 'loading', 'lists'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchEditData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('RoomsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setRoomType',
      'setRoomName',
      'setPricePerNight',
      'setMaxPeople',
      'setDescription',
      'insertImageUrlFile',
      'removeImageUrlFile'
    ]),
    updateRoomType(value) {
      this.setRoomType(value)
    },
    updateRoomName(e) {
      this.setRoomName(e.target.value)
    },
    updatePricePerNight(e) {
      this.setPricePerNight(e.target.value)
    },
    updateMaxPeople(e) {
      this.setMaxPeople(e.target.value)
    },
    updateDescription(e) {
      this.setDescription(e.target.value)
    },
    getRoute(name) {
      return `${axios.defaults.baseURL}${name}/media`
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'rooms.index' })
          this.$eventHub.$emit('update-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
