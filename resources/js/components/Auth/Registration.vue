<template>
    <div id="app-side-reg">
        <div class="cart-wrapper cus-transition login right-cart-close" :class="{'cart-open' : this.$store.state.regshow}">
            <div class="cart-container">
                <div class="cart-inner">
                    <!-- Cart Header -->
                    <div class="cart-header">
                        <div class="cart-header-icon">
                            <img src="/frontend/img/core/login.png" alt="bag" width="40">
                        </div>
                        <span class="cart-item-count">Registration</span>
                        <span class="close-cart" @click="closeCart">
                            Close 
                        </span>
                    </div>
                    <!-- Cart Body -->
                    <div class="cart-body">
                        <!-- Cart Login Container -->
                        <div class="login-form-wrap">
                            <form @submit.prevent="register" method="POST">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="app-input form-control mb-0" v-model="user.name"  >
                                    <span class="text-danger " v-if="errors.name">
                                        {{ errors.name[0] }}
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="app-input form-control mb-0" v-model="user.email">
                                    <span class="text-danger" v-if="errors.email">
                                        {{ errors.email[0] }}
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="app-input form-control mb-0" v-model="user.phone">
                                    <span class="text-danger " v-if="errors.phone">
                                        {{ errors.phone[0] }}
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="app-input form-control mb-0" v-model="user.password">
                                    <span class="text-danger " v-if="errors.password">
                                        {{ errors.password[0] }}
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" class="app-input form-control mb-0" v-model="user.password_confirmation">
                                    <span class="text-danger " v-if="errors.password_confirmation">
                                        {{ errors.password_confirmation[0] }}
                                    </span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="w-100 app-btn"> Registration </button>
                                </div>
                            </form>
                            <div class="redirect-link text-center font-bold">
                                <strong class="d-block mt-3">
                                    Already have account
                                    <i class="bi bi-chevron-down d-block"></i> 
                                </strong>
                                <button class="w-100 app-btn login-trigger" @click="showLogin">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
export default ({
    name: "Register",
    data(){
        return {
            user:{
                name:"",
                email:"",
                phone:"",
                password:"",
                password_confirmation:"",
                is_customer:"1"
            },
            errors: {},
        }
    },
    methods: {
        register(){
            axios.get('sanctum/csrf-cookie').then(response => {
                console.log(response)
                axios.post('/register',this.user).then(response => {
                    console.log(response)
                    // this.getCustomerData();

                    // this.$router.push({ name: 'home' });
                }).catch(error => { 
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                })
            });
        },
        getCustomerData() {
            axios.get('/api/v1/user',this.user).then(response => {
                let customer = response.data;
                this.$store.commit('SET_USER', customer);
            }).catch(error => {
                console.log(error);
            })
        },
        mounted() {
            this.getCustomerData();
        },
        showLogin() {
            this.$store.state.regshow = false;
            this.$store.state.loginshow = true;
        },
        closeCart() {
            const _this = this;
            _this.$store.state.regshow = false;
            _this.$store.state.backdrop = false;
        },
    }
})
</script>
<style scoped>
.cart-body {
    min-height: 90vh;
}
</style>