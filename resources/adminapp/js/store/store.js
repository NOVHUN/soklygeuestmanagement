import Vue from 'vue'
import Vuex from 'vuex'

import Alert from './modules/alert'
import I18NStore from './modules/i18n'

import PermissionsIndex from './cruds/Permissions'
import PermissionsSingle from './cruds/Permissions/single'
import RolesIndex from './cruds/Roles'
import RolesSingle from './cruds/Roles/single'
import UsersIndex from './cruds/Users'
import UsersSingle from './cruds/Users/single'
import ExpenseCategoriesIndex from './cruds/ExpenseCategories'
import ExpenseCategoriesSingle from './cruds/ExpenseCategories/single'
import IncomeCategoriesIndex from './cruds/IncomeCategories'
import IncomeCategoriesSingle from './cruds/IncomeCategories/single'
import ExpensesIndex from './cruds/Expenses'
import ExpensesSingle from './cruds/Expenses/single'
import IncomesIndex from './cruds/Incomes'
import IncomesSingle from './cruds/Incomes/single'
import ExpenseReports from './cruds/ExpenseReports'
import ContentCategoriesIndex from './cruds/ContentCategories'
import ContentCategoriesSingle from './cruds/ContentCategories/single'
import ContentTagsIndex from './cruds/ContentTags'
import ContentTagsSingle from './cruds/ContentTags/single'
import ContentPagesIndex from './cruds/ContentPages'
import ContentPagesSingle from './cruds/ContentPages/single'
import RoomTypesIndex from './cruds/RoomTypes'
import RoomTypesSingle from './cruds/RoomTypes/single'
import RoomsIndex from './cruds/Rooms'
import RoomsSingle from './cruds/Rooms/single'
import RoomMaintenancesIndex from './cruds/RoomMaintenances'
import RoomMaintenancesSingle from './cruds/RoomMaintenances/single'
import ServiceTypesIndex from './cruds/ServiceTypes'
import ServiceTypesSingle from './cruds/ServiceTypes/single'
import ServicesIndex from './cruds/Services'
import ServicesSingle from './cruds/Services/single'
import PromotionsIndex from './cruds/Promotions'
import PromotionsSingle from './cruds/Promotions/single'
import BookingsIndex from './cruds/Bookings'
import BookingsSingle from './cruds/Bookings/single'
import BookingRoomsIndex from './cruds/BookingRooms'
import BookingRoomsSingle from './cruds/BookingRooms/single'
import BookingServicesIndex from './cruds/BookingServices'
import BookingServicesSingle from './cruds/BookingServices/single'
import PaymentsIndex from './cruds/Payments'
import PaymentsSingle from './cruds/Payments/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    Alert,
    I18NStore,
    PermissionsIndex,
    PermissionsSingle,
    RolesIndex,
    RolesSingle,
    UsersIndex,
    UsersSingle,
    ExpenseCategoriesIndex,
    ExpenseCategoriesSingle,
    IncomeCategoriesIndex,
    IncomeCategoriesSingle,
    ExpensesIndex,
    ExpensesSingle,
    IncomesIndex,
    IncomesSingle,
    ExpenseReports,
    ContentCategoriesIndex,
    ContentCategoriesSingle,
    ContentTagsIndex,
    ContentTagsSingle,
    ContentPagesIndex,
    ContentPagesSingle,
    RoomTypesIndex,
    RoomTypesSingle,
    RoomsIndex,
    RoomsSingle,
    RoomMaintenancesIndex,
    RoomMaintenancesSingle,
    ServiceTypesIndex,
    ServiceTypesSingle,
    ServicesIndex,
    ServicesSingle,
    PromotionsIndex,
    PromotionsSingle,
    BookingsIndex,
    BookingsSingle,
    BookingRoomsIndex,
    BookingRoomsSingle,
    BookingServicesIndex,
    BookingServicesSingle,
    PaymentsIndex,
    PaymentsSingle
  },
  strict: debug
})
