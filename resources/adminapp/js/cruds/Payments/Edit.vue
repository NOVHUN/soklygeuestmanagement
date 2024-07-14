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
                <strong>{{ $t('cruds.payment.title_singular') }}</strong>
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
                      $t('cruds.payment.fields.booking')
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
                      'has-items': entry.amount,
                      'is-focused': activeField == 'amount'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.payment.fields.amount')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.amount"
                      @input="updateAmount"
                      @focus="focusField('amount')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.payment_date,
                      'is-focused': activeField == 'payment_date'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.payment.fields.payment_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      :value="entry.payment_date"
                      @input="updatePaymentDate"
                      @focus="focusField('payment_date')"
                      @blur="clearFocus"
                      required
                    >
                    </datetime-picker>
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.payment.fields.receipt_image')
                    }}</label>
                    <attachment
                      :route="getRoute('payments')"
                      :collection-name="'payment_receipt_image'"
                      :media="entry.receipt_image"
                      :model-id="$route.params.id"
                      :max-file-size="20"
                      @file-uploaded="insertReceiptImageFile"
                      @file-removed="removeReceiptImageFile"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.payment.fields.status') }}</label>
                    <v-radio
                      :value="entry.status"
                      :options="lists.status"
                      @change="updateStatus"
                    >
                    </v-radio>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.payment.fields.payment_type') }}</label>
                    <v-radio
                      :value="entry.payment_type"
                      :options="lists.payment_type"
                      @change="updatePaymentType"
                    >
                    </v-radio>
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.payment.fields.payment_method')
                    }}</label>
                    <v-radio
                      :value="entry.payment_method"
                      :options="lists.payment_method"
                      @change="updatePaymentMethod"
                    >
                    </v-radio>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.processed_by.length !== 0,
                      'is-focused': activeField == 'processed_by'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.payment.fields.processed_by')
                    }}</label>
                    <v-select
                      name="processed_by"
                      label="email"
                      :key="'processed_by-field'"
                      :value="entry.processed_by"
                      :options="lists.processed_by"
                      :closeOnSelect="false"
                      multiple
                      @input="updateProcessedBy"
                      @search.focus="focusField('processed_by')"
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
    ...mapGetters('PaymentsSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('PaymentsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setBooking',
      'setAmount',
      'setPaymentDate',
      'insertReceiptImageFile',
      'removeReceiptImageFile',
      'setStatus',
      'setPaymentType',
      'setPaymentMethod',
      'setProcessedBy'
    ]),
    updateBooking(value) {
      this.setBooking(value)
    },
    updateAmount(e) {
      this.setAmount(e.target.value)
    },
    updatePaymentDate(e) {
      this.setPaymentDate(e.target.value)
    },
    updateStatus(value) {
      this.setStatus(value)
    },
    updatePaymentType(value) {
      this.setPaymentType(value)
    },
    updatePaymentMethod(value) {
      this.setPaymentMethod(value)
    },
    updateProcessedBy(value) {
      this.setProcessedBy(value)
    },
    getRoute(name) {
      return `${axios.defaults.baseURL}${name}/media`
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'payments.index' })
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
