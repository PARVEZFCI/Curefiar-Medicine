<template>
    <div class="category-related-area">
        <!-- Related Category Banner Area -->
        <div class="common-banner-area">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <a href="javascript:void(0)" class="d-block banner-wrap" v-lazy-container="{ selector: 'img',loading: 'preloader.gif'}">
                            <img :data-src="sub_sub_category_banner ? '/storage/uploads/product/category/' + sub_sub_category_banner : ''" alt="banner" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- App Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb indigo lighten-4">
                            <li class="breadcrumb-item">
                                <router-link :to="'/category/'+category_slug" class="black-text">{{ category_name }}</router-link>
                                <i class="fa bi bi-chevron-right mx-2" aria-hidden="true"></i>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link :to="'/sub-category/' + sub_category_slug" class="black-text">{{ sub_category_name }}</router-link>
                                <i class="fa bi bi-chevron-right mx-2" aria-hidden="true"></i>
                            </li>
                            <li class="breadcrumb-item active">
                                {{ sub_sub_category_name }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="this.products.length > 0">
            <div class="container-fluid">
                <div class="row ">
                    <ProductBox v-for="product in products" :key="product.id" :product="product" type="product"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import HomeProductCategory from '../../components/homes/HomeProductCategory.vue';
import ProductBox from '../../components/CardProduct.vue';
export default {
    name: "SubCategoryWiseSubSubCategory",
    components:{HomeProductCategory, ProductBox},
    data() {
        return {
            slug: this.$route.params.slug,
            products: {},
            category_name: '',
            category_slug: '',
            sub_category_slug: '',
            sub_category_name: '',
            sub_sub_category_name: '',
            sub_sub_category_banner: '',
        }
    },
    methods: {
        getProducts() {
            const _this = this;
            axios
                .get(`/api/v1/sub-sub-category/${_this.slug}`)
                .then( response => {
                    if(response.status == 200) {
                        _this.sub_sub_category_name = response.data[0].name;
                        _this.sub_sub_category_banner = response.data[0].banner;
                        _this.category_name = response.data[0].category_name;
                        _this.category_slug = response.data[0].category_slug;
                        _this.sub_category_name = response.data[0].sub_category_name;
                        _this.sub_category_slug = response.data[0].sub_category_slug;
                        _this.products = response.data[0].products;
                    }
                }).catch( error => {
                    console.log(error);
                })
        }
    },
    mounted() {
        const _this = this;
        _this.getProducts();
    },
    watch: {
        '$route.params.slug': function() {
            this.getProducts()
        }
    }
}
</script>