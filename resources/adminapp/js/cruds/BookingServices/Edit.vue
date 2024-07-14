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
                <strong>{{ $t('cruds.bookingService.title_singular') }}</strong>
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
                      'has-items': entry.booking.length !== 0,
                      'is-focused': activeField == 'booking'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.bookingService.fields.booking')
                    }}</label>
                    <v-select
                      name="booking"
                      label="phone_number"
                      :key="'booking-field'"
                      :value="entry.booking"
                      :options="lists.booking"
                      :closeOnSelect="false"
                      multiple
                      @input="updateBooking"
                      @search.focus="focusField('booking')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.service_id !== null,
                      'is-focused': activeField == 'service'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.bookingService.fields.service')
                    }}</label>
                    <v-select
                      name="service"
                      label="name"
                      :key="'service-field'"
                      :value="entry.service_id"
                      :options="lists.service"
                      :reduce="entry => entry.id"
                      @input="updateService"
                      @search.focus="focusField('service')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.quantity,
                      'is-focused': activeField == 'quantity'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.bookingService.fields.quantity')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.quantity"
                      @input="updateQuantity"
                      @focus="focusField('quantity')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.price,
                      'is-focused': activeField == 'price'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.bookingService.fields.price')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.price"
                      @input="updatePrice"
                      @focus="focusField('price')"
                      @blur="clearFocus"
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
    ...mapGetters('BookingServicesSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('BookingServicesSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setBooking',
      'setService',
      'setQuantity',
      'setPrice'
    ]),
    updateBooking(value) {
      this.setBooking(value)
    },
    updateService(value) {
      this.setService(value)
    },
    updateQuantity(e) {
      this.setQuantity(e.target.value)
    },
    updatePrice(e) {
      this.setPrice(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'booking_services.index' })
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
