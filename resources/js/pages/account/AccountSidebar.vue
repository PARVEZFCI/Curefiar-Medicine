<template>
    <div>
        <div class="panel panel-default profile--panel">
            <div class="panel-body">
                <!-- <a href="profile.html" class="list-group-item" > <i class="bi bi-person" aria-hidden="true"></i> My Profile</a> -->
                <router-link to="/user/order" class="list-group-item" class-active="active"> <i class="bi bi-list" aria-hidden="true"></i> My Orders</router-link>
                <!-- <a href="payment.html" class="list-group-item" > <i class="bi bi-clock-history" aria-hidden="true"></i> Order History</a>
                <a href="password.html" class="list-group-item" ><i class="bi bi-key" aria-hidden="true"></i> Change Password</a>
                <a href="javascript:void(0)" class="list-group-item" ><i class="bi bi-lock" aria-hidden="true"></i> Logout</a> -->
            </div>
        </div>
    </div>
</template>
<style scoped>
    .panel-body a:active{
      background-color: indianred;
      cursor: pointer;
    }  
</style>