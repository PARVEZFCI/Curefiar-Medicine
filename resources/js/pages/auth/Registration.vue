<template>
    <div class="login-section">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <!-- <div class="col-md-4">
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
                </div> -->
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <!-- Cart Login Container -->
                            <div class="login-form-wrap">
                                <form @submit.prevent="register" method="POST">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="app-input form-control mb-0" v-model="user.name" required>
                                        <span class="text-danger " v-if="errors.name">
                                            {{ errors.name }}
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="app-input form-control mb-0" v-model="user.email" required>
                                        <span class="text-danger " v-if="errors.email">
                                            {{ errors.email }}
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="app-input form-control mb-0" v-model="user.password">
                                        <span class="text-danger " v-if="errors.password">
                                            {{ errors.password }}
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="w-100 app-btn"> Sign Up </button>
                                    </div>
                                    <div class="redirect-link text-center font-bold">
                                        <span class="extra-line">
                                            <span>Already have an account?</span>
                                            <router-link to="/login" class="text-danger">Sign In</router-link>
                                        </span>
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
        ...mapActions({
            signIn:'/login'
        }),
        register() {
            axios.post('/api/auth/register',this.user)
            .then((response) => {
                User.responseAfterLogin(response)
                window.location.href = "/";
                // this.$router.push({ name: 'home' });
            }).catch(error => { 
                if(error.response.status == 400) {
                    this.errors = error.response.data;
                }
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