<template>
    <div>
        <!-- Shopping bag with cart -->
        <MiniShoppingCart /> 

        <!-- Login Component -->
        <Login />

        <!-- Registration Component -->
        <Registration />

        <!------- Start Header ------->
        <Header @toggle-sidebar="toggleSideBar" :user='loggedUser'/>
        <!------- End Header ------->

        <!-- Site Main -->
        <div class="app-wrap relative">

            <!------ Start Sidebar for big screen ------>
            <Sidebar :class="{hideLeftSide: hideLeftSide}" v-if="!is_mobile"/>
            <!-- End Sidebar -->

            <!-- Sidebar mobile, tab view -->
            <MobileSidebar  v-if="is_mobile"/>

            <!-- App Main Content -->
            <div class="app-content" :class="{showContent: showContent}">
                <keep-alive>
                    <transition name="moveInUp">
                        <router-view :key="$route.fullPath"></router-view>
                    </transition>    
                </keep-alive>
            </div>

            <!-- Backdrop -->
            <div class="background-backdrop fade" v-show="is_mobile" :class="{ show: this.$store.state.backdrop }" @click="closeSitebar"></div>
            <!-- Mobile Backdrop -->
            <div class="background-backdrop fade z-in-1051" v-show="!is_mobile" :class="{ show: this.$store.state.backdrop }" @click="closeSitebar"></div>
        </div>
   
        <!-- Item details popup -->
        <div v-if="modal" class="item-detail-popup-wrap">
            <div class="item-detail-box cus-transition">
                <!-- Popup close modal icon -->
                <button type="button" class="popup-close close" aria-label="Close" @click.prevent="modalClose">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- Popup content -->
                <div class="popup-content ">
                    <div class="popup-body item-details">
                        <div class="row ">
                            <!-- Popup Left -->
                            <!-- For medicine -->
                            <div class="popup-left-side col-sm-5" v-if="product.type == 'medicine'">
                                <div class="image-gallery ">
                                    <div class="large-image item-image-container text-center" v-lazy-container="{ selector: 'img',loading: 'preloader.gif'}">
                                        <img :data-src="'/storage/uploads/medicines/' +product.image" :alt="product.name" class="main-item-img">
                                    </div>
                                </div>
                            </div>
                            <!-- for other product -->
                            <div class="popup-left-side col-sm-5" v-else>
                                <div class="image-gallery ">
                                    <div class="large-image item-image-container text-center"  v-lazy-container="{ selector: 'img',loading: 'preloader.gif'}">
                                        <img :data-src="'/storage/uploads/product/' +product.thumbnail_image" :alt="product.name" class="main-item-img">
                                    </div>
                                </div>
                                <!-- Image thumb -->
                                <div class="item-thumb">
                                    <div class="item-thumb-content " v-if="product.product_images" v-lazy-container="{ selector: 'img',loading: 'preloader.gif'}">
                                        <a href="javascript:void(0)" class="thumbnail" v-for="productImage in product.product_images" :key="productImage.id">
                                            <img :data-src="'/storage/uploads/product/mainproduct/' +productImage.image" :alt="product.name" class="item-thumbnail">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- popup right -->
                            <div class="popup-right-side col-sm-7 ">
                                <div class="title-product mb-2">
                                    <h1>{{ product.name }}</h1>
                                    <span v-if="product.type == 'medicine'">
                                        <span v-show="product.category_id">
                                            {{product.category_id ? product.category.name : ''}}
                                        </span> <br>
                                        <span v-show="product.dosage">
                                            {{product.dosage}}
                                        </span>
                                    </span>
                                </div>

                                <!-- This part For medicine -->
                                <div v-if="product.type == 'medicine'">
                                    <div class="medicine-unit-select-box">
                                        <div class="form-group mb-3">
                                            <label for="">Unit</label>
                                            <select name="" id="" class="mt-2 medicine-select-unit form-control" @change="getMedicinePrice($event, product)">
                                                <option :value="price.type" v-for="price in product.prices" :key="price.id">{{ price.unit.unit_name }}</option>
                                            </select>
                                            <strong v-if="alertMsg" class="text-danger">Medicine unit change. Please add to cart this medicine</strong>
                                        </div>
                                    </div>

                                    <div class="product_page_price price t-font-family">
                                        <span v-if="product.prices[0] && is_default_price">
                                            <span class="price-new">
                                                <span itemprop="price " id="price-old">৳ {{ product.prices[0].discount ? product.prices[0].discount_price : product.prices[0].price }}</span>
                                            </span>
                                            <del v-show="product.prices[0].discount">
                                                <span class="price-new"><span itemprop="price " id="price-old">৳ {{ product.prices[0].price }}</span></span>
                                            </del>
                                        </span>
                                        <span v-else>
                                            <span class="price-new">
                                                <span itemprop="price " id="price-old">৳ {{ medicinePrice.discount_price ? medicinePrice.discount_price : medicinePrice.price }}</span>
                                            </span>
                                            <del v-show="medicinePrice.discount_price">
                                                <span class="price-new"><span itemprop="price " id="price-old">৳ {{ medicinePrice.price }}</span></span>
                                            </del>
                                        </span>
                                    </div>
                                </div>
                                <div v-else>
                                    <div class="product_page_price price t-font-family">
                                        <span class="price-new"><span itemprop="price " id="price-old">৳ {{ product.discount ? product.discount_price : product.price }}</span></span>
                                        <del v-show="product.discount">
                                            <span class="price-new"><span itemprop="price " id="price-old">৳ {{ product.price }}</span></span>
                                        </del>
                                    </div>
                                </div>

                                <div class="form-group box-info-product mt-2">
                                    <div class="option quantity">
                                        <label class="control-label " for="input-quantity ">Qty</label>
                                        <div class="input-group quantity-control " unselectable="on " style="user-select: none; ">
                                            <button class="minus-quantity"  @click="addToCart(product, 'minus')">–</button>
                                            
                                            <button type="button " class="add-to-bag">{{ quantity ? quantity : 0 }} in  Bag</button>
                                            <button class="plus-quantity"  @click="addToCart(product, 'plus')">+</button>
                                        </div>
                                    </div>
                                    <div class="detail-action mt-2">
                                        <button class="app-btn" type="button" id="button-cart" @click.prevent="modalClose">
                                            Buy Now
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Product description -->
                            <div class="short_description form-group" v-if="product.description || product.details">
                                <h3>OverView</h3>
                                <div class="form-group">
                                    <p class="text-dark" v-html="product.type === 'medicine' ? product.details : product.description"></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <notifications group="auth"/>
    </div>
