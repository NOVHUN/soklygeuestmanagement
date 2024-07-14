import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const View = { template: '<router-view></router-view>' }

const routes = [
  {
    path: '/',
    component: () => import('@pages/Layout/DashboardLayout.vue'),
    redirect: 'dashboard',
    children: [
      {
        path: 'dashboard',
        name: 'dashboard',
        component: () => import('@pages/Dashboard.vue'),
        meta: { title: 'global.dashboard' }
      },
      {
        path: 'available-rooms',
        name: 'available-rooms',
        component: () => import('@pages/AvailableRooms.vue'),
        meta: { title: 'Available Rooms' }
      },
      {
        path: 'booking-management',
        name: 'booking_management',
        component: View,
        redirect: { name: 'promotions.index' },
        children: [
          {
            path: 'promotions',
            name: 'promotions.index',
            component: () => import('@cruds/Promotions/Index.vue'),
            meta: { title: 'cruds.promotion.title' }
          },
          {
            path: 'promotions/create',
            name: 'promotions.create',
            component: () => import('@cruds/Promotions/Create.vue'),
            meta: { title: 'cruds.promotion.title' }
          },
          {
            path: 'promotions/:id',
            name: 'promotions.show',
            component: () => import('@cruds/Promotions/Show.vue'),
            meta: { title: 'cruds.promotion.title' }
          },
          {
            path: 'promotions/:id/edit',
            name: 'promotions.edit',
            component: () => import('@cruds/Promotions/Edit.vue'),
            meta: { title: 'cruds.promotion.title' }
          },
          {
            path: 'bookings',
            name: 'bookings.index',
            component: () => import('@cruds/Bookings/Index.vue'),
            meta: { title: 'cruds.booking.title' }
          },
          {
            path: 'bookings/create',
            name: 'bookings.create',
            component: () => import('@cruds/Bookings/Create.vue'),
            meta: { title: 'cruds.booking.title' }
          },
          {
            path: 'bookings/:id',
            name: 'bookings.show',
            component: () => import('@cruds/Bookings/Show.vue'),
            meta: { title: 'cruds.booking.title' }
          },
          {
            path: 'bookings/:id/edit',
            name: 'bookings.edit',
            component: () => import('@cruds/Bookings/Edit.vue'),
            meta: { title: 'cruds.booking.title' }
          },
          {
            path: 'booking-rooms',
            name: 'booking_rooms.index',
            component: () => import('@cruds/BookingRooms/Index.vue'),
            meta: { title: 'cruds.bookingRoom.title' }
          },
          {
            path: 'booking-rooms/create',
            name: 'booking_rooms.create',
            component: () => import('@cruds/BookingRooms/Create.vue'),
            meta: { title: 'cruds.bookingRoom.title' }
          },
          {
            path: 'booking-rooms/:id',
            name: 'booking_rooms.show',
            component: () => import('@cruds/BookingRooms/Show.vue'),
            meta: { title: 'cruds.bookingRoom.title' }
          },
          {
            path: 'booking-rooms/:id/edit',
            name: 'booking_rooms.edit',
            component: () => import('@cruds/BookingRooms/Edit.vue'),
            meta: { title: 'cruds.bookingRoom.title' }
          },
          {
            path: 'booking-services',
            name: 'booking_services.index',
            component: () => import('@cruds/BookingServices/Index.vue'),
            meta: { title: 'cruds.bookingService.title' }
          },
          {
            path: 'booking-services/create',
            name: 'booking_services.create',
            component: () => import('@cruds/BookingServices/Create.vue'),
            meta: { title: 'cruds.bookingService.title' }
          },
          {
            path: 'booking-services/:id',
            name: 'booking_services.show',
            component: () => import('@cruds/BookingServices/Show.vue'),
            meta: { title: 'cruds.bookingService.title' }
          },
          {
            path: 'booking-services/:id/edit',
            name: 'booking_services.edit',
            component: () => import('@cruds/BookingServices/Edit.vue'),
            meta: { title: 'cruds.bookingService.title' }
          },
          {
            path: 'payments',
            name: 'payments.index',
            component: () => import('@cruds/Payments/Index.vue'),
            meta: { title: 'cruds.payment.title' }
          },
          {
            path: 'payments/create',
            name: 'payments.create',
            component: () => import('@cruds/Payments/Create.vue'),
            meta: { title: 'cruds.payment.title' }
          },
          {
            path: 'payments/:id',
            name: 'payments.show',
            component: () => import('@cruds/Payments/Show.vue'),
            meta: { title: 'cruds.payment.title' }
          },
          {
            path: 'payments/:id/edit',
            name: 'payments.edit',
            component: () => import('@cruds/Payments/Edit.vue'),
            meta: { title: 'cruds.payment.title' }
          }
        ]
      },
      {
        path: 'room-management',
        name: 'room_management',
        component: View,
        redirect: { name: 'room_types.index' },
        children: [
          {
            path: 'room-types',
            name: 'room_types.index',
            component: () => import('@cruds/RoomTypes/Index.vue'),
            meta: { title: 'cruds.roomType.title' }
          },
          {
            path: 'room-types/create',
            name: 'room_types.create',
            component: () => import('@cruds/RoomTypes/Create.vue'),
            meta: { title: 'cruds.roomType.title' }
          },
          {
            path: 'room-types/:id',
            name: 'room_types.show',
            component: () => import('@cruds/RoomTypes/Show.vue'),
            meta: { title: 'cruds.roomType.title' }
          },
          {
            path: 'room-types/:id/edit',
            name: 'room_types.edit',
            component: () => import('@cruds/RoomTypes/Edit.vue'),
            meta: { title: 'cruds.roomType.title' }
          },
          {
            path: 'rooms',
            name: 'rooms.index',
            component: () => import('@cruds/Rooms/Index.vue'),
            meta: { title: 'cruds.room.title' }
          },
          {
            path: 'rooms/create',
            name: 'rooms.create',
            component: () => import('@cruds/Rooms/Create.vue'),
            meta: { title: 'cruds.room.title' }
          },
          {
            path: 'rooms/:id',
            name: 'rooms.show',
            component: () => import('@cruds/Rooms/Show.vue'),
            meta: { title: 'cruds.room.title' }
          },
          {
            path: 'rooms/:id/edit',
            name: 'rooms.edit',
            component: () => import('@cruds/Rooms/Edit.vue'),
            meta: { title: 'cruds.room.title' }
          },
          {
            path: 'room-maintenances',
            name: 'room_maintenances.index',
            component: () => import('@cruds/RoomMaintenances/Index.vue'),
            meta: { title: 'cruds.roomMaintenance.title' }
          },
          {
            path: 'room-maintenances/create',
            name: 'room_maintenances.create',
            component: () => import('@cruds/RoomMaintenances/Create.vue'),
            meta: { title: 'cruds.roomMaintenance.title' }
          },
          {
            path: 'room-maintenances/:id',
            name: 'room_maintenances.show',
            component: () => import('@cruds/RoomMaintenances/Show.vue'),
            meta: { title: 'cruds.roomMaintenance.title' }
          },
          {
            path: 'room-maintenances/:id/edit',
            name: 'room_maintenances.edit',
            component: () => import('@cruds/RoomMaintenances/Edit.vue'),
            meta: { title: 'cruds.roomMaintenance.title' }
          }
        ]
      },
      {
        path: 'service-management',
        name: 'service_management',
        component: View,
        redirect: { name: 'service_types.index' },
        children: [
          {
            path: 'service-types',
            name: 'service_types.index',
            component: () => import('@cruds/ServiceTypes/Index.vue'),
            meta: { title: 'cruds.serviceType.title' }
          },
          {
            path: 'service-types/create',
            name: 'service_types.create',
            component: () => import('@cruds/ServiceTypes/Create.vue'),
            meta: { title: 'cruds.serviceType.title' }
          },
          {
            path: 'service-types/:id',
            name: 'service_types.show',
            component: () => import('@cruds/ServiceTypes/Show.vue'),
            meta: { title: 'cruds.serviceType.title' }
          },
          {
            path: 'service-types/:id/edit',
            name: 'service_types.edit',
            component: () => import('@cruds/ServiceTypes/Edit.vue'),
            meta: { title: 'cruds.serviceType.title' }
          },
          {
            path: 'services',
            name: 'services.index',
            component: () => import('@cruds/Services/Index.vue'),
            meta: { title: 'cruds.service.title' }
          },
          {
            path: 'services/create',
            name: 'services.create',
            component: () => import('@cruds/Services/Create.vue'),
            meta: { title: 'cruds.service.title' }
          },
          {
            path: 'services/:id',
            name: 'services.show',
            component: () => import('@cruds/Services/Show.vue'),
            meta: { title: 'cruds.service.title' }
          },
          {
            path: 'services/:id/edit',
            name: 'services.edit',
            component: () => import('@cruds/Services/Edit.vue'),
            meta: { title: 'cruds.service.title' }
          }
        ]
      },
      {
        path: 'expense-management',
        name: 'expense_management',
        component: View,
        redirect: { name: 'expense_categories.index' },
        children: [
          {
            path: 'expense-categories',
            name: 'expense_categories.index',
            component: () => import('@cruds/ExpenseCategories/Index.vue'),
            meta: { title: 'cruds.expenseCategory.title' }
          },
          {
            path: 'expense-categories/create',
            name: 'expense_categories.create',
            component: () => import('@cruds/ExpenseCategories/Create.vue'),
            meta: { title: 'cruds.expenseCategory.title' }
          },
          {
            path: 'expense-categories/:id',
            name: 'expense_categories.show',
            component: () => import('@cruds/ExpenseCategories/Show.vue'),
            meta: { title: 'cruds.expenseCategory.title' }
          },
          {
            path: 'expense-categories/:id/edit',
            name: 'expense_categories.edit',
            component: () => import('@cruds/ExpenseCategories/Edit.vue'),
            meta: { title: 'cruds.expenseCategory.title' }
          },
          {
            path: 'income-categories',
            name: 'income_categories.index',
            component: () => import('@cruds/IncomeCategories/Index.vue'),
            meta: { title: 'cruds.incomeCategory.title' }
          },
          {
            path: 'income-categories/create',
            name: 'income_categories.create',
            component: () => import('@cruds/IncomeCategories/Create.vue'),
            meta: { title: 'cruds.incomeCategory.title' }
          },
          {
            path: 'income-categories/:id',
            name: 'income_categories.show',
            component: () => import('@cruds/IncomeCategories/Show.vue'),
            meta: { title: 'cruds.incomeCategory.title' }
          },
          {
            path: 'income-categories/:id/edit',
            name: 'income_categories.edit',
            component: () => import('@cruds/IncomeCategories/Edit.vue'),
            meta: { title: 'cruds.incomeCategory.title' }
          },
          {
            path: 'expenses',
            name: 'expenses.index',
            component: () => import('@cruds/Expenses/Index.vue'),
            meta: { title: 'cruds.expense.title' }
          },
          {
            path: 'expenses/create',
            name: 'expenses.create',
            component: () => import('@cruds/Expenses/Create.vue'),
            meta: { title: 'cruds.expense.title' }
          },
          {
            path: 'expenses/:id',
            name: 'expenses.show',
            component: () => import('@cruds/Expenses/Show.vue'),
            meta: { title: 'cruds.expense.title' }
          },
          {
            path: 'expenses/:id/edit',
            name: 'expenses.edit',
            component: () => import('@cruds/Expenses/Edit.vue'),
            meta: { title: 'cruds.expense.title' }
          },
          {
            path: 'incomes',
            name: 'incomes.index',
            component: () => import('@cruds/Incomes/Index.vue'),
            meta: { title: 'cruds.income.title' }
          },
          {
            path: 'incomes/create',
            name: 'incomes.create',
            component: () => import('@cruds/Incomes/Create.vue'),
            meta: { title: 'cruds.income.title' }
          },
          {
            path: 'incomes/:id',
            name: 'incomes.show',
            component: () => import('@cruds/Incomes/Show.vue'),
            meta: { title: 'cruds.income.title' }
          },
          {
            path: 'incomes/:id/edit',
            name: 'incomes.edit',
            component: () => import('@cruds/Incomes/Edit.vue'),
            meta: { title: 'cruds.income.title' }
          },
          {
            path: 'expense-reports',
            name: 'expense_reports.index',
            component: () => import('@cruds/ExpenseReports/Index.vue'),
            meta: { title: 'cruds.expenseReport.title' }
          }
        ]
      },
      {
        path: 'content-management',
        name: 'content_management',
        component: View,
        redirect: { name: 'content_categories.index' },
        children: [
          {
            path: 'content-categories',
            name: 'content_categories.index',
            component: () => import('@cruds/ContentCategories/Index.vue'),
            meta: { title: 'cruds.contentCategory.title' }
          },
          {
            path: 'content-categories/create',
            name: 'content_categories.create',
            component: () => import('@cruds/ContentCategories/Create.vue'),
            meta: { title: 'cruds.contentCategory.title' }
          },
          {
            path: 'content-categories/:id',
            name: 'content_categories.show',
            component: () => import('@cruds/ContentCategories/Show.vue'),
            meta: { title: 'cruds.contentCategory.title' }
          },
          {
            path: 'content-categories/:id/edit',
            name: 'content_categories.edit',
            component: () => import('@cruds/ContentCategories/Edit.vue'),
            meta: { title: 'cruds.contentCategory.title' }
          },
          {
            path: 'content-tags',
            name: 'content_tags.index',
            component: () => import('@cruds/ContentTags/Index.vue'),
            meta: { title: 'cruds.contentTag.title' }
          },
          {
            path: 'content-tags/create',
            name: 'content_tags.create',
            component: () => import('@cruds/ContentTags/Create.vue'),
            meta: { title: 'cruds.contentTag.title' }
          },
          {
            path: 'content-tags/:id',
            name: 'content_tags.show',
            component: () => import('@cruds/ContentTags/Show.vue'),
            meta: { title: 'cruds.contentTag.title' }
          },
          {
            path: 'content-tags/:id/edit',
            name: 'content_tags.edit',
            component: () => import('@cruds/ContentTags/Edit.vue'),
            meta: { title: 'cruds.contentTag.title' }
          },
          {
            path: 'content-pages',
            name: 'content_pages.index',
            component: () => import('@cruds/ContentPages/Index.vue'),
            meta: { title: 'cruds.contentPage.title' }
          },
          {
            path: 'content-pages/create',
            name: 'content_pages.create',
            component: () => import('@cruds/ContentPages/Create.vue'),
            meta: { title: 'cruds.contentPage.title' }
          },
          {
            path: 'content-pages/:id',
            name: 'content_pages.show',
            component: () => import('@cruds/ContentPages/Show.vue'),
            meta: { title: 'cruds.contentPage.title' }
          },
          {
            path: 'content-pages/:id/edit',
            name: 'content_pages.edit',
            component: () => import('@cruds/ContentPages/Edit.vue'),
            meta: { title: 'cruds.contentPage.title' }
          }
        ]
      },
      {
        path: 'user-management',
        name: 'user_management',
        component: View,
        redirect: { name: 'permissions.index' },
        children: [
          {
            path: 'permissions',
            name: 'permissions.index',
            component: () => import('@cruds/Permissions/Index.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/create',
            name: 'permissions.create',
            component: () => import('@cruds/Permissions/Create.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id',
            name: 'permissions.show',
            component: () => import('@cruds/Permissions/Show.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id/edit',
            name: 'permissions.edit',
            component: () => import('@cruds/Permissions/Edit.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'roles',
            name: 'roles.index',
            component: () => import('@cruds/Roles/Index.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/create',
            name: 'roles.create',
            component: () => import('@cruds/Roles/Create.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id',
            name: 'roles.show',
            component: () => import('@cruds/Roles/Show.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id/edit',
            name: 'roles.edit',
            component: () => import('@cruds/Roles/Edit.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'users',
            name: 'users.index',
            component: () => import('@cruds/Users/Index.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/create',
            name: 'users.create',
            component: () => import('@cruds/Users/Create.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id',
            name: 'users.show',
            component: () => import('@cruds/Users/Show.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id/edit',
            name: 'users.edit',
            component: () => import('@cruds/Users/Edit.vue'),
            meta: { title: 'cruds.user.title' }
          }
        ]
      }
    ]
  }
]

export default new VueRouter({
  mode: 'history',
  base: '/admin',
  routes
})
