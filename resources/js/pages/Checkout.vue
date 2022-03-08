<template>
    <div>
        <!-- Cart items -->
        <div class="shopping-cart-area mt-60">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 m-auto" id="cart">
                        <div class="card">
                            <div class="card-header bg-dark p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="text-black m-0">Shopping Cart </h5>
                                    <!-- <button class="btn btn-danger mt-0 btn-sm" @click="emptyCart">
                                        <i class="fa fa-trash-alt mr-2"></i><span>Empty Cart</span>
                                    </button> -->
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table class="table cart-table mb-0" v-if="products.length == 0">
                                    <tbody>
                                        <tr>
                                            <td colSpan="6" class="text-center">
                                                <div class="cart-empty">
                                                    <img src="/empty.png" alt="emptyimg" width="400">
                                                    <!-- <p>Your Cart Is empty</p> -->
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table> 
                                <div class="table-responsive"  v-else>
                                    <table class="table cart-table mb-0">
                                        <thead>
                                            <tr style="text-align:center">
                                                <th>Product</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th class="text-right"><span id="amount" class="amount">Sub Total</span></th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="product in products" :key="product.id" class="text-center">
                                                <td>
                                                    <div class="product-img" v-if="product.type=='medicine'">
                                                        <img :src="'/storage/uploads/medicines/' + product.image" alt="" />
                                                    </div>
                                                    <div class="product-img" v-else>
                                                        <img :src="'/storage/uploads/product/' + product.image" alt="" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="product-name">{{product.name}}</div>
                                                </td>
                                                <td>
                                                   <span class="t-font-family">৳ </span> {{product.price}}
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center align-content-center">
                                                        <div  class="input-group quantity-control " >
                                                            <button class="minus-quantity" @click="addToCart(product, 'minus')">–</button> <button  type="button " class="add-to-bag">{{ product.qty }} in  Bag</button> 
                                                            <button class="plus-quantity" @click="addToCart(product, 'plus')">+</button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <span class="t-font-family">৳ </span>{{ (product.qty * product.price).toFixed(2) }}
                                                </td>
                                                <td>
                                                    <button class="prdct-delete" @click="removeCartData(product)"><i class="bi bi-trash text-danger"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- cart summary -->
                    <div class="col-md-10 m-auto">
                        <div class="card cart-summary mt-4 bg-white">
                            <div class="card-body p-0">
                                <div class="group-price">
                                    <div class="cart-summary-line" id="cart-subtotal-products">
                                        <strong class="label js-subtotal">
                                            BAG TOTAL
                                            </strong>
                                        <span class="value t-font-family">৳ {{ this.$store.state.subTotal.toFixed(2) }}</span>
                                    </div>
                                    <!-- <div class="cart-summary-line" id="cart-subtotal-shipping">
                                        <strong class="label">
                                            BAG DISCOUNT
                                            </strong>
                                        <span class="value t-font-family">৳ 7.00</span>
                                        <div><small class="value t-font-family"></small></div>
                                    </div> -->
                                    <!-- <div class="cart-summary-line">
                                        <strong class="label">TOTAL</strong>
                                        <span class="value t-font-family">৳  {{ this.$store.state.subTotal.toFixed(0) }}</span>
                                    </div> -->
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
                            <div class="checkout cart-detailed-actions d-flex justify-content-between">
                                <router-link to="/medicines" class="w-100 d-block text-center btn-success app-btn mr-3">Continue To Shopping</router-link>
                                <router-link to="/payment" class="w-100 d-block text-center app-btn">Proceed To Payment</router-link>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default({
    name: 'Cart',
    data() {
        return {
            products: {},
        }
    },
    methods: {
        addToCart(product, incType) {
            this.$store.commit("ADD_TO_CART", {
                product,
                incType
            });
        },
        removeCartData(product) {
            this.$store.commit("REMOVE_CART", product);
        },
        emptyCart () {
            localStorage.removeItem('cart');
            localStorage.removeItem('subTotal');
            this.getCartItem();
        },
        getCartItem() {
            this.products = this.$store.state.cart;
        },
    },
    mounted() {
        this.getCartItem();
    },
    computed: {
        bagTotalDiscount() {
            let products = this.$store.state.cart;
            let totalDiscountPrice = 0;
            products.forEach(element => {
                totalDiscountPrice += element.discount_price;
            });
            return totalDiscountPrice;
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