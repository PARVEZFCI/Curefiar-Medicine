<template>
    <div>
        <!-- Cart items -->
        <div class="checkout-wrapper my-5">
            <div class="container-fluid">
                <form @submit.prevent=orderConfirm>
                    <div class="row">
                        <div class="col-md-7">
                            <div v-if="!isLoggedIn" style="padding-left: 50px">
                                <div class="checkout_login" style="font-size: 16px; font-weight: 500; color: rgb(74, 85, 104);">
                                    Returning customer?
                                    <router-link to="/login" class="text-danger">Click here to login</router-link> <br> 
                                    <div class="flex" style="margin-top: 14px;">
                                        New customer?
                                        <router-link to="/register" class="text-danger">Click here to register</router-link>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-area mb-15" v-else>
                                <!-- Shipping form -->
                                <div class="checkout-content checkout-payment-form">
                                    <h2 class="secondary-title"><i class=""></i>Shipping Address </h2>
                                    <div class="box-inner">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <label for="" class="mb-2">Full Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control mb-0" placeholder="Enter your name" v-model="orderData.shipping_address.name">
                                                    <strong class="text-danger " v-if="errors.name">
                                                        {{ errors.name[0] }}
                                                    </strong>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <label for="" class="mb-2">Phone<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control mb-0" placeholder="e.g: 01773247974" v-model="orderData.shipping_address.phone">
                                                    <strong class="text-danger " v-if="errors.phone">
                                                        {{ errors.phone[0] }}
                                                    </strong>
                                                </div>  
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="" class="mb-2">City <span class="text-danger">*</span></label>
                                                    <select @change="getCityWiseArea($event)" v-model="orderData.shipping_address.city">
                                                        <option value=" " selected disabled>Please select your city</option>
                                                        <option v-for="city in cities" :key="city.id" :value="city.id" >{{ city.city_name }}</option>
                                                    </select>
                                                    <strong class="text-danger " v-if="errors.city">
                                                        {{ errors.city[0] }}
                                                    </strong>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="" class="mb-2">Area <span class="text-danger">*</span></label>
                                                    <select aria-readonly="" v-model="orderData.shipping_address.area">
                                                        <option :value="area.id" v-for="area in areas" :key="area.id">{{ area.area_name }}</option>
                                                    </select>
                                                    <strong class="text-danger " v-if="errors.area">
                                                        {{ errors.area[0] }}
                                                    </strong>
                                                </div> 
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group address-2-input mb-2">
                                                    <label for="" class="mb-2">Address <span class="text-danger">*</span></label>
                                                    <textarea name="" id="" cols="30" rows="5" class="form-control" v-model="orderData.shipping_address.address"></textarea>
                                                    <strong class="text-danger " v-if="errors.address">
                                                        {{ errors.address[0] }}
                                                    </strong>
                                                </div> 
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <!-- Payment method form -->
                                <div class="checkout-content checkout-payment-methods mt-2">
                                    <h2 class="secondary-title"><i class=""></i>Payment Method </h2>
                                    <div class="box-inner">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="payment_type" value="cod" checked="checked" style="width: unset" v-model="orderData.payment_method">
                                                Cash On Delivery 
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Comment box -->
                                <div class="checkout-content confirm-section">
                                    <h2 class="secondary-title"><i class=""></i>Add Comments About Your Order</h2>
                                    <div class="box-inner">
                                        <textarea name="comment" rows="8" class="form-control requried h-full w-full" v-model="orderData.comment"></textarea>
                                    </div>                       
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="checkout-content confirm-section">
                                <h2 class="secondary-title"><i class=""></i>Cart Totals</h2>
                                <div class="card cart-summary mt-4 bg-white">
                                    <div class="card-body p-0">
                                        <div class="group-price">
                                            <div class="cart-summary-line" id="cart-subtotal-products">
                                                <label class="label js-subtotal">
                                                    BAG TOTAL
                                                    </label>
                                                <span class="value t-font-family">৳ {{ this.$store.state.subTotal ? this.$store.state.subTotal.toFixed(2) : 0 }}</span>
                                            </div>
                                        </div>
                                        <!-- <div class="cart-summary-line cart-total has_border">
                                            <div class="d-flex justify-content-between">
                                                <span>
                                                <span class="label">Grand Total</span>
                                                </span>
                                                <span class="value ml-auto label t-font-family">৳ {{bagTotalDiscount}}</span>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
            
                            <!-- procceed order  -->     
                            <button class="w-100 d-block text-center app-btn" style="padding: 8px 0px 10px;font-size: 20px;letter-spacing: .5px;">Place Order</button>       
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default({
    name: 'Payment',
    data() {
        return {
            cities: {},
            areas: {},
            orderData: {
                shipping_address: {
                    name: '',
                    phone: '',
                    city: '',
                    area: '',
                    address: '',
                },
                user_id: User.userId(),
                payment_type: 'COD', //cod = cash on deleivery
                comment: '',
                total_product: this.$store.state.cart.length,
                grand_total: this.$store.state.subTotal,
                cartData: this.$store.state.cart,
            },
            isLoggedIn: false,
            errors: [],

        }
    },
    methods: {
        getCity() {
            axios.get('/api/v1/city').then((response) => {
                this.cities = response.data;
            }).catch((error) => {
                console.log(error)
            })
        },
        getCityWiseArea(event) {
            let city = event.target.value;
            axios.get(`/api/v1/area/${city}`).then((response) => {
                if(response.data) {
                    this.areas = response.data;
                }
            }).catch((error) => {
                console.log(error);
            })
        },
        orderConfirm() {
            const _this = this;
            axios.post('/api/v1/order', _this.orderData)
                .then((response) => {
                    if(response.status == 200) {
                        this.errors = [],
                        this.$notify({
                            group: 'auth',
                            type: 'success',
                            // duration: 0000,
                            speed: 1000,
                            text: response.data.message
                        });
                        // _this.$router.push({ name: 'order' });
                        window.location.href = '/user/order';
                        _this.clearForm(_this.orderData);
                        _this.$store.commit('REMOVE_CART_DATA_FORM_STORAGE');
                    }
                }).catch((error) => {
                    if (error.response.status == 400) {
                        this.errors = error.response.data;
                    } else {
                        this.$notify({
                            group: 'auth',
                            type: 'error',
                            // duration: 0000,
                            speed: 1000,
                            text: 'Something went wrong'
                        });
                    }
                })
            
        },
        clearForm: function (form) {
			const _this = this;
			 _this.allErrors = [];
			Object.keys(form).forEach((key)=> {
				form[key] = "";
			});
		},
    },
    mounted() {
        this.getCity();

        if (User.isLoggedIn()) {
            this.isLoggedIn = true;
        }

        if( this.$store.state.cart.length == 0 ) {
            this.$router.push({ name: 'home' })
        }
    },
})
</script>
<style scoped>
.bg-dark {
    background: rgb(222 227 233)!important;
}
.product-img img {
    width: 80px;
    height: 80px;
    border-radius: 4px;
}
.cart-table td, .cart-table th {
    vertical-align: middle;
}
.input-group.quantity-control {
    height: 35px;
}
@media only screen and (min-width: 250px) and (max-width: 480px) {
    .checkout.cart-detailed-actions {
        flex-wrap: wrap;
    }
    .checkout.cart-detailed-actions a {
        text-transform: capitalize;
        padding: 10px;
        border-radius: 4px;
    }
}
</style>