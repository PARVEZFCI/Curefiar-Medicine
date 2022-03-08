<template>
    <div id="app-side-login">
        <div class="cart-wrapper cus-transition login right-cart-close" :class="{'cart-open' : this.$store.state.loginshow}">
            <div class="cart-container">
                <div class="cart-inner">
                    <!-- Login Area -->
                    <div id="login-panel">
                        <!-- Cart Header -->
                        <div class="cart-header">
                            <div class="cart-header-icon">
                                <img src="/frontend/img/core/login.png" alt="bag" width="40">
                            </div>
                            <span class="cart-item-count">Login</span>
                            <span class="close-cart" @click="closeCart">
                                Close 
                            </span>
                        </div>
                        <!-- Cart Body -->
                        <div class="cart-body">
                            <!-- Cart Login Container -->
                            <div class="login-form-wrap">
                                <form action="">
                                    <div class="form-group">
                                        <label for="">Email Or Phone</label>
                                        <input type="text" class="app-input form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="text" class="app-input form-control">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <input id="vehicle1" class="rem-check-input" name="vehicle1" type="checkbox" value="Bike">
                                            <label for="vehicle1">Remember Me</label>
                                        </div>
                                        <div class="form-group">
                                            <a href="javascript:void(0)" style="font-size:15px;color:rgb(90, 80, 230)!important">
                                                Forget Password
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button class="w-100 app-btn">Login</button>
                                    </div>
                                </form>
                                <div class="redirect-link text-center font-bold">
                                    <strong class="d-block mt-3">
                                        New Here ?
                                        <i class="bi bi-chevron-down d-block"></i> 
                                    </strong>
                                    <button class="w-100 app-btn reg-trigger" @click="showReg()">Create An Account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Reg. Area -->
                    <div id="reg-panel" class="d-none">
                        <!-- Cart Header -->
                        <div class="cart-header">
                            <div class="cart-header-icon">
                                <img src="/frontend/img/core/login.png" alt="bag" width="40">
                            </div>
                            <span class="cart-item-count">Registration</span>
                            <span class="close-cart">
                                Close 
                            </span>
                        </div>
                        <!-- Cart Body -->
                        <div class="cart-body">
                            <!-- Cart Login Container -->
                            <div class="login-form-wrap">
                                <form action="">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="app-input form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="app-input form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" class="app-input form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="text" class="app-input form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="text" class="app-input form-control">
                                    </div>
                                    <strong class="mb-3">Address</strong>
                                    <br>
                                    <div class="form-group">
                                        <label for="">City</label>
                                        <select name="" id="" class="app-input form-control">
                                    <option value="">--select city--</option>
                                    <option value="">Dhaka</option>
                                </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Area</label>
                                        <select name="" id="" class="app-input form-control">
                                    <option value="">--select area--</option>
                                    <option value="">Dhaka</option>
                                </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea name="" id="" cols="40" rows="10" class="app-input form-control"></textarea>
                                    </div><br>
                                    <div class="form-group">
                                        <button class="w-100 app-btn">Registration</button>
                                    </div>
                                </form>
                                <div class="redirect-link text-center font-bold">
                                    <strong class="d-block mt-3">
                            Already have account
                            <i class="bi bi-chevron-down d-block"></i> 
                        </strong>
                                    <button class="w-100 app-btn login-trigger">Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import CartCloseBtn from '../Cart/CartCloseBtn.vue'
export default ({
    name: "Login",
    components: {CartCloseBtn},
    methods: {
        showReg() {
            this.$store.state.loginshow = false;
            this.$store.state.regshow = true;
        },

        closeCart() {
            const _this = this;
            //  _this.$store.commit('toggleSidebar', true);
            _this.$store.state.loginshow = false;
            _this.$store.state.backdrop = false;
        }
    }
})
</script>