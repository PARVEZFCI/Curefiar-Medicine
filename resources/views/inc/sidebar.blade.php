<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="javascript:void(0)" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="/logo.png" srcset="/logo.png" alt="logo">
                <img class="logo-dark logo-img" src="/logo.png" srcset="/logo.png 2x" alt="logo-dark">
                <img class="logo-small logo-img logo-img-small" src="/logo.png" srcset="/logo.png 2x" alt="logo-small">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="/admin" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    {{-- <li class="nk-menu-item">
                        <a href="{{ route('administrators.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-alt"></em></span>
                            <span class="nk-menu-text">Administration</span>
                        </a>
                    </li><!-- .nk-menu-item --> --}}
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title="" title="">
                            <span class="nk-menu-icon"><em class="icon ni ni-plus-medi"></em></span>
                            <span class="nk-menu-text">Medicines</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('categories.index') }}" class="nk-menu-link" data-original-title="" title=""><span class="nk-menu-text">Dosage Form</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('generics.index') }}" class="nk-menu-link" data-original-title="" title=""><span class="nk-menu-text">Generic</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('manufactures.index') }}" class="nk-menu-link" data-original-title="" title=""><span class="nk-menu-text">Manufacture</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('units.index') }}" class="nk-menu-link" data-original-title="" title=""><span class="nk-menu-text">Unit</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('medicines.index') }}" class="nk-menu-link" data-original-title="" title=""><span class="nk-menu-text">Medicines</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title="" title="">
                            <span class="nk-menu-icon"><em class="icon ni ni-package-fill"></em></span>
                            <span class="nk-menu-text">Products</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('product-categories.index') }}" class="nk-menu-link" data-original-title="" title=""><span class="nk-menu-text">Category</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('product-sub-categories.index') }}" class="nk-menu-link" data-original-title="" title=""><span class="nk-menu-text">Sub Category</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('product-sub-subcategories.index') }}" class="nk-menu-link" data-original-title="" title=""><span class="nk-menu-text">Child Category</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('products.index') }}" class="nk-menu-link" data-original-title="" title=""><span class="nk-menu-text">Products</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('offers.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-offer"></em></span>
                            <span class="nk-menu-text">Offers</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('order.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Orders</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('customer.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">Customers</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle" data-original-title="" title="">
                            <span class="nk-menu-icon"><em class="icon ni ni-opt-alt-fill"></em></span>
                            <span class="nk-menu-text">Manage Site</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('setting.system') }}" class="nk-menu-link" data-original-title="" title=""><span class="nk-menu-text">General Setting</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('cities.index') }}" class="nk-menu-link" data-original-title="" title=""><span class="nk-menu-text">City</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('areas.index') }}" class="nk-menu-link" data-original-title="" title=""><span class="nk-menu-text">Area</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('testimonials.index') }}" class="nk-menu-link" data-original-title="" title=""><span class="nk-menu-text">Testimonial</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('promos.index') }}" class="nk-menu-link" data-original-title="" title=""><span class="nk-menu-text">Promo</span></a>
                            </li>

                        </ul><!-- .nk-menu-sub -->
                    </li>
                    <!-- <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Return to</h6>
                    </li> --><!-- .nk-menu-item -->
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>