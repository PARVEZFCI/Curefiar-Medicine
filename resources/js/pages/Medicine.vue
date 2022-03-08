<template>
    <div class="medicine-area">

        <!-- App Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb indigo lighten-4">
                            <li class="breadcrumb-item"><a class="black-text" href="#">Medicines</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Medicines Area -->
        <div class="items-area">
            <div class="container-fluid">
                <!-- Medicines -->
                <div class="row ">
                    <ProductBox v-for="product in medicines.data" :key="product.id" :product="product" type="medicine"/>
                    <!-- <div class="col-6 col-xl-3 col-lg-3 col-md-3 col-md-3-half">
                        <div class="item mb-5">
                            <div class="item-inner ">
                                <div class="item-img ">
                                    <img :src="medicine.image ? '/storage/uploads/medicines/'+ medicine.image :  '/image.svg'" :alt="medicine.name" class="item-thumbnail">
                                </div>
                                <div class="item-desc ">
                                    <div class="item-name ">{{ medicine.name }}</div>
                                    <div class="item-sub-text ">{{ medicine.prices[0] ? medicine.prices[0].unit.unit_name : '' }}</div>
                                    <div class="price t-font-family" v-show="medicine.prices[0]">
                                        <span>৳ </span>
                                        <span v-if="medicine.prices[0]">
                                            <span v-if="medicine.prices[0].discount">{{ medicine.prices[0].discount_price }}</span>
                                            <span v-else>{{ medicine.prices[0].price }}</span>
                                        </span>
                                        <del v-show="medicine.prices[0] ? medicine.prices[0].discount : ''">
                                            <span>{{ medicine.prices[0] ? medicine.prices[0].price  : ''}}</span>
                                        </del>
                                    </div>
                                </div>
                                <div class="overlay text ">
                                    <a href="javascript:void(0) " class="quick-view ">
                                        <i class="bi bi-eye "></i>
                                        <span>Quick View</span>
                                    </a>
                                </div>
                                <div class="item-quantity-editor add-btn-wrapper border-radius-small ">
                                    <button class="minus-quantity" @click="addToCart(medicine, 'minus')">–</button>
                                    <button type="button " class="add-to-bag" v-if="!is_cart" @click="addToCart(medicine, 'plus')">Add To Bag</button>
                                    <button type="button " class="add-to-bag" v-if="is_cart" @click="addToCart(medicine, 'plus')">{{ quantity }} in  Bag</button>
                                    <button class="plus-quantity" @click="addToCart(medicine, 'plus')">+</button>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-md-12">
                        <!-- <pagination :data="medicines" @pagination-change-page="getMedicines"></pagination> -->
                        <pagination :data="medicines" @pagination-change-page="getMedicines" :limit="3">
                            <span slot="prev-nav">&lt; Previous</span>
                            <span slot="next-nav">Next &gt;</span>
                        </pagination>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import ProductBox from '../components/CardProduct.vue';
export default {
    name: "Medicine",
    components:{ProductBox},
    data() {
        return {
            medicine:"",
            medicines: {},
            medicinePrice: '',
            is_cart: false,
        }
    },
    methods: {
        getMedicines(page = 1) {
            const _this = this;
            axios
                .get('api/v1/medicine?page=' + page)
                .then(response => {
                    if(response.status == 200) {
                        _this.medicines = response.data;
                    }
                }).catch(error => {
                    console.log(error)
                })
        },
    },
    mounted () {
        this.getMedicines();
    },
}
</script>