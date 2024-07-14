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
                <strong>{{ $t('cruds.booking.title_singular') }}</strong>
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
                      'has-items': entry.user.length !== 0,
                      'is-focused': activeField == 'user'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.booking.fields.user')
                    }}</label>
                    <v-select
                      name="user"
                      label="phone"
                      :key="'user-field'"
                      :value="entry.user"
                      :options="lists.user"
                      :closeOnSelect="false"
                      multiple
                      @input="updateUser"
                      @search.focus="focusField('user')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.phone_number,
                      'is-focused': activeField == 'phone_number'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.booking.fields.phone_number')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.phone_number"
                      @input="updatePhoneNumber"
                      @focus="focusField('phone_number')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.customer_name,
                      'is-focused': activeField == 'customer_name'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.booking.fields.customer_name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.customer_name"
                      @input="updateCustomerName"
                      @focus="focusField('customer_name')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.total_price,
                      'is-focused': activeField == 'total_price'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.booking.fields.total_price')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.total_price"
                      @input="updateTotalPrice"
                      @focus="focusField('total_price')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.booking.fields.status')
                    }}</label>
                    <v-radio
                      :value="entry.status"
                      :options="lists.status"
                      @change="updateStatus"
                    >
                    </v-radio>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.promotion_id !== null,
                      'is-focused': activeField == 'promotion'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.booking.fields.promotion')
                    }}</label>
                    <v-select
                      name="promotion"
                      label="code"
                      :key="'promotion-field'"
                      :value="entry.promotion_id"
                      :options="lists.promotion"
                      :reduce="entry => entry.id"
                      @input="updatePromotion"
                      @search.focus="focusField('promotion')"
                      @search.blur="clearFocus"
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

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('BookingsSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('BookingsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setUser',
      'setPhoneNumber',
      'setCustomerName',
      'setTotalPrice',
      'setStatus',
      'setPromotion'
    ]),
    updateUser(value) {
      this.setUser(value)
    },
    updatePhoneNumber(e) {
      this.setPhoneNumber(e.target.value)
    },
    updateCustomerName(e) {
      this.setCustomerName(e.target.value)
    },
    updateTotalPrice(e) {
      this.setTotalPrice(e.target.value)
    },
    updateStatus(value) {
      this.setStatus(value)
    },
    updatePromotion(value) {
      this.setPromotion(value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'bookings.index' })
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
