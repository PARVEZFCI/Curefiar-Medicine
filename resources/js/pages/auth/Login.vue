<template>
    <div class="login-section">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-4">
                    <div class="login-left my-5">
                        <div class="flex-box">
                            <div class="login-with-mobile-box around-box" :class="{ 'login-system-active': isActive }" @click="loginBy()">
                                Login with email
                            </div>
                            <div class="divider">OR</div>
                            <div class="login-with-email-box around-box" :class="{ 'login-system-active': !isActive }" @click="loginBy()">
                                Login with mobile
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <!-- Cart Login Container -->
                            <div class="login-form-wrap">
                                <form @submit.prevent="login" method="POST" v-if="isActive">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="app-input form-control mb-0" v-model="user.email" required>
                                        <span class="text-danger " v-if="errors.email">
                                            {{ errors.email[0] }}
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="app-input form-control mb-0" v-model="user.password" required>
                                        <span class="text-danger " v-if="errors.password">
                                            {{ errors.password[0] }}
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label>
                                            <input type="checkbox" checked="checked" name="remember" style="width: unset"> Remember me
                                        </label>
                                        <!-- <a href="#">Forget Password</a> -->
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="w-100 app-btn"> Sign In </button>
                                    </div>

                                    <div class="redirect-link text-center font-bold">
                                        <span class="extra-line">
                                            <span>New to shombhob?</span>
                                            <router-link to="/register" class="text-danger">Sign Up</router-link>
                                        </span>
                                    </div>
                                </form>
                                <!-- Login with mobile -->
                                <form @submit.prevent="login" method="POST" v-if="!isActive">
                                    <h2><strong class="text-danger">Login with mobile system comming soon</strong></h2>
                                    <div class="form-group">
                                        <label for="">Mobile</label>
                                        <input type="number" class="app-input form-control mb-0" placeholder="e.g: 0184765676" required v-model="user.phone">
                                        <span class="text-danger">
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="w-100 app-btn"> Login </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</template>
<script>
export default ({
    name: "Register",
    data(){
        return {
            user:{
                name:"",
                email:"",
                phone:"",
                password:"",
                is_customer:"1"
            },
            errors: {},
            isActive: true,
        }
    },
    mounted() {
        if (User.isLoggedIn()) {
            this.$router.push({ name: 'home' });
        }
    },
    methods: {
        loginBy() {
            this.isActive = !this.isActive
        },
        login() {
            axios.post('/api/auth/login',this.user).then((response) => {
                User.responseAfterLogin(response)
                // this.$router.push({ name: 'home' });
                window.location.href = '/';
            }).catch(error => { 
                console.log(error.response.status);
                if(error.response.status == 401) {
                    this.$notify({
                        group: 'auth',
                        type: 'error',
                        // title: 'Error',
                        duration: 1000,
                        speed: 1000,
                        text: 'Email Or Password Not Valid'
                    });
                }
                // if (error.response.status == 422) {
                //     this.errors = error.response.data.errors;
                // }
            })
        },
    },
})
</script>
<style scoped>
.login-section {
    margin-top: 50px;
}
.login-section .card {
    height: auto;
    align-items: center;
    flex-direction: inherit;
}
.login-section .card form label {
    margin-bottom: 5px;
    font-weight: 600;
    color: #726767;
}
.login-section .card form .form-group {
    margin-bottom: 20px;
}
.login-left .flex-box {
    text-align: center;
    max-width: 300px;
    margin: 0 auto;
}

.login-left .flex-box .around-box {
    /* border: 1px solid gray; */
    max-width: 100%;
    text-align: center;
    padding: 12px;
    box-shadow: 0px 0px 5px 0px rgb(237 121 115);
    font-weight: 500;
    font-family: sans-serif;
    font-size: 17px;
    letter-spacing: .5px;
    cursor: pointer;
}

.login-left .flex-box .divider {
    margin: 20px 0px;
    font-weight: 600;
    font-family: cursive;
    font-size: 20px;
    letter-spacing: 1px;
    color: #726767;
}
.login-system-active {
    background: rgb(229 88 81);
    color: #fff;
}
</style>