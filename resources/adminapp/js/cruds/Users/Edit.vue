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
                <strong>{{ $t('cruds.user.title_singular') }}</strong>
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
                      'has-items': entry.name,
                      'is-focused': activeField == 'name'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.user.fields.name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.name"
                      @input="updateName"
                      @focus="focusField('name')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.email,
                      'is-focused': activeField == 'email'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.user.fields.email')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.email"
                      @input="updateEmail"
                      @focus="focusField('email')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.password,
                      'is-focused': activeField == 'password'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.user.fields.password')
                    }}</label>
                    <input
                      class="form-control"
                      type="password"
                      :value="entry.password"
                      @input="updatePassword"
                      @focus="focusField('password')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.roles.length !== 0,
                      'is-focused': activeField == 'roles'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.user.fields.roles')
                    }}</label>
                    <v-select
                      name="roles"
                      label="title"
                      :key="'roles-field'"
                      :value="entry.roles"
                      :options="lists.roles"
                      :closeOnSelect="false"
                      multiple
                      @input="updateRoles"
                      @search.focus="focusField('roles')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.phone,
                      'is-focused': activeField == 'phone'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.user.fields.phone')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.phone"
                      @input="updatePhone"
                      @focus="focusField('phone')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.user.fields.national_id_image_url')
                    }}</label>
                    <attachment
                      :route="getRoute('users')"
                      :collection-name="'user_national_id_image_url'"
                      :media="entry.national_id_image_url"
                      :model-id="$route.params.id"
                      :max-file-size="20"
                      @file-uploaded="insertNationalIdImageUrlFile"
                      @file-removed="removeNationalIdImageUrlFile"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.user.fields.profile_image_url')
                    }}</label>
                    <attachment
                      :route="getRoute('users')"
                      :collection-name="'user_profile_image_url'"
                      :media="entry.profile_image_url"
                      :model-id="$route.params.id"
                      :max-file-size="20"
                      :component="'pictures'"
                      :accept="'image/*'"
                      @file-uploaded="insertProfileImageUrlFile"
                      @file-removed="removeProfileImageUrlFile"
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
    ...mapGetters('UsersSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('UsersSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setName',
      'setEmail',
      'setPassword',
      'setRoles',
      'setPhone',
      'insertNationalIdImageUrlFile',
      'removeNationalIdImageUrlFile',
      'insertProfileImageUrlFile',
      'removeProfileImageUrlFile'
    ]),
    updateName(e) {
      this.setName(e.target.value)
    },
    updateEmail(e) {
      this.setEmail(e.target.value)
    },
    updatePassword(e) {
      this.setPassword(e.target.value)
    },
    updateRoles(value) {
      this.setRoles(value)
    },
    updatePhone(e) {
      this.setPhone(e.target.value)
    },
    getRoute(name) {
      return `${axios.defaults.baseURL}${name}/media`
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'users.index' })
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
