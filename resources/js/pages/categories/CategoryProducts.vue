<template>
    <div class="category-product">
        <!-- Related Category Banner Area -->
        <div class="common-banner-area">
            <div class="containe-fluidr">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <a href="javascript:void(0)" class="d-block banner-wrap" v-lazy-container="{ selector: 'img',loading: 'preloader.gif'}">
                            <img :data-src="'storage/uploads/product/category/' + this.$store.state.productCategories.banner" alt="banner" class="img-fluid">
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
                            <li class="breadcrumb-item"><a class="black-text" href="#">{{ this.$store.state.productCategories.name }}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <div v-show="this.$store.state.productCategories.subCategories.length > 0">
            <HomeProductCategory/>
        </div>
    </div>
</template>

<script>
import HomeProductCategory from '../../components/homes/HomeProductCategory.vue'
export default {
    name: "CommonCategory",
    components: {HomeProductCategory},
}
</script>