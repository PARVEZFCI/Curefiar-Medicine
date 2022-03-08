<template>
    <div class="col-6 col-xl-2 col-lg-3 col-md-3 col-md-3-half"  v-if="type == 'medicine'">
        <div class="item mb-5">
            <div class="item-inner ">
                <div class="item-img " v-lazy-container="{ selector: 'img',loading: 'preloader.gif'}">
                    <img :data-src="product.image ? '/storage/uploads/medicines/'+ product.image :  '/image.svg'" :alt="product.name" class="item-thumbnail">
                </div>
                <div class="item-desc ">
                    <div class="item-name ">{{ product.name }}</div>
                    <div class="item-sub-text ">{{ product.prices[0] ? product.prices[0].unit.unit_name : '' }}</div>
                    <div class="price t-font-family" v-show="product.prices[0]">
                        <span>৳ </span>
                        <span v-if="product.prices[0]">
                            <span v-if="product.prices[0].discount">{{ product.prices[0].discount_price }}</span>
                            <span v-else>{{ product.prices[0].price }}</span>
                        </span>
                        <del v-show="product.prices[0] ? product.prices[0].discount : ''">
                            <span>{{ product.prices[0] ? product.prices[0].price  : ''}}</span>
                        </del>
                    </div>
                </div>
                <div class="overlay text ">
                    <a href="javascript:void(0) " class="quick-view" @click.prevent="productDetails(product)">
                        <i class="bi bi-eye "></i>
                        <!-- <span>Quick View</span> -->
                    </a>
                </div>
                <div class="item-quantity-editor add-btn-wrapper border-radius-small ">
                    <button class="minus-quantity" @click="addToCart(product, 'minus')">–</button>
                    <button type="button " class="add-to-bag" v-if="!is_cart" @click="addToCart(product, 'plus')">Add To Bag</button>
                    <button type="button " class="add-to-bag" v-if="is_cart" @click="addToCart(product, 'plus')">{{ quantity }} in  Bag</button>
                    <button class="plus-quantity" @click="addToCart(product, 'plus')">+</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-3 col-lg-4 col-md-4 col-md-3-half" v-else>
        <div class="item" v-if="product">
            <div class="item-inner ">
                <div class="item-img" v-lazy-container="{ selector: 'img',loading: 'preloader.gif'}">
                    <img  :data-src="product.thumbnail_image ? '/storage/uploads/product/' +product.thumbnail_image : ''" alt="item " class="item-thumbnail">
                </div>
                <div class="item-desc ">
                    <div class="item-name ">{{ product.name }}</div>
                    <div class="item-sub-text ">{{ product.unit ? product.unit : '' }}</div>
                    <div class="price t-font-family">
                        <span>৳ </span>
                        <span>{{ product.discount ? product.discount_price : product.price }}</span>
                        <del v-show="product.discount">
                            <span>{{ product.price }}</span>
                        </del>
                    </div>
                </div>
                <div class="overlay text ">
                    <a href="javascript:void(0) " class="quick-view" @click.prevent="productDetails(product)">
                        <i class="bi bi-eye "></i>
                    </a>
                </div>
                <div class="item-quantity-editor add-btn-wrapper border-radius-small ">
                    <button class="minus-quantity" @click="addToCart(product, 'minus')">–</button>
                    <button type="button " class="add-to-bag" v-if="!is_cart" @click="addToCart(product, 'plus')">Add To Bag</button>
                    <button type="button " class="add-to-bag" v-if="is_cart" @click="addToCart(product, 'plus')">{{ quantity }} in  Bag</button>
                    <button class="plus-quantity" @click="addToCart(product, 'plus')">+</button>
                </div>
            </div>
        </div>
    </div> 
</template>

<script>
export default {
    name: 'ProductBox',
    props: ['product', 'type'],
    data() {
        return {
            cartProduct: {},
            is_cart: false,
        }
    },
    methods: {
        addToCart(product, incType) {
            // this.cartProduct = product
            this.$store.commit("ADD_TO_CART", {
                product,
                incType
            });
        }, 
        productDetails(product) {
            this.$store.dispatch("triggerModal", this.product);
        }
    },
    computed: {
        quantity() {
            let cart =  this.$store.getters.getCart;
            let quantity = '';
            if(cart.length) {
                cart.forEach( item => {
                    if(this.product) {
                        
                        if( item.id === this.product.id ) {
                            this.is_cart = true;
                            quantity = item.qty;
                        }   
                    }
                })

                return quantity;
            }
        }
    },
    watch: {
        quantity (newQuantity, oldCount) {
            return newQuantity;
        }
    },
}
</script>

<style >
    del {
        font-size: 12px;
    }
</style>