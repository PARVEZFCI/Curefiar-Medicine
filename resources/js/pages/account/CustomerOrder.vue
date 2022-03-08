<template>
    <div>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-lg-3 col-md-2">
                    <AccountSidebar />
                </div>
                <div class="col-lg-9 col-md-10">
                    <div class="left-side">
                        <div class="title">
                            <a href="#"> My Orders</a>
                        </div>
                        <div class="order">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- <h4>Tuesday, 31 December 2021, 8:00am - 9:00am</h4> -->
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <th>Date</th>
                                            <th>Order Number</th>
                                            <th>Total Product</th>
                                            <th>Invoice Total</th>
                                            <th>Order Status</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <tr v-for="order in orders.data" :key="order.id">
                                                <td>
                                                    {{ order.created_at | moment("Do MMMM YYYY") }}
                                                </td>
                                                <td>{{ order.order_code }}</td>
                                                <td>{{ order.total_product }}</td>
                                                <td>{{ order.grand_total }}</td>
                                                <td>
                                                    <span v-if="order.order_status == 0" class="badge badge-warning text-warning">Pending</span>
                                                    <span v-if="order.order_status == 1" class="text-primary">In Progress</span>
                                                    <span v-if="order.order_status == 2" class="text-success">Delivered</span>
                                                    <span v-if="order.order_status == 3" class="text-danger">Canceled</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-secondary action-btn" @click="showOrderData(order.id)">
                                                            <i class="icon bi bi-eye text-white"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-12">
                                    <router-link to="/medicines" class="p-order text-white">Continue Shopping</router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <!-- The Modal -->
        <div v-if="showModal">
            <transition name="modal">
                <div class="modal-mask">
                    <div class="modal-wrapper">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Invoice Products </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" @click="showModal = false">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Sub Total</th>
                                    </thead>
                                    <tbody>
                                        <tr v-for="product in orderProducts" :key="product.id">
                                            <td>
                                                {{ product.product_name }}
                                            </td>
                                            <td>{{ product.product_type }}</td>
                                            <td>{{ product.price }}</td>
                                            <td>{{ product.quantity }}</td>
                                            <td>{{ product.sub_total }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>

    </div>
</template>
<script>
import AccountSidebar from './AccountSidebar.vue'
export default {
    name: 'Order',
    components: { AccountSidebar },
    data() {
        return {
            orders: {},
            orderProducts: {},
            user: '',
            showModal: false,
        }
    },
    methods: {
        getCustomerOrder() {
            const _this = this;
            axios.get(`/api/v1/customer-order/${_this.user}`)
                .then((response) => {
                   _this.orders = response.data;
                }).catch((error) => {
                    console.log(error)
                })
        },
        showOrderData(orderId) {
            const _this = this;
            _this.showModal = true;
            axios.get(`/api/v1/customer/order/${orderId}`)
                .then((response) => {
                     _this.orderProducts = response.data;
                }).catch((error) => {
                    console.log(error)
                })
        }
    },
    mounted() {
        const _this = this;
        if (!User.isLoggedIn()) {
            this.$router.push({ name: 'home' });
        } else {
            this.$router.push({ name: 'order' });   
        }

        _this.user = User.userId();
        _this.getCustomerOrder();
    }
}
</script>

<style scoped>
table tr td {
    font-weight: 400;
}
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}
.modal-dialog {
    max-width: 800px;
}
</style>