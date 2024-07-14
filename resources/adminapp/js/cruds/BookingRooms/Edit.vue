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
                <strong>{{ $t('cruds.bookingRoom.title_singular') }}</strong>
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
                    <label class="bmd-label-floating required">{{
                      $t('cruds.bookingRoom.fields.booking')
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
                      'has-items': entry.room.length !== 0,
                      'is-focused': activeField == 'room'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.bookingRoom.fields.room')
                    }}</label>
                    <v-select
                      name="room"
                      label="description"
                      :key="'room-field'"
                      :value="entry.room"
                      :options="lists.room"
                      :closeOnSelect="false"
                      multiple
                      @input="updateRoom"
                      @search.focus="focusField('room')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.check_in_date,
                      'is-focused': activeField == 'check_in_date'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.bookingRoom.fields.check_in_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      :value="entry.check_in_date"
                      @input="updateCheckInDate"
                      @focus="focusField('check_in_date')"
                      @blur="clearFocus"
                      required
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.check_out_date,
                      'is-focused': activeField == 'check_out_date'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.bookingRoom.fields.check_out_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      :value="entry.check_out_date"
                      @input="updateCheckOutDate"
                      @focus="focusField('check_out_date')"
                      @blur="clearFocus"
                      required
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.actual_check_in_date,
                      'is-focused': activeField == 'actual_check_in_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.bookingRoom.fields.actual_check_in_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      :value="entry.actual_check_in_date"
                      @input="updateActualCheckInDate"
                      @focus="focusField('actual_check_in_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.actual_check_out_date,
                      'is-focused': activeField == 'actual_check_out_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.bookingRoom.fields.actual_check_out_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      :value="entry.actual_check_out_date"
                      @input="updateActualCheckOutDate"
                      @focus="focusField('actual_check_out_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.price,
                      'is-focused': activeField == 'price'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.bookingRoom.fields.price')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.price"
                      @input="updatePrice"
                      @focus="focusField('price')"
                      @blur="clearFocus"
                      required
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
    ...mapGetters('BookingRoomsSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('BookingRoomsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setBooking',
      'setRoom',
      'setCheckInDate',
      'setCheckOutDate',
      'setActualCheckInDate',
      'setActualCheckOutDate',
      'setPrice'
    ]),
    updateBooking(value) {
      this.setBooking(value)
    },
    updateRoom(value) {
      this.setRoom(value)
    },
    updateCheckInDate(e) {
      this.setCheckInDate(e.target.value)
    },
    updateCheckOutDate(e) {
      this.setCheckOutDate(e.target.value)
    },
    updateActualCheckInDate(e) {
      this.setActualCheckInDate(e.target.value)
    },
    updateActualCheckOutDate(e) {
      this.setActualCheckOutDate(e.target.value)
    },
    updatePrice(e) {
      this.setPrice(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'booking_rooms.index' })
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
