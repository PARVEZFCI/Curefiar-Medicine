<template>
    <div class="category-related-area">
        <!-- Related Category Banner Area -->
        <div class="common-banner-area">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <a href="javascript:void(0)" class="d-block banner-wrap" v-lazy-container="{ selector: 'img',loading: 'preloader.gif'}">
                          <img :data-src="category_banner ? '/storage/uploads/product/category/' + category_banner : ''" alt="banner" class="img-fluid">
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
                                <a class="black-text" href="#">{{ category_name }}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="this.categories.length > 0">
            <HomeProductCategory :categories="{categories}"/>
        </div>
        <div v-else>
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
    name: "CategoryWiseSubCategory",
    components:{HomeProductCategory, ProductBox},
    data() {
        return {
            slug: this.$route.params.slug,
            loading: false,
            products: {},
            category_name: '',
            category_banner: '',
            categories: {},
        }
    },
    mounted() {
        const _this = this;
        _this.getSubCateOrProduct();
    },
    methods: {
        getSubCateOrProduct() {
            const _this = this;
            axios
                .get(`/api/v1/category/${this.slug}`)
                .then( response => {
                    if(response.status == 200) {
                        _this.category_name = response.data[0].name;
                        _this.category_banner = response.data[0].banner;
                        _this.products = response.data[0].products ? response.data[0].products: '';
                        _this.categories = response.data[0].subCategories ? response.data[0].subCategories: '';
                    }
                }).catch( error => {
                    console.log(error);
                })
        }
    },
    watch: {
        '$route.params.slug': function(slug) {
            this.getSubCateOrProduct();
        }
    }
}
</script>