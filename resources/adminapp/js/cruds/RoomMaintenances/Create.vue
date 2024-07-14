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
                <strong>{{
                  $t('cruds.roomMaintenance.title_singular')
                }}</strong>
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
                      'has-items': entry.room.length !== 0,
                      'is-focused': activeField == 'room'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.roomMaintenance.fields.room')
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
                      'has-items': entry.room_name,
                      'is-focused': activeField == 'room_name'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.roomMaintenance.fields.room_name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.room_name"
                      @input="updateRoomName"
                      @focus="focusField('room_name')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.start_date,
                      'is-focused': activeField == 'start_date'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.roomMaintenance.fields.start_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.start_date"
                      @input="updateStartDate"
                      @focus="focusField('start_date')"
                      @blur="clearFocus"
                      required
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.end_date,
                      'is-focused': activeField == 'end_date'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.roomMaintenance.fields.end_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      picker="date"
                      :value="entry.end_date"
                      @input="updateEndDate"
                      @focus="focusField('end_date')"
                      @blur="clearFocus"
                    >
                    </datetime-picker>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.description,
                      'is-focused': activeField == 'description'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.roomMaintenance.fields.description')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.description"
                      @input="updateDescription"
                      @focus="focusField('description')"
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
    ...mapGetters('RoomMaintenancesSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('RoomMaintenancesSingle', [
      'storeData',
      'resetState',
      'setRoom',
      'setRoomName',
      'setStartDate',
      'setEndDate',
      'setDescription',
      'fetchCreateData'
    ]),
    updateRoom(value) {
      this.setRoom(value)
    },
    updateRoomName(e) {
      this.setRoomName(e.target.value)
    },
    updateStartDate(e) {
      this.setStartDate(e.target.value)
    },
    updateEndDate(e) {
      this.setEndDate(e.target.value)
    },
    updateDescription(e) {
      this.setDescription(e.target.value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'room_maintenances.index' })
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
