<template>
    <div>
        <div class="header-wrapper cus-transition">
            <!-- Main Nav -->
            <nav class="navbar navbar-expand-lg main-nav">
                <div class="container-fluid">
                    
                    <!----- Start offcanvas trigger------>
                    <button class="sidebar navbar-toggler" :class="this.$store.state.show == true ? 'toggler-close' : ''" type="button"  @click="sidebarToggleInMbl">
                        <div class="hamBergerMenuIcon">
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </div>
                    </button>
                    <!----- End offcanvas trigger------>

                    <!-- Category collapse toggole component -->
                    <SidebarToggleButton @toggle-sidebar="$emit('toggle-sidebar')"/>
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <!-- <span class="navbar-toggler-icon"></span> -->
                        <div class="hamBergerMenuIcon" data-bs-target="#offcanvasExample">
                            <div class="bar1"></div>
                            <div class="bar2" style="width: 15px;margin-left: auto;"></div>
                            <div class="bar3"></div>
                        </div>
                    </button>

                    <div class="collapse navbar-collapse collapsed-nav nav-right-box" id="navbarSupportedContent">
                        <!-- <div class="search-form">
                            <form>
                                <div class="search input-group my-3 my-lg-0">
                                    <input type="text" class="form-control" placeholder="Search Product" v-model="search" @keyup="searchProduct">
                                </div>
                            </form>
                        </div> -->
                        <ul class="navbar-nav mr-auto mb-2 mb-lg-0 align-items-center">
                            <li class="nav-item">
                                <router-link to="/offers" class="nav-link">Offers</router-link>
                            </li>
                            <li class="nav-item dropdown">
                                <!-- <a class="nav-link dropdown-toggle language-dropdown" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-translate"></i> EN
                                    <i class="bi bi-chevron-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end language-list" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">EN</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">বাং</a></li>
                                </ul> -->
                                <!-- <select name="" id="" class="border-0">
                                    <option value="EN">EN</option>
                                    <option value="BN">BN</option>
                                </select> -->
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-question-lg"></i> Help</a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-translate"></i> Language</a>
                            </li> -->
                            <li class="nav-item" v-if="!user">
                                <router-link to="/login" class="nav-link login-trigger" id="login" href="javascript:void(0)" @click="showCart(2)">
                                    <i class="bi bi-lock"></i> Sign In
                                </router-link>
                            </li>
                            <li class="nav-item dropdown" v-if="user">
                                <a class="nav-link dropdown-toggle language-dropdown" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{user}}
                                    <i class="bi bi-chevron-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end language-list" aria-labelledby="navbarDropdown">
                                    <li><router-link class="dropdown-item" to="/user/order">Profile</router-link></li>
                                    <li><a class="dropdown-item" href="#" @click.prevent="logout">Logout</a></li>
                                </ul>
                            </li>
                            <li>
                                <!-- Navbar Logo -->    
                                <router-link to="/" class="navbar-logo">
                                    <img src="/frontend/img/logo/logo.png" alt="logo" width="140">
                                </router-link>
                            </li>
                        </ul>
                        
                    </div>

                    <!-- Show search related product -->
                    <center>
                        <div class="search-product-box cus-transition">
                            <div class="searh-product-list">
                                <div class="search-product">
                                    <div class="search-product-img">
                                        <a href="javascript:void(0)">
                                            <img src="/frontend/img/medicines/1.webp" alt="product" width="100">
                                        </a>
                                    </div>
                                    <div class="search-product-details">
                                        <a href="javscript:void(0)" class="search-product-name">
                                            Baby Care
                                        </a>
                                        <span class="search-item-price d-none">৳200</span>
                                        <div class="discount-box">
                                            <span class="search-item-price after-discount">৳100</span>
                                            <del class="search-item-price before-discount">৳200</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </center>

                </div>
            </nav>
        </div>
    </div>
</template>

<script>
import SidebarToggleButton from './SidebarToggleButton'
import CartCloseBtn from './Cart/CartCloseBtn.vue'
export default {
    name: "Header",
    props: ['user'],
    components: {SidebarToggleButton, CartCloseBtn},
    data() {
        return {
            show: 4,
            isLoggedIn: false,
        }
    },
    methods: {
        sidebarToggleInMbl() {
            const _this = this;
            // this.show = !this.show;
            _this.$store.commit('toggleSidebar', this.show);
        },
        showCart(cartType) {
            this.$store.commit('toggleSidebar', cartType);
        },
        logout() {
            localStorage.removeItem('token')
            localStorage.removeItem('user')
            window.location.reload();
        }
    },
}
</script>
<style scoped>
    .showPanel {
        right: 0;
    }   
    .toggler-close .hamBergerMenuIcon .bar1 {
        transform: rotate(45deg);
        position: relative;
        top: 2px;
    } 
    .toggler-close .hamBergerMenuIcon .bar3 {
        transform: rotate(-45deg);
    } 
    .toggler-close .hamBergerMenuIcon .bar2 {
        display: none;
    } 
</style>