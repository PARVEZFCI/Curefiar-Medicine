<template>
    <div class="account mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2">
                    <div class="panel panel-default profile--panel">
                        <div class="panel-body">
                            <a href="javascript:void(0)" class="list-group-item"> <i class="bi bi-person" aria-hidden="true"></i> My Profile</a>
                            <a href="order.html" class="list-group-item"> <i class="bi bi-list" aria-hidden="true"></i> My Orders</a>
                            <a href="payment.html" class="list-group-item"> <i class="bi bi-clock-history" aria-hidden="true"></i> Order History</a>
                            <a href="password.html" class="list-group-item"><i class="bi bi-key" aria-hidden="true"></i> Change Password</a>
                            <a href="javascript:void(0)" class="list-group-item"><i class="bi bi-lock" aria-hidden="true"></i> Logout</a>


                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-10">
                    <div class="left-side">
                        <div class="title">
                            <a href="#"> My Profile</a>
                        </div>
                        <div class="profile">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="" placeholder="Enter Your Name" class=" required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="" placeholder="Enter Your Email" class="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input type="number" name="" placeholder="Enter Your Phone Number" class="required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" name="" placeholder="Enter Your Address" class="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="" placeholder="Enter Your Password" class="required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="" placeholder="Enter Your Confirm Password" class="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center mt-4">
                                    <button class="s-profile ">Save Profile</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>