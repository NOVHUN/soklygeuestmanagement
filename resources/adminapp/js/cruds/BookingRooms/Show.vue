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
              <strong>{{ $t('cruds.bookingRoom.title_singular') }}</strong>
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
                          {{ $t('cruds.bookingRoom.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.bookingRoom.fields.booking') }}
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
                          {{ $t('cruds.bookingRoom.fields.room') }}
                        </td>
                        <td>
                          <datatable-list :row="entry" field="room.description">
                          </datatable-list>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.bookingRoom.fields.check_in_date') }}
                        </td>
                        <td>
                          {{ entry.check_in_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.bookingRoom.fields.check_out_date') }}
                        </td>
                        <td>
                          {{ entry.check_out_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.bookingRoom.fields.actual_check_in_date')
                          }}
                        </td>
                        <td>
                          {{ entry.actual_check_in_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.bookingRoom.fields.actual_check_out_date')
                          }}
                        </td>
                        <td>
                          {{ entry.actual_check_out_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.bookingRoom.fields.price') }}
                        </td>
                        <td>
                          {{ entry.price }}
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

export default {
  components: {
    DatatableList
  },
  data() {
    return {}
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('BookingRoomsSingle', ['entry'])
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
    ...mapActions('BookingRoomsSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
