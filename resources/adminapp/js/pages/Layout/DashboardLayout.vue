<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <event-hub></event-hub>
    <side-bar :sidebarLinks="sidebarLinks">
      <mobile-menu slot="content"></mobile-menu>
    </side-bar>

    <div class="main-panel">
      <top-navbar></top-navbar>
      <div class="content">
        <dashboard-content></dashboard-content>
      </div>
    </div>
  </div>
</template>

<script>
import DashboardContent from './Content.vue'
import TopNavbar from './TopNavbar.vue'
import MobileMenu from './MobileMenu.vue'

export default {
  components: {
    DashboardContent,
    TopNavbar,
    MobileMenu
  },
  data() {
    return {
      sidebarLinks: [
        {
          title: 'global.dashboard',
          icon: 'dashboard',
          path: { name: 'dashboard' }
        },
        {
          title: 'cruds.bookingManagement.title',
          icon: 'account_balance_wallet',
          path: { name: 'booking_management' },
          gate: 'booking_management_access',
          children: [
            {
              title: 'cruds.promotion.title',
              icon: 'table_view',
              path: { name: 'promotions.index' },
              gate: 'promotion_access'
            },
            {
              title: 'cruds.booking.title',
              icon: 'table_view',
              path: { name: 'bookings.index' },
              gate: 'booking_access'
            },
            {
              title: 'cruds.bookingRoom.title',
              icon: 'table_view',
              path: { name: 'booking_rooms.index' },
              gate: 'booking_room_access'
            },
            {
              title: 'cruds.bookingService.title',
              icon: 'table_view',
              path: { name: 'booking_services.index' },
              gate: 'booking_service_access'
            },
            {
              title: 'cruds.payment.title',
              icon: 'table_view',
              path: { name: 'payments.index' },
              gate: 'payment_access'
            }
          ]
        },
        {
          title: 'cruds.roomManagement.title',
          icon: 'table_view',
          path: { name: 'room_management' },
          gate: 'room_management_access',
          children: [
            {
              title: 'cruds.roomType.title',
              icon: 'table_view',
              path: { name: 'room_types.index' },
              gate: 'room_type_access'
            },
            {
              title: 'cruds.room.title',
              icon: 'table_view',
              path: { name: 'rooms.index' },
              gate: 'room_access'
            },
            {
              title: 'cruds.roomMaintenance.title',
              icon: 'table_view',
              path: { name: 'room_maintenances.index' },
              gate: 'room_maintenance_access'
            }
          ]
        },
        {
          title: 'cruds.serviceManagement.title',
          icon: 'table_view',
          path: { name: 'service_management' },
          gate: 'service_management_access',
          children: [
            {
              title: 'cruds.serviceType.title',
              icon: 'table_view',
              path: { name: 'service_types.index' },
              gate: 'service_type_access'
            },
            {
              title: 'cruds.service.title',
              icon: 'table_view',
              path: { name: 'services.index' },
              gate: 'service_access'
            }
          ]
        },
        {
          title: 'cruds.expenseManagement.title',
          icon: 'account_balance_wallet',
          path: { name: 'expense_management' },
          gate: 'expense_management_access',
          children: [
            {
              title: 'cruds.expenseCategory.title',
              icon: 'table_view',
              path: { name: 'expense_categories.index' },
              gate: 'expense_category_access'
            },
            {
              title: 'cruds.incomeCategory.title',
              icon: 'table_view',
              path: { name: 'income_categories.index' },
              gate: 'income_category_access'
            },
            {
              title: 'cruds.expense.title',
              icon: 'table_view',
              path: { name: 'expenses.index' },
              gate: 'expense_access'
            },
            {
              title: 'cruds.income.title',
              icon: 'table_view',
              path: { name: 'incomes.index' },
              gate: 'income_access'
            },
            {
              title: 'cruds.expenseReport.title',
              icon: 'table_view',
              path: { name: 'expense_reports.index' },
              gate: 'expense_report_access'
            }
          ]
        },
        {
          title: 'cruds.contentManagement.title',
          icon: 'table_view',
          path: { name: 'content_management' },
          gate: 'content_management_access',
          children: [
            {
              title: 'cruds.contentCategory.title',
              icon: 'table_view',
              path: { name: 'content_categories.index' },
              gate: 'content_category_access'
            },
            {
              title: 'cruds.contentTag.title',
              icon: 'table_view',
              path: { name: 'content_tags.index' },
              gate: 'content_tag_access'
            },
            {
              title: 'cruds.contentPage.title',
              icon: 'table_view',
              path: { name: 'content_pages.index' },
              gate: 'content_page_access'
            }
          ]
        },
        {
          title: 'cruds.userManagement.title',
          icon: 'person',
          path: { name: 'user_management' },
          gate: 'user_management_access',
          children: [
            {
              title: 'cruds.permission.title',
              icon: 'perm_data_setting',
              path: { name: 'permissions.index' },
              gate: 'permission_access'
            },
            {
              title: 'cruds.role.title',
              icon: 'group',
              path: { name: 'roles.index' },
              gate: 'role_access'
            },
            {
              title: 'cruds.user.title',
              icon: 'person',
              path: { name: 'users.index' },
              gate: 'user_access'
            }
          ]
        }
      ]
    }
  }
}
</script>