</template>

<script>
import Header from '../components/Header';
import Sidebar from '../components/Sidebar.vue';
import MobileSidebar from '../components/mobile/MobileSidebar.vue';
import MiniShoppingCart from '../components/Cart/MiniShoppingCart.vue';
import Login from '../components/Auth/Login.vue';
import Registration from '../components/Auth/Registration.vue';

export default ({
    name: 'MainApp',
    components: {Header, Sidebar, MobileSidebar, MiniShoppingCart, Login, Registration},
    props: ['user'],
    data() {
        return {
            showContent: false,
            hideLeftSide: false,
            is_mobile: window.innerWidth <= 950,
            modal: false,
            product: '',
            medicinePrice : {
                price: '',
                discount_price: '',
            },
            is_default_price: true,
            is_cart: false,
            alertMsg: false,
            loggedUser: '',
        }
    },
    methods: {
        toggleSideBar() {
            this.showContent = !this.showContent
            this.hideLeftSide = !this.hideLeftSide
        },
        closeSitebar() {
            this.$store.state.show = false;
            this.$store.state.cartshow = false;
            this.$store.state.regshow = false;
            this.$store.state.loginshow = false;
            this.$store.state.backdrop = false;
        },
        modalClose() {
            this.is_default_price = true;
            this.medicinePrice = {}
            this.$store.dispatch("resetModal");
        },
        getMedicinePrice(event,product) {

            this.alertMsg = true;
            
            //When medicine change then its commit remove cart method for remove the product
            this.$store.state.cart.forEach((item, index) => {
                if(item.id == product.id) {
                    this.$store.commit("REMOVE_CART", item);
                }
            });
            
            this.is_default_price = false;
            // this part is working when change medicine unit and show related unit wise price
            this.$store.state.medicineUnitType = event.target.value;
            if(this.$store.state.medicineUnitType === 'primary') {
                this.is_default_price = true;
            } else {
                if(this.product.prices[1].discount_price) {
                    this.medicinePrice.price = this.product.prices[1].price;
                    this.medicinePrice.discount_price = this.product.prices[1].discount_price;
                } else {
                    this.medicinePrice.price = this.product.prices[1].price;
                }
            }
        },
        addToCart(product, incType) {
            this.alertMsg = false;
            this.$store.commit("ADD_TO_CART", {
                product,
                incType,
            });
        },
    },
    mounted() { 
        this.$store.watch(
            () => {
                return this.$store.getters["getModal"]
            },
            (val)=>{
                this.modal = val.modal
                this.product = val.singleProduct
                this.medicinePricetype = 'primary'
            },
            {
                deep:true
            }
         );
    },  
    created() {
        if(User.isLoggedIn()) {
            this.loggedUser = User.user();
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
})
</script>

<style scoped>
    .showContent{
        margin-left: 0!important;
    }
    .hideLeftSide {
        left: -250px!important;
        transition: left ease 1s;
    }
    .moveInUp-enter-active{
        animation: fadeIn 1s ease-in;
    }
    @keyframes fadeIn{
        0%{
            opacity: 0;
        }
        50%{
            opacity: 0.5;
        }
        100%{
            opacity: 1;
        }
    }
    .z-in-1051 {
        z-index: 1051;
    }
    .medicine-select-unit {
        width: 100px;
        box-shadow: none;
    }
</style>