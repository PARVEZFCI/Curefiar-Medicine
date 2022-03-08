"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[331],{5609:(t,e,a)=>{a.d(e,{Z:()=>r});var s=a(3645),i=a.n(s)()((function(t){return t[1]}));i.push([t.id,"del{font-size:12px}",""]);const r=i},3645:t=>{t.exports=function(t){var e=[];return e.toString=function(){return this.map((function(e){var a=t(e);return e[2]?"@media ".concat(e[2]," {").concat(a,"}"):a})).join("")},e.i=function(t,a,s){"string"==typeof t&&(t=[[null,t,""]]);var i={};if(s)for(var r=0;r<this.length;r++){var n=this[r][0];null!=n&&(i[n]=!0)}for(var c=0;c<t.length;c++){var o=[].concat(t[c]);s&&i[o[0]]||(a&&(o[2]?o[2]="".concat(a," and ").concat(o[2]):o[2]=a),e.push(o))}},e}},3379:(t,e,a)=>{var s,i=function(){return void 0===s&&(s=Boolean(window&&document&&document.all&&!window.atob)),s},r=function(){var t={};return function(e){if(void 0===t[e]){var a=document.querySelector(e);if(window.HTMLIFrameElement&&a instanceof window.HTMLIFrameElement)try{a=a.contentDocument.head}catch(t){a=null}t[e]=a}return t[e]}}(),n=[];function c(t){for(var e=-1,a=0;a<n.length;a++)if(n[a].identifier===t){e=a;break}return e}function o(t,e){for(var a={},s=[],i=0;i<t.length;i++){var r=t[i],o=e.base?r[0]+e.base:r[0],u=a[o]||0,d="".concat(o," ").concat(u);a[o]=u+1;var l=c(d),p={css:r[1],media:r[2],sourceMap:r[3]};-1!==l?(n[l].references++,n[l].updater(p)):n.push({identifier:d,updater:g(p,e),references:1}),s.push(d)}return s}function u(t){var e=document.createElement("style"),s=t.attributes||{};if(void 0===s.nonce){var i=a.nc;i&&(s.nonce=i)}if(Object.keys(s).forEach((function(t){e.setAttribute(t,s[t])})),"function"==typeof t.insert)t.insert(e);else{var n=r(t.insert||"head");if(!n)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");n.appendChild(e)}return e}var d,l=(d=[],function(t,e){return d[t]=e,d.filter(Boolean).join("\n")});function p(t,e,a,s){var i=a?"":s.media?"@media ".concat(s.media," {").concat(s.css,"}"):s.css;if(t.styleSheet)t.styleSheet.cssText=l(e,i);else{var r=document.createTextNode(i),n=t.childNodes;n[e]&&t.removeChild(n[e]),n.length?t.insertBefore(r,n[e]):t.appendChild(r)}}function v(t,e,a){var s=a.css,i=a.media,r=a.sourceMap;if(i?t.setAttribute("media",i):t.removeAttribute("media"),r&&"undefined"!=typeof btoa&&(s+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(r))))," */")),t.styleSheet)t.styleSheet.cssText=s;else{for(;t.firstChild;)t.removeChild(t.firstChild);t.appendChild(document.createTextNode(s))}}var _=null,m=0;function g(t,e){var a,s,i;if(e.singleton){var r=m++;a=_||(_=u(e)),s=p.bind(null,a,r,!1),i=p.bind(null,a,r,!0)}else a=u(e),s=v.bind(null,a,e),i=function(){!function(t){if(null===t.parentNode)return!1;t.parentNode.removeChild(t)}(a)};return s(t),function(e){if(e){if(e.css===t.css&&e.media===t.media&&e.sourceMap===t.sourceMap)return;s(t=e)}else i()}}t.exports=function(t,e){(e=e||{}).singleton||"boolean"==typeof e.singleton||(e.singleton=i());var a=o(t=t||[],e);return function(t){if(t=t||[],"[object Array]"===Object.prototype.toString.call(t)){for(var s=0;s<a.length;s++){var i=c(a[s]);n[i].references--}for(var r=o(t,e),u=0;u<a.length;u++){var d=c(a[u]);0===n[d].references&&(n[d].updater(),n.splice(d,1))}a=r}}}},5231:(t,e,a)=>{a.d(e,{Z:()=>o});const s={name:"ProductBox",props:["product","type"],data:function(){return{cartProduct:{},is_cart:!1}},methods:{addToCart:function(t,e){this.$store.commit("ADD_TO_CART",{product:t,incType:e})}},computed:{quantity:function(){var t=this,e=this.$store.getters.getCart,a="";if(e.length)return e.forEach((function(e){t.product&&e.id===t.product.id&&(t.is_cart=!0,a=e.qty)})),a}},watch:{quantity:function(t,e){return t}}};var i=a(3379),r=a.n(i),n=a(5609),c={insert:"head",singleton:!1};r()(n.Z,c);n.Z.locals;const o=(0,a(1900).Z)(s,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return"medicine"==t.type?a("div",{staticClass:"col-6 col-xl-3 col-lg-3 col-md-3 col-md-3-half"},[a("div",{staticClass:"item mb-5"},[a("div",{staticClass:"item-inner "},[a("div",{staticClass:"item-img "},[a("img",{staticClass:"item-thumbnail",attrs:{src:t.product.image?"/storage/uploads/medicines/"+t.product.image:"/image.svg",alt:t.product.name}})]),t._v(" "),a("div",{staticClass:"item-desc "},[a("div",{staticClass:"item-name "},[t._v(t._s(t.product.name))]),t._v(" "),a("div",{staticClass:"item-sub-text "},[t._v(t._s(t.product.prices[0]?t.product.prices[0].unit.unit_name:""))]),t._v(" "),a("div",{directives:[{name:"show",rawName:"v-show",value:t.product.prices[0],expression:"product.prices[0]"}],staticClass:"price t-font-family"},[a("span",[t._v("৳ ")]),t._v(" "),t.product.prices[0]?a("span",[t.product.prices[0].discount?a("span",[t._v(t._s(t.product.prices[0].discount_price))]):a("span",[t._v(t._s(t.product.prices[0].price))])]):t._e(),t._v(" "),a("del",{directives:[{name:"show",rawName:"v-show",value:t.product.prices[0]?t.product.prices[0].discount:"",expression:"product.prices[0] ? product.prices[0].discount : ''"}]},[a("span",[t._v(t._s(t.product.prices[0]?t.product.prices[0].price:""))])])])]),t._v(" "),t._m(0),t._v(" "),a("div",{staticClass:"item-quantity-editor add-btn-wrapper border-radius-small "},[a("button",{staticClass:"minus-quantity",on:{click:function(e){return t.addToCart(t.product,"minus")}}},[t._v("–")]),t._v(" "),t.is_cart?t._e():a("button",{staticClass:"add-to-bag",attrs:{type:"button "},on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v("Add To Bag")]),t._v(" "),t.is_cart?a("button",{staticClass:"add-to-bag",attrs:{type:"button "},on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v(t._s(t.quantity)+" in  Bag")]):t._e(),t._v(" "),a("button",{staticClass:"plus-quantity",on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v("+")])])])])]):a("div",{staticClass:"col-6 col-xl-3 col-lg-4 col-md-4 col-md-3-half"},[t.product?a("div",{staticClass:"item"},[a("div",{staticClass:"item-inner "},[a("div",{staticClass:"item-img "},[a("img",{staticClass:"item-thumbnail",attrs:{src:t.product.thumbnail_image?"/storage/uploads/product/"+t.product.thumbnail_image:"",alt:"item "}})]),t._v(" "),a("div",{staticClass:"item-desc "},[a("div",{staticClass:"item-name "},[t._v(t._s(t.product.name))]),t._v(" "),a("div",{staticClass:"item-sub-text "},[t._v(t._s(t.product.unit?t.product.unit:""))]),t._v(" "),a("div",{staticClass:"price t-font-family"},[a("span",[t._v("৳ ")]),t._v(" "),a("span",[t._v(t._s(t.product.discount?t.product.discount_price:t.product.price))]),t._v(" "),a("del",{directives:[{name:"show",rawName:"v-show",value:t.product.discount,expression:"product.discount"}]},[a("span",[t._v(t._s(t.product.price))])])])]),t._v(" "),t._m(1),t._v(" "),a("div",{staticClass:"item-quantity-editor add-btn-wrapper border-radius-small "},[a("button",{staticClass:"minus-quantity",on:{click:function(e){return t.addToCart(t.product,"minus")}}},[t._v("–")]),t._v(" "),t.is_cart?t._e():a("button",{staticClass:"add-to-bag",attrs:{type:"button "},on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v("Add To Bag")]),t._v(" "),t.is_cart?a("button",{staticClass:"add-to-bag",attrs:{type:"button "},on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v(t._s(t.quantity)+" in  Bag")]):t._e(),t._v(" "),a("button",{staticClass:"plus-quantity",on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v("+")])])])]):t._e()])}),[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"overlay text "},[a("a",{staticClass:"quick-view ",attrs:{href:"javascript:void(0) "}},[a("i",{staticClass:"bi bi-eye "}),t._v(" "),a("span",[t._v("Quick View")])])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"overlay text "},[a("a",{staticClass:"quick-view ",attrs:{href:"javascript:void(0) "}},[a("i",{staticClass:"bi bi-eye "}),t._v(" "),a("span",[t._v("Quick View")])])])}],!1,null,null,null).exports},8599:(t,e,a)=>{a.d(e,{Z:()=>i});const s={name:"ProductSubcategory",props:["categories","categoryType"],computed:{currentRouteName:function(){return this.$route.name}}};const i=(0,a(1900).Z)(s,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"item-categories-area"},[a("div",{staticClass:"container-fluid"},["home"==this.currentRouteName?a("div",{staticClass:"row justify-content-center"},t._l(this.$store.state.categories,(function(e){return a("div",{key:e.id,staticClass:"col-6 col-xl-2 col-lg-3 col-md-3"},[a("div",{staticClass:"item-categories cus-transition"},[a("router-link",{staticClass:"d-block",attrs:{to:"/"+e.slug}},[a("div",{staticClass:"item-category-img bg-white"},[a("img",{staticClass:"img-fluid",attrs:{src:"/storage/uploads/product/category/"+e.image,alt:"category",width:"150"}})]),t._v(" "),a("div",{staticClass:"item-category-info"},[t._v("\n                            "+t._s(e.name)+"\n                        ")])])],1)])})),0):a("div",{staticClass:"row justify-content-center"},t._l(t.categories.categories,(function(e){return a("div",{key:e.id,staticClass:"col-6 col-xl-2 col-lg-3 col-md-3"},["sub"==t.categoryType?a("div",[a("div",{staticClass:"item-categories cus-transition"},[a("router-link",{staticClass:"d-block",attrs:{to:"/sub-sub-category/"+e.slug}},[a("div",{staticClass:"item-category-img bg-white"},[a("img",{staticClass:"img-fluid",attrs:{src:"/storage/uploads/product/category/"+e.image,alt:"category",width:"150"}})]),t._v(" "),a("div",{staticClass:"item-category-info"},[t._v("\n                                "+t._s(e.name)+"\n                            ")])])],1)]):a("div",[a("div",{staticClass:"item-categories cus-transition"},[a("router-link",{staticClass:"d-block",attrs:{to:"/sub-category/"+e.slug}},[a("div",{staticClass:"item-category-img bg-white"},[a("img",{staticClass:"img-fluid",attrs:{src:"/storage/uploads/product/category/"+e.image,alt:"category",width:"150"}})]),t._v(" "),a("div",{staticClass:"item-category-info"},[t._v("\n                                "+t._s(e.name)+"\n                            ")])])],1)])])})),0)])])}),[],!1,null,null,null).exports},8331:(t,e,a)=>{a.r(e),a.d(e,{default:()=>n});var s=a(8599),i=a(5231);const r={name:"SubCategoryWiseSubSubCategory",components:{HomeProductCategory:s.Z,ProductBox:i.Z},data:function(){return{slug:this.$route.params.slug,products:{},category_name:"",category_slug:"",sub_category_slug:"",sub_category_name:"",sub_sub_category_name:"",sub_sub_category_banner:""}},methods:{getProducts:function(){var t=this;axios.get("/api/v1/sub-sub-category/".concat(t.slug)).then((function(e){200==e.status&&(t.sub_sub_category_name=e.data[0].name,t.sub_sub_category_banner=e.data[0].banner,t.category_name=e.data[0].category_name,t.category_slug=e.data[0].category_slug,t.sub_category_name=e.data[0].sub_category_name,t.sub_category_slug=e.data[0].sub_category_slug,t.products=e.data[0].products)})).catch((function(t){console.log(t)}))}},mounted:function(){this.getProducts()},watch:{"$route.params.slug":function(){this.getProducts()}}};const n=(0,a(1900).Z)(r,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"category-related-area"},[a("div",{staticClass:"common-banner-area"},[a("div",{staticClass:"container-fluid"},[a("div",{staticClass:"row justify-content-center"},[a("div",{staticClass:"col-md-8"},[a("a",{staticClass:"d-block banner-wrap",attrs:{href:"javascript:void(0)"}},[a("img",{staticClass:"img-fluid",attrs:{src:t.sub_sub_category_banner?"/storage/uploads/product/category/"+t.sub_sub_category_banner:"",alt:"banner"}})])])])])]),t._v(" "),a("div",{staticClass:"breadcrumb-area"},[a("div",{staticClass:"container-fluid"},[a("div",{staticClass:"row"},[a("div",{staticClass:"col-md-12"},[a("ol",{staticClass:"breadcrumb indigo lighten-4"},[a("li",{staticClass:"breadcrumb-item"},[a("router-link",{staticClass:"black-text",attrs:{to:"/"+t.category_slug}},[t._v(t._s(t.category_name))]),t._v(" "),a("i",{staticClass:"fa bi bi-chevron-right mx-2",attrs:{"aria-hidden":"true"}})],1),t._v(" "),a("li",{staticClass:"breadcrumb-item"},[a("router-link",{staticClass:"black-text",attrs:{to:"/sub-category/"+t.sub_category_slug}},[t._v(t._s(t.sub_category_name))]),t._v(" "),a("i",{staticClass:"fa bi bi-chevron-right mx-2",attrs:{"aria-hidden":"true"}})],1),t._v(" "),a("li",{staticClass:"breadcrumb-item active"},[t._v("\n                            "+t._s(t.sub_sub_category_name)+"\n                        ")])])])])])]),t._v(" "),this.products.length>0?a("div",[a("div",{staticClass:"container-fluid"},[a("div",{staticClass:"row "},t._l(t.products,(function(t){return a("ProductBox",{key:t.id,attrs:{product:t,type:"product"}})})),1)])]):t._e()])}),[],!1,null,null,null).exports},1900:(t,e,a)=>{function s(t,e,a,s,i,r,n,c){var o,u="function"==typeof t?t.options:t;if(e&&(u.render=e,u.staticRenderFns=a,u._compiled=!0),s&&(u.functional=!0),r&&(u._scopeId="data-v-"+r),n?(o=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),i&&i.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(n)},u._ssrRegister=o):i&&(o=c?function(){i.call(this,(u.functional?this.parent:this).$root.$options.shadowRoot)}:i),o)if(u.functional){u._injectStyles=o;var d=u.render;u.render=function(t,e){return o.call(e),d(t,e)}}else{var l=u.beforeCreate;u.beforeCreate=l?[].concat(l,o):[o]}return{exports:t,options:u}}a.d(e,{Z:()=>s})}}]);