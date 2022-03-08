// import Vue from "vue";
// import VueRouter from "vue-router";
// Vue.use(VueRouter);

// const routes = [
//     {
//         path: "/",
//         name: "home",
//         title: "Home",
//         component: () =>
//             import(
//                 "./pages/Home.vue"
//             ),
//     },
//     {
//         path: "/offers",
//         name: "offer",
//         title: "Offer",
//         component: () =>
//             import(
//                 "./pages/OfferProduct.vue"
//             ),
//     },
//     {
//         path: "/medicines",
//         name: "medicine",
//         title: "Medicine",
//         component: () =>
//             import(
//                 "./pages/Medicine.vue"
//             ),
//     },
//     {
//         path: '/category/:slug',
//         name: 'category',
//         component: () => import('./pages/categories/CategoryWiseSubCateOrProduct.vue'),
//         props: true,
//     },
//     {
//         path: '/sub-category/:slug',
//         name: 'subcategory',
//         component: () => import('./pages/categories/SubCategoryWiseSubSubCateOrProduct.vue'),
//         props: true,
//     },
//     {
//         path: '/sub-sub-category/:slug',
//         name: 'subsubcategory',
//         component: () => import('./pages/categories/ChildCategoryWiseProduct.vue'),
//         props: true,
//     },
//     {   
//         path: '/search/:searchText',
//         name: 'search',
//         component: () => import('./pages/ProductSearch.vue'),
       
//     },
//     {   
//         name: 'login',
//         path: '/login',
//         title: 'Login',
//         component: () => import('./pages/auth/Login.vue'),
//     },
//     {   
//         name: 'register',
//         path: '/register',
//         title: 'Register',
//         component: () => import('./pages/auth/Registration.vue'),
//     },
  
//     {
//         path: "/checkout",
//         name: "checkout",
//         title: "Checkout",
//         component: () =>
//             import(
//                 "./pages/Checkout.vue"
//             ),
//     },
//     {
//         path: "/payment",
//         name: "payment",
//         title: "Payment",
//         component: () =>
//             import(
//                 "./pages/Payment.vue"
//             ),
//     },
//     {
//         path: "/user/profile",
//         name: "profile",
//         title: "Profile",
//         component: () =>
//             import(
//                 "./pages/account/CustomerProfile.vue"
//             ),
//     },
//     {
//         path: "/user/order",
//         name: "order",
//         title: "Order",
//         component: () =>
//             import(
//                 "./pages/account/CustomerOrder.vue"
//             ),
//     },
//     {
//         path: '*',
//         name: '404',
//         component: () =>
//             import(
//                 "./pages/errors/Error404.vue"
//             ),
//     }
// ];



// export default new VueRouter({
//     mode: "history",
//     routes: routes
// });
