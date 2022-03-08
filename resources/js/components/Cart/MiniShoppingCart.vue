<template>
    <div>
        <div id="so-groups" class="right so-groups-sticky hidden-xs" @click="showCart" v-if="this.$route.name != 'payment' && this.$route.name != 'order'">
            <div class="sticky-mycart">
                <i class="bi bi-handbag d-block"></i>   
                <span class="item-count d-block" v-if="!is_mobile"> {{ this.$store.state.cart.length }} {{ this.$store.state.cart.length > 1 ? 'ITEMS' : 'ITEM'}}</span>
                <div class="d-flex justify-content-center" v-if="!is_mobile">
                    <span class="taka-icon">৳&nbsp;&nbsp;</span>
                    <span>
                        {{this.$store.state.subTotal ? this.$store.state.subTotal.toFixed(2) : 0}}
                    </span>
                </div>
            </div>
        </div>

        <!-- Shopping Cart -->
        <div id="shopping-cart">
            <div class="cart-wrapper cus-transition shop-bag" :class="{'cart-open' : this.$store.state.cartshow}">
                <div class="cart-container">
                    <div class="cart-inner">
                        <!-- Cart Header -->
                        <div class="cart-header">
                            <div class="cart-header-icon">
                                <img src="/frontend/img/cart/shopping-bag.png" alt="bag" width="40">
                            </div>
                            <span class="cart-item-count s-font-600">{{this.$store.state.cart.length}} ITEMS</span>
                            <!-- Cart close component -->
                            <CartCloseBtn/>
                        </div>
                        <!-- Cart Body -->
                        <div class="cart-body">
                            <div class="d-flex justify-content-center align-items-center h-100" v-if="!this.$store.state.cart.length">
                                <img src="/empty.png" alt="emptyimg" width="200">
                            </div>
                            <div class="cart-order-item" v-else v-for="product in this.$store.state.cart" :key="product.id">
                                <div class="quantity">
                                    <button class="plus-quantity" @click="addToCart(product, 'plus')">+</button>
                                    <span>{{ product.qty }}</span>
                                    <button class="minus-quantity" @click="addToCart(product, 'minus')">-</button>
                                </div>
                                <div class="picture">
                                    <div v-if="product.type == 'medicine'">
                                        <img :src="product.image ? '/storage/uploads/medicines/' + product.image : '/frontend/img/cart/online-shopping.png'" alt="item" width="50">
                                    </div>
                                    <div v-else>
                                        <img :src="product.image ? '/storage/uploads/product/' + product.image : '/frontend/img/cart/online-shopping.png'" alt="item" width="50">
                                    </div>
                                </div>
                                <div class="name">
                                    <span>{{ product.name }}</span>
                                    <div class="sub-text s-font-600">
                                        <span>৳</span>
                                        <span v-if="product.discount == ''">{{ product.price ? product.price.toFixed(2) : '' }}</span>
                                        <span v-else>{{ product.discount_price ? product.discount_price.toFixed(2) : '' }}</span>
                                    </div>
                                </div>
                                <div class="cart-item-amount">
                                    <div class="total">
                                        <span>৳</span>
                                        <span>{{ (product.qty * product.price).toFixed(2) }}</span>
                                    </div>
                                    <div class="remove-item" @click="removeCartData(product)">
                                        <i class="bi bi-trash"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- cart-footer -->
                        <div class="cart-footer">
                            <div class="cart-total">
                                <span>Cart Total</span>
                                <strong class="text-dark">
                                    ৳  {{ this.$store.state.subTotal ? this.$store.state.subTotal.toFixed(2) : 0 }}
                                </strong>
                            </div>
                             <button class="app-btn w-100 mt-0 d-block flex-grow-1" @click="goToCheckout"><i class="bi bi-shopping-bag"></i> PROCEED</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import CartCloseBtn from './CartCloseBtn.vue'
export default {
    name: 'MiniShoppingCart',
    data() {
        return {
            product: {},
            is_mobile: window.innerWidth <= 950,
        }
    },
    components: {CartCloseBtn},
    methods: {
        showCart() {
            const _this = this;
            _this.$store.commit('toggleSidebar', 1);
        },
        addToCart(product, incType) {
            // this.cartProduct = product
            this.$store.commit("ADD_TO_CART", {
                product,
                incType
            });
        },
        removeCartData(product) {
		    this.$store.commit("REMOVE_CART", product);
		},
        goToCheckout() {
            this.$store.state.cartshow = false;
            this.$store.state.backdrop = false;
            this.$router.push({name:'checkout'})
        }
    },
}
</script>
<style>
.cart-open {
    right: 0;
}
</style>