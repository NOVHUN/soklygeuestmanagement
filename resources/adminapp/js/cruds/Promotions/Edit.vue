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
                <strong>{{ $t('cruds.promotion.title_singular') }}</strong>
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
                      'has-items': entry.code,
                      'is-focused': activeField == 'code'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.promotion.fields.code')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.code"
                      @input="updateCode"
                      @focus="focusField('code')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.promotion.fields.discount_type')
                    }}</label>
                    <v-radio
                      :value="entry.discount_type"
                      :options="lists.discount_type"
                      @change="updateDiscountType"
                    >
                    </v-radio>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.discount_value,
                      'is-focused': activeField == 'discount_value'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.promotion.fields.discount_value')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.discount_value"
                      @input="updateDiscountValue"
                      @focus="focusField('discount_value')"
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
                      $t('cruds.promotion.fields.start_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
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
                    <label class="bmd-label-floating required">{{
                      $t('cruds.promotion.fields.end_date')
                    }}</label>
                    <datetime-picker
                      class="form-control"
                      type="text"
                      :value="entry.end_date"
                      @input="updateEndDate"
                      @focus="focusField('end_date')"
                      @blur="clearFocus"
                      required
                    >
                    </datetime-picker>
                  </div>
                  <div class="form-group">
                    <label class="required">{{
                      $t('cruds.promotion.fields.status')
                    }}</label>
                    <v-radio
                      :value="entry.status"
                      :options="lists.status"
                      @change="updateStatus"
                    >
                    </v-radio>
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.promotion.fields.image_url') }}</label>
                    <attachment
                      :route="getRoute('promotions')"
                      :collection-name="'promotion_image_url'"
                      :media="entry.image_url"
                      :model-id="$route.params.id"
                      :max-file-size="20"
                      :component="'pictures'"
                      :accept="'image/*'"
                      @file-uploaded="insertImageUrlFile"
                      @file-removed="removeImageUrlFile"
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
    ...mapGetters('PromotionsSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('PromotionsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setCode',
      'setDiscountType',
      'setDiscountValue',
      'setStartDate',
      'setEndDate',
      'setStatus',
      'insertImageUrlFile',
      'removeImageUrlFile'
    ]),
    updateCode(e) {
      this.setCode(e.target.value)
    },
    updateDiscountType(value) {
      this.setDiscountType(value)
    },
    updateDiscountValue(e) {
      this.setDiscountValue(e.target.value)
    },
    updateStartDate(e) {
      this.setStartDate(e.target.value)
    },
    updateEndDate(e) {
      this.setEndDate(e.target.value)
    },
    updateStatus(value) {
      this.setStatus(value)
    },
    getRoute(name) {
      return `${axios.defaults.baseURL}${name}/media`
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'promotions.index' })
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
