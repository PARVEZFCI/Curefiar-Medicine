<template>
    <div class="category-related-area">
        <!-- Related Category Banner Area -->
        <div class="common-banner-area">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <a href="javascript:void(0)" class="d-block banner-wrap" v-lazy-container="{ selector: 'img',loading: 'preloader.gif'}">
                            <img :data-src="sub_category_banner ? '/storage/uploads/product/category/' + sub_category_banner : ''" alt="banner" class="img-fluid">
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
                            <li class="breadcrumb-item active">
                                {{ sub_category_name }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="this.categories.length > 0">
            <HomeProductCategory :categories="{categories}" categoryType="sub"/>
        </div>
        <div v-else>
            <div class="container-fluid">
                <div class="row ">
                    <ProductBox v-for="product in products" :key="product.id" :product="product"/>
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
            sub_slug: this.$route.params.slug,
            products: {},
            category_name: '',
            category_slug: '',
            sub_category_name: '',
            sub_category_banner: '',
            categories: {},
        }
    },
    methods: {
        getSubSubCateOrProduct() {
            const _this = this;
            axios
                .get(`/api/v1/sub-category/${_this.sub_slug}`)
                .then( response => {
                    if(response.status == 200) {
                        _this.category_banner = response.data[0].banner;
                        _this.category_name = response.data[0].category_name;
                        _this.category_slug = response.data[0].category_slug;
                        _this.sub_category_name = response.data[0].name;
                        _this.sub_category_banner = response.data[0].banner;
                        _this.products = response.data[0].products;
                        _this.categories = response.data[0].subSubCategories;
                    }
                }).catch( error => {
                    console.log(error);
                })
        }
    },
    mounted() {
        const _this = this;
        _this.getSubSubCateOrProduct();
    },
    watch: {
        '$route.params.slug': function() {
            this.$store.state.categories;
        }
    }
}
</script>