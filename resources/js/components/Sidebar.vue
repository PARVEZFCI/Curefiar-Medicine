<template>
    <div class="offcanvas offcanvas-start sidebar-nav cate-sidebar" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body p-0">
            <nav class="navbar-light">
                <ul class="navbar-nav">
                    <!-- <li class="offer-nav-box">
                        <img src="/frontend/img/cart/10.png" alt="cate" class="sidenav-cate-img">
                        <div class="sidenav-cate-name-wrap">
                            <router-link to="/offers" class="nav-link px-2 sidebar-link">
                                <span>
                                    Offers 
                                    <label for="" class="badge badge-danger badge-outline">20</label>
                                </span>
                            </router-link>
                        </div>
                    </li> -->
                    <li class="offer-nav-box">
                        <!-- <img src="/medicine.png" alt="cate" class="sidenav-cate-img"> -->
                        <span class="category-name-first-letter">
                            M
                        </span>
                        <div class="sidenav-cate-name-wrap">
                            <router-link to="/medicines" class="nav-link px-2 sidebar-link">
                                <span>
                                    Medicines
                                </span>
                            </router-link>
                        </div>
                    </li>
                    <li v-for="category in categories" :key="category.id" >
                        <!-- <img v-lazy="'/storage/uploads/product/category/'+category.icon" alt="cate" class="sidenav-cate-img"> -->
                        <span class="category-name-first-letter">
                            {{category.name.slice(0,1)}}
                        </span>
                        <div class="sidenav-cate-name-wrap" data-bs-toggle="collapse" :data-bs-target="'#'+category.slug" aria-expanded="false" :aria-controls="category.slug">
                            <router-link 
                                :to="'/category/'+category.slug" 
                                class="nav-link px-2 sidebar-link" 
                                :class="category.slug == $route.path ? 'router-link-exact-active router-link-active' : ''">
                                <span>
                                    {{ category.name }} 
                                </span>
                                <span class="me-2" v-show="category.subCategories ? category.subCategories.length > 0 : ''"><i class="bi bi-chevron-right"></i></span>
                            </router-link>
                        </div>
                        <div class="collapse" :id="category.slug">
                            <ul class="navbar-nav ms-3">
                                <li v-for="subCategory in category.subCategories" :key="subCategory.id">
                                    <div class="sidenav-cate-name-wrap" :class="collapsed" data-bs-toggle="collapse" :data-bs-target="'#'+subCategory.slug" aria-expanded="false" :aria-controls="subCategory.slug">
                                        <router-link  
                                            :to="'/sub-category/'+subCategory.slug" 
                                            class="nav-link px-2 sidebar-link">
                                            <span>{{ subCategory.name }}</span>
                                            <span class="me-2"  v-show="subCategory.subsub_categories ? subCategory.subsub_categories.length > 0 : ''"><i class="bi bi-chevron-right"></i></span>
                                        </router-link>
                                    </div>
                                    <div class="collapse" :id="subCategory.slug">
                                        <ul class="navbar-nav ms-3">
                                            <li v-for="subSubCategory in subCategory.subsub_categories" :key="subSubCategory.id" >
                                                <router-link :to="'/sub-sub-category/' + subSubCategory.slug" class="nav-link sidebar-link px-2">
                                                    <span class="me-2"></span>
                                                    <span>{{ subSubCategory.name }}</span>
                                                </router-link>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Backdrop -->
        <div class="background-backdrop fade" :class="mobile"></div>
    </div>
</template>

<script>
    export default ({
        name: 'Sidebar',
        data() {
            return {
                categories: {},
                slug: '',
                collapsed: false,
                mobile: window.innerWidth <= 900,
            }
        },
        async mounted() {
            this.getCategories();
        },
        methods: {
            getCategories() {
                const _this = this;
                axios
                    .get('/api/v1/categories')
                    .then(response => {
                        if (response.status == 200) {
                            _this.categories = response.data;
                            _this.$store.commit('getCategory', response.data)
                        }
                    }).catch(error => {
                        console.log(error);
                    })
            }  
        },
    })
</script>
<style scoped>
 nav li div a.router-link-active span,
 nav li div a.router-link-exact-active span {
   color: #d93f37!important;
   font-weight: 600;
 }
</style>