<template>
    <div class="app-content-inner">
        <!------  Start Landing Banner Area ------>
        <div class="home-landing-banner" style="background-color:rgb(217 200 154)" v-lazy-container="{ selector: 'img',loading: 'preloader.gif'}">
            <img :data-src="banner ? 'storage/uploads/media/'+banner : ''" alt="banner">
        </div>
        
        <!-- Product search -->
        <div class="search-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 m-auto">
                        <form>
                            <div class="input-group">
                               <input type="text" class="form-control" placeholder="Search Product" v-model="search" @keyup="searchProduct">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service System Area -->
        <div class="service-system">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="service">
                            <div class="service-icon" v-lazy-container="{ selector: 'img',loading: 'preloader.gif'}">
                                <img data-src="/frontend/img/core/7.png" alt="services" height="50" width="50">
                            </div>
                            <div class="service-content">
                                <b>Big Saving</b>
                                <span>At Lowest Price</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service">
                            <div class="service-icon" v-lazy-container="{ selector: 'img',loading: 'preloader.gif'}">
                                <img data-src="/frontend/img/core/6.png" alt="services" height="50" width="50">
                            </div>
                            <div class="service-content">
                                <b>24 Hour Support</b>
                                <span>In Save Hand</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service">
                            <div class="service-icon" v-lazy-container="{ selector: 'img',loading: 'preloader.gif'}">
                                <img data-src="/frontend/img/core/5.png" alt="services" height="50" width="50">
                            </div>
                            <div class="service-content">
                                <b>Flexible Delivery</b>
                                <span>on order over $40</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Start Discount Offer Refer Area -->
        <div class="discount-offer-refer">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-6 col-md-6">
                        <a href="javascript:void(0)">
                            <div class="discount-offer text-center" v-lazy-container="{ selector: 'img',loading: 'preloader.gif'}">
                                <img data-src="/frontend/img/offer/4.jpg" alt="offer" class="w-100">
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-6 text-center">
                        <a href="javascript:void(0)">
                            <div class="discount-offer" v-lazy-container="{ selector: 'img',loading: 'preloader.gif'}">
                                <img data-src="/frontend/img/offer/6.jpg" alt="offer">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Categories -->
        <div class="item-categories-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="sectitle">Our Product Categories</h3>
                    </div>
                </div>
                <ProductCategories/>
            </div>
        </div>
        
        <!-- Testimonials Area -->
        <div class="testimonials ">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12 ">
                        <h2 class="sectitle ">What our clients are saying</h2>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-12 ">
                        <div class="slider-container ">
                            <carousel  :per-page="1" :mouse-drag="false">
                                <slide v-for="review in clientReviews" :key='review.id'>
                                    <div class="slide-box ">
                                        <!-- Testi One -->
                                        <p class="comment ">
                                            {{ review.comment }}
                                        </p>
                                        <img :src="'/storage/uploads/client/'+review.image" alt="avatar-image" />
                                        <h3 class="name mt-2">{{ review.name }}</h3>
                                    </div>
                                </slide>
                            </carousel>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer id="footer ">
            <div class="footer-top ">
                <div class="row ">
                    <div class="col-12 col-md-6 ">
                        <div class="footer-widget ">
                            <div class="footer-logo ">
                                <img src="/frontend/img/logo/logo.png " alt="logo " width="200 ">
                            </div>
                            <p class="mb-0 ">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate, cupiditate a quisquam vel minus officiis corrupti voluptatum aliquid laborum tempora fuga placeat voluptas, quidem veniam repellendus soluta optio quia eaque!
                            </p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 ">
                        <div class="footer-widget ">
                            <div class="footer-widget-title s-font-600">Customer Service</div>
                            <ul class="footer-menu ">
                                <li>
                                    <a href="javascript:void() ">Contact Us</a>
                                </li>
                                <li>
                                    <a href="javascript:void() ">Faq</a>
                                </li>
                                <li>
                                    <a href="javascript:void() ">Help</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 ">
                        <div class="footer-widget ">
                            <div class="footer-widget-title s-font-600">About</div>
                            <ul class="footer-menu ">
                                <li>
                                    <a href="javascript:void() ">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="javascript:void() ">Terms of Use</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom ">
                <div class="contact-section ">
                    <div class="phone-or-email s-font-500">
                        <span>
                                <img src="/frontend/img/cart/phone.png " alt="phone " width="20 ">
                            </span>
                        <span>
                                198789
                            </span>
                        <div class="email ">
                            or email <strong>support@sombob.com</strong>
                        </div>
                    </div>
                </div>
                <div class="sociaol-section ">
                    <ul class="social-icons ">
                        <li>
                            <a href="javascript:void(0) ">
                                <img src="/frontend/img/social/facebook.png " alt="facebook " width="20 ">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0) ">
                                <img src="/frontend/img/social/twitter.png " alt="twitter " width="20 ">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0) ">
                                <img src="/frontend/img/social/youtube.png " alt="youtube " width="20 ">
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0) ">
                                <img src="/frontend/img/social/instagram.png " alt="instagram " width="20 ">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
    import ProductCategories from '../components/homes/HomeProductCategory.vue';
    export default ({
        name: 'Home',
        components: { ProductCategories },
        data() {
            return {
                banner: '',
                search: '',
                clientReviews: {},
                is_mobile: window.innerWidth <= 950,
            }
        },
        methods: {
            getBanner() {
                const _this = this;
                axios
                    .get('api/v1/site-media')
                    .then( response => {
                        if(response.status == 200) {
                            _this.banner = response.data[0].home_banner;
                        }
                    }).catch(error => {
                        console.log(error)
                    })
            },
            searchProduct() {
                let key = this.search;
                if(key == '') {
                    this.$router.push('/');
                } else {
                    this.$router.push({ name: 'search', params: { searchText: key } })
                }
            },
            getReview() {
                axios.get('/api/v1/client/review')
                    .then((response) => {
                        this.clientReviews = response.data;
                    }).catch((error) => {
                        console.log(error)
                    })
            }
        },
        async mounted() {
            this.getBanner();
            this.getReview();
        },
        computed: {
            user() {
                return this.$store.getters.getUser;
            }
        }
        
    })
</script>

<style scoped>
.VueCarousel-dot-container {
    margin-top: 0!important;
}
</style>