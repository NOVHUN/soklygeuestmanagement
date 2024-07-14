<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">hotel</i>
            </div>
            <h4 class="card-title">Available Rooms</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="check-in-date">Check-in Date</label>
              <input type="date" id="check-in-date" class="form-control" v-model="checkInDate" />
            </div>
            <div class="form-group">
              <label for="check-out-date">Check-out Date</label>
              <input type="date" id="check-out-date" class="form-control" v-model="checkOutDate" />
            </div>
            <button class="btn btn-primary" @click="checkAvailability">Check Availability</button>
            
            <div class="table-responsive mt-4" v-if="availableRooms.length">
              <table class="table">
                <thead>
                  <tr>
                    <th>Room Name</th>
                    <th>Type</th>
                    <th>Price per Night</th>
                    <th>Max People</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="room in availableRooms" :key="room.id">
                    <td>{{ room.room_name }}</td>
                    <td>{{ room.room_type ? room.room_type.type : '' }}</td>
                    <td>{{ room.price_per_night }}</td>
                    <td>{{ room.max_people }}</td>
                    <td><button class="btn btn-success" @click="addToCart(room)">Add to Cart</button></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="table-responsive mt-4" v-if="availableServices.length">
              <h4>Available Services</h4>
              <table class="table">
                <thead>
                  <tr>
                    <th>Service Name</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="service in availableServices" :key="service.id">
                    <td>{{ service.name }}</td>
                    <td>{{ service.service_type ? service.service_type.type : '' }}</td>
                    <td>{{ service.price }}</td>
                    <td><button class="btn btn-success" @click="addServiceToCart(service)">Add to Cart</button></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="card mt-4" v-if="cart.length">
              <div class="card-header">
                <h4>Cart</h4>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Room/Service</th>
                      <th>Type</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="item in cart" :key="item.id">
                      <td>{{ item.name }}</td>
                      <td>{{ item.type }}</td>
                      <td>{{ item.price }}</td>
                      <td><button class="btn btn-danger" @click="removeFromCart(item)">Remove</button></td>
                    </tr>
                  </tbody>
                </table>
                <button class="btn btn-primary" @click="completeBooking">Complete Booking</button>
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

export default {
  data() {
    return {
      checkInDate: '',
      checkOutDate: '',
      availableRooms: [],
      availableServices: [],
      cart: []
    }
  },
  computed: {
    ...mapGetters('rooms', ['lists']),
    ...mapGetters('bookings', ['bookings']),
    ...mapGetters('bookingRooms', ['all']),
    ...mapGetters('services', ['all'])
  },
  methods: {
    ...mapActions('bookings', ['fetchShowData', 'storeData']),
    ...mapActions('rooms', ['fetchShowData', 'storeData']),
    ...mapActions('bookingRooms', ['fetchShowData', 'storeData']),
    ...mapActions('services', ['fetchShowData', 'storeData']),
    checkAvailability() {
      const bookedRoomIds = this.all
        .filter(roomBooking => (
          (new Date(roomBooking.check_in_date) <= new Date(this.checkInDate) && new Date(roomBooking.check_out_date) >= new Date(this.checkInDate)) ||
          (new Date(roomBooking.check_in_date) <= new Date(this.checkOutDate) && new Date(roomBooking.check_out_date) >= new Date(this.checkOutDate))
        ))
        .map(roomBooking => roomBooking.room_id)

      this.availableRooms = this.lists.filter(room => !bookedRoomIds.includes(room.id))
      this.availableServices = this.all
    },
    addToCart(room) {
      const cartItem = {
        id: room.id,
        name: room.room_name,
        type: 'Room',
        price: room.price_per_night
      }
      this.cart.push(cartItem)
    },
    addServiceToCart(service) {
      const cartItem = {
        id: service.id,
        name: service.name,
        type: 'Service',
        price: service.price
      }
      this.cart.push(cartItem)
    },
    removeFromCart(item) {
      this.cart = this.cart.filter(cartItem => cartItem.id !== item.id)
    },
    async completeBooking() {
      const bookingData = {
        check_in_date: this.checkInDate,
        check_out_date: this.checkOutDate,
        items: this.cart
      }
      try {
        const response = await this.storeData(bookingData)
        const bookingId = response.data.id

        for (let item of this.cart) {
          if (item.type === 'Room') {
            await this.storeData({
              booking_id: bookingId,
              room_id: item.id,
              check_in_date: this.checkInDate,
              check_out_date: this.checkOutDate,
              price: item.price
            })
          } else if (item.type === 'Service') {
            await this.storeData({
              booking_id: bookingId,
              service_id: item.id,
              quantity: 1,
              price: item.price
            })
          }
        }
        alert('Booking completed successfully')
        this.cart = []
        this.availableRooms = []
        this.availableServices = []
      } catch (error) {
        console.error(error)
      }
    }
  },
  created() {
    this.fetchShowData()
  }
}
</script>
<style scoped>
/* Add your styles here */
</style>
