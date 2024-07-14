<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Abilities
    Route::apiResource('abilities', 'AbilitiesController', ['only' => ['index']]);

    // Locales
    Route::get('locales/languages', 'LocalesController@languages')->name('locales.languages');
    Route::get('locales/messages', 'LocalesController@messages')->name('locales.messages');

    // Dashboard
    Route::get('dashboard', 'DashboardApiController@index')->name('dashboard');

    // Permissions
    Route::resource('permissions', 'PermissionsApiController');

    // Roles
    Route::resource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::resource('users', 'UsersApiController');

    // Expense Category
    Route::resource('expense-categories', 'ExpenseCategoryApiController');

    // Income Category
    Route::resource('income-categories', 'IncomeCategoryApiController');

    // Expense
    Route::resource('expenses', 'ExpenseApiController');

    // Income
    Route::resource('incomes', 'IncomeApiController');

    // Expense Report
    Route::apiResource('expense-reports', 'ExpenseReportApiController', ['only' => ['index']]);

    // Content Category
    Route::resource('content-categories', 'ContentCategoryApiController');

    // Content Tag
    Route::resource('content-tags', 'ContentTagApiController');

    // Content Page
    Route::post('content-pages/media', 'ContentPageApiController@storeMedia')->name('content-pages.storeMedia');
    Route::resource('content-pages', 'ContentPageApiController');

    // Room Types
    Route::post('room-types/media', 'RoomTypesApiController@storeMedia')->name('room-types.storeMedia');
    Route::resource('room-types', 'RoomTypesApiController');

    // Rooms
    Route::post('rooms/media', 'RoomsApiController@storeMedia')->name('rooms.storeMedia');
    Route::resource('rooms', 'RoomsApiController');

    // Room Maintenance
    Route::resource('room-maintenances', 'RoomMaintenanceApiController');

    // Service Types
    Route::post('service-types/media', 'ServiceTypesApiController@storeMedia')->name('service-types.storeMedia');
    Route::resource('service-types', 'ServiceTypesApiController');

    // Services
    Route::post('services/media', 'ServicesApiController@storeMedia')->name('services.storeMedia');
    Route::resource('services', 'ServicesApiController');

    // Promotions
    Route::post('promotions/media', 'PromotionsApiController@storeMedia')->name('promotions.storeMedia');
    Route::resource('promotions', 'PromotionsApiController');

    // Bookings
    Route::resource('bookings', 'BookingsApiController');

    // Booking Room
    Route::resource('booking-rooms', 'BookingRoomApiController');

    // Booking Service
    Route::resource('booking-services', 'BookingServiceApiController');

    // Payments
    Route::post('payments/media', 'PaymentsApiController@storeMedia')->name('payments.storeMedia');
    Route::resource('payments', 'PaymentsApiController');
    
    Route::get('/rooms/available', 'RoomController@getAvailableRooms');
    Route::post('/bookings', 'BookingController@store');
});
