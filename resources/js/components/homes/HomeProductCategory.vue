<template v-if="categories">
    <div class="item-categories-area">
        <div class="container-fluid">
            <div class="row justify-content-center" v-if="this.currentRouteName == 'home'">
                <div class="col-6 col-xl-2 col-lg-3 col-md-3" v-for="category in this.$store.state.categories" :key="category.id">
                    <div class="item-categories cus-transition">
                        <router-link :to="'/category/'+category.slug" class="d-block">
                            <div class="item-category-img" v-lazy-container="{ selector: 'img',loading: 'preloader.gif'}">
                                <img :data-src="'/storage/uploads/product/category/' + category.image" class="img-fluid" alt="category" width="150">
                            </div>
                            <div class="item-category-info">
                                {{ category.name }}
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" v-else>
                <div class="col-6 col-xl-2 col-lg-3 col-md-3" v-for="category in categories.categories" :key="category.id">
                    <div v-if="categoryType == 'sub'">
                        <div class="item-categories cus-transition">
                            <router-link :to="'/sub-sub-category/'+category.slug" class="d-block">
                                <div class="item-category-img" v-lazy-container="{ selector: 'img',loading: 'preloader.gif'}">
                                    <img :data-src="'/storage/uploads/product/category/' + category.image" class="img-fluid" alt="category" width="150">
                                </div>
                                <div class="item-category-info">
                                    {{ category.name }}
                                </div>
                            </router-link>
                        </div>
                    </div>
                    <div v-else>
                        <div class="item-categories cus-transition">
                            <router-link :to="'/sub-category/'+category.slug" class="d-block">
                                <div class="item-category-img">
                                    <img :src="'/storage/uploads/product/category/' + category.image" class="img-fluid" alt="category" width="150">
                                </div>
                                <div class="item-category-info">
                                    {{ category.name }}
                                </div>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'ProductSubcategory',
    props: ['categories', 'categoryType'],
    computed: {
        currentRouteName() {
            return this.$route.name;
        }
    }
}
</script>