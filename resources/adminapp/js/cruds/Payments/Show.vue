<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">remove_red_eye</i>
            </div>
            <h4 class="card-title">
              {{ $t('global.view') }}
              <strong>{{ $t('cruds.payment.title_singular') }}</strong>
            </h4>
          </div>
          <div class="card-body">
            <back-button></back-button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <div class="table">
                    <tbody>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.payment.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.payment.fields.booking') }}
                        </td>
                        <td>
                          <datatable-list
                            :row="entry"
                            field="booking.phone_number"
                          >
                          </datatable-list>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.payment.fields.amount') }}
                        </td>
                        <td>
                          {{ entry.amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.payment.fields.payment_date') }}
                        </td>
                        <td>
                          {{ entry.payment_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.payment.fields.receipt_image') }}
                        </td>
                        <td>
                          <datatable-attachments
                            :row="entry"
                            :field="'receipt_image'"
                          >
                          </datatable-attachments>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.payment.fields.status') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="status">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.payment.fields.payment_type') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="payment_type">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.payment.fields.payment_method') }}
                        </td>
                        <td>
                          <datatable-enum :row="entry" field="payment_method">
                          </datatable-enum>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.payment.fields.processed_by') }}
                        </td>
                        <td>
                          <datatable-list
                            :row="entry"
                            field="processed_by.email"
                          >
                          </datatable-list>
                        </td>
                      </tr>
                    </tbody>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import DatatableList from '@components/Datatables/DatatableList'
import DatatableAttachments from '@components/Datatables/DatatableAttachments'
import DatatableEnum from '@components/Datatables/DatatableEnum'

export default {
  components: {
    DatatableList,
    DatatableAttachments,
    DatatableEnum
  },
  data() {
    return {}
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('PaymentsSingle', ['entry'])
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchShowData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('PaymentsSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
