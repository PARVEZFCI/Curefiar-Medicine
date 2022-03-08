<template>
    <div class="offer-area">
        <!-- App Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb indigo lighten-4">
                            <li class="breadcrumb-item"><a class="black-text" href="#">Offer Products</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Offer Product -->
            <div class="row ">
                <ProductBox v-for="offerProduct in offerProducts" :key="offerProduct.id" :product="offerProduct.product" type="product"/>
            </div>
        </div>
    </div>
</template>

<script>
import ProductBox from '../components/CardProduct.vue';
export default ({
    name: "OfferProduct",
    components:{ProductBox},
    data() {
        return {
            offerProducts: {},
            is_cart: false,
        }
    },
    methods: {
        getOfferProduct() {
            const _this = this;
            axios
                .get('api/v1/offer-products')
                .then(response => {
                    console.log(response.data)
                    if(response.status == 200) {
                        _this.offerProducts = response.data;
                    }
                }).catch(error => {
                    console.log(error);
                })
        },
        addToCart(product, type) {
            // this.cartProduct = product
            this.$store.commit("ADD_TO_CART", {
                product,
                type
            });
        }, 
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
    mounted() {
        const _this = this;
        _this.getOfferProduct();
    }
})
</script>
<style scoped>
del {
    font-size: 12px;
}
</style>