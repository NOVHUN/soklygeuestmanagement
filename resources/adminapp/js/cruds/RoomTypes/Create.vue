<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.create') }}
                <strong>{{ $t('cruds.roomType.title_singular') }}</strong>
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
                      'has-items': entry.type,
                      'is-focused': activeField == 'type'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.roomType.fields.type')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.type"
                      @input="updateType"
                      @focus="focusField('type')"
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
                      $t('cruds.roomType.fields.description')
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
                    <label>{{ $t('cruds.roomType.fields.image_url') }}</label>
                    <attachment
                      :route="getRoute('room-types')"
                      :collection-name="'room_type_image_url'"
                      :media="entry.image_url"
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
    ...mapGetters('RoomTypesSingle', ['entry', 'loading'])
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('RoomTypesSingle', [
      'storeData',
      'resetState',
      'setType',
      'setDescription',
      'insertImageUrlFile',
      'removeImageUrlFile'
    ]),
    updateType(e) {
      this.setType(e.target.value)
    },
    updateDescription(e) {
      this.setDescription(e.target.value)
    },
    getRoute(name) {
      return `${axios.defaults.baseURL}${name}/media`
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'room_types.index' })
          this.$eventHub.$emit('create-success')
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
