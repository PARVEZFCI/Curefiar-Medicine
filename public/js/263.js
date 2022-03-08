"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[263],{5609:(t,e,s)=>{s.d(e,{Z:()=>r});var a=s(3645),i=s.n(a)()((function(t){return t[1]}));i.push([t.id,"del{font-size:12px}",""]);const r=i},3645:t=>{t.exports=function(t){var e=[];return e.toString=function(){return this.map((function(e){var s=t(e);return e[2]?"@media ".concat(e[2]," {").concat(s,"}"):s})).join("")},e.i=function(t,s,a){"string"==typeof t&&(t=[[null,t,""]]);var i={};if(a)for(var r=0;r<this.length;r++){var n=this[r][0];null!=n&&(i[n]=!0)}for(var c=0;c<t.length;c++){var o=[].concat(t[c]);a&&i[o[0]]||(s&&(o[2]?o[2]="".concat(s," and ").concat(o[2]):o[2]=s),e.push(o))}},e}},3379:(t,e,s)=>{var a,i=function(){return void 0===a&&(a=Boolean(window&&document&&document.all&&!window.atob)),a},r=function(){var t={};return function(e){if(void 0===t[e]){var s=document.querySelector(e);if(window.HTMLIFrameElement&&s instanceof window.HTMLIFrameElement)try{s=s.contentDocument.head}catch(t){s=null}t[e]=s}return t[e]}}(),n=[];function c(t){for(var e=-1,s=0;s<n.length;s++)if(n[s].identifier===t){e=s;break}return e}function o(t,e){for(var s={},a=[],i=0;i<t.length;i++){var r=t[i],o=e.base?r[0]+e.base:r[0],u=s[o]||0,d="".concat(o," ").concat(u);s[o]=u+1;var l=c(d),p={css:r[1],media:r[2],sourceMap:r[3]};-1!==l?(n[l].references++,n[l].updater(p)):n.push({identifier:d,updater:g(p,e),references:1}),a.push(d)}return a}function u(t){var e=document.createElement("style"),a=t.attributes||{};if(void 0===a.nonce){var i=s.nc;i&&(a.nonce=i)}if(Object.keys(a).forEach((function(t){e.setAttribute(t,a[t])})),"function"==typeof t.insert)t.insert(e);else{var n=r(t.insert||"head");if(!n)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");n.appendChild(e)}return e}var d,l=(d=[],function(t,e){return d[t]=e,d.filter(Boolean).join("\n")});function p(t,e,s,a){var i=s?"":a.media?"@media ".concat(a.media," {").concat(a.css,"}"):a.css;if(t.styleSheet)t.styleSheet.cssText=l(e,i);else{var r=document.createTextNode(i),n=t.childNodes;n[e]&&t.removeChild(n[e]),n.length?t.insertBefore(r,n[e]):t.appendChild(r)}}function v(t,e,s){var a=s.css,i=s.media,r=s.sourceMap;if(i?t.setAttribute("media",i):t.removeAttribute("media"),r&&"undefined"!=typeof btoa&&(a+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(r))))," */")),t.styleSheet)t.styleSheet.cssText=a;else{for(;t.firstChild;)t.removeChild(t.firstChild);t.appendChild(document.createTextNode(a))}}var _=null,m=0;function g(t,e){var s,a,i;if(e.singleton){var r=m++;s=_||(_=u(e)),a=p.bind(null,s,r,!1),i=p.bind(null,s,r,!0)}else s=u(e),a=v.bind(null,s,e),i=function(){!function(t){if(null===t.parentNode)return!1;t.parentNode.removeChild(t)}(s)};return a(t),function(e){if(e){if(e.css===t.css&&e.media===t.media&&e.sourceMap===t.sourceMap)return;a(t=e)}else i()}}t.exports=function(t,e){(e=e||{}).singleton||"boolean"==typeof e.singleton||(e.singleton=i());var s=o(t=t||[],e);return function(t){if(t=t||[],"[object Array]"===Object.prototype.toString.call(t)){for(var a=0;a<s.length;a++){var i=c(s[a]);n[i].references--}for(var r=o(t,e),u=0;u<s.length;u++){var d=c(s[u]);0===n[d].references&&(n[d].updater(),n.splice(d,1))}s=r}}}},8178:(t,e,s)=>{s.d(e,{Z:()=>o});const a={name:"ProductBox",props:["product","type"],data:function(){return{cartProduct:{},is_cart:!1}},methods:{addToCart:function(t,e){this.$store.commit("ADD_TO_CART",{product:t,type:e})}},computed:{quantity:function(){var t=this,e=this.$store.getters.getCart,s="";if(e.length)return e.forEach((function(e){t.product&&e.id===t.product.id&&(t.is_cart=!0,s=e.qty)})),s}},watch:{quantity:function(t,e){return t}}};var i=s(3379),r=s.n(i),n=s(5609),c={insert:"head",singleton:!1};r()(n.Z,c);n.Z.locals;const o=(0,s(1900).Z)(a,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return"medicine"==t.type?s("div",{staticClass:"col-6 col-xl-3 col-lg-3 col-md-3 col-md-3-half"},[s("div",{staticClass:"item mb-5"},[s("div",{staticClass:"item-inner "},[s("div",{staticClass:"item-img "},[s("img",{staticClass:"item-thumbnail",attrs:{src:t.product.image?"/storage/uploads/medicines/"+t.product.image:"/image.svg",alt:t.product.name}})]),t._v(" "),s("div",{staticClass:"item-desc "},[s("div",{staticClass:"item-name "},[t._v(t._s(t.product.name))]),t._v(" "),s("div",{staticClass:"item-sub-text "},[t._v(t._s(t.product.prices[0]?t.product.prices[0].unit.unit_name:""))]),t._v(" "),s("div",{directives:[{name:"show",rawName:"v-show",value:t.product.prices[0],expression:"product.prices[0]"}],staticClass:"price t-font-family"},[s("span",[t._v("৳ ")]),t._v(" "),t.product.prices[0]?s("span",[t.product.prices[0].discount?s("span",[t._v(t._s(t.product.prices[0].discount_price))]):s("span",[t._v(t._s(t.product.prices[0].price))])]):t._e(),t._v(" "),s("del",{directives:[{name:"show",rawName:"v-show",value:t.product.prices[0]?t.product.prices[0].discount:"",expression:"product.prices[0] ? product.prices[0].discount : ''"}]},[s("span",[t._v(t._s(t.product.prices[0]?t.product.prices[0].price:""))])])])]),t._v(" "),t._m(0),t._v(" "),s("div",{staticClass:"item-quantity-editor add-btn-wrapper border-radius-small "},[s("button",{staticClass:"minus-quantity",on:{click:function(e){return t.addToCart(t.product,"minus")}}},[t._v("–")]),t._v(" "),t.is_cart?t._e():s("button",{staticClass:"add-to-bag",attrs:{type:"button "},on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v("Add To Bag")]),t._v(" "),t.is_cart?s("button",{staticClass:"add-to-bag",attrs:{type:"button "},on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v(t._s(t.quantity)+" in  Bag")]):t._e(),t._v(" "),s("button",{staticClass:"plus-quantity",on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v("+")])])])])]):s("div",{staticClass:"col-6 col-xl-3 col-lg-4 col-md-4 col-md-3-half"},[t.product?s("div",{staticClass:"item"},[s("div",{staticClass:"item-inner "},[s("div",{staticClass:"item-img "},[s("img",{staticClass:"item-thumbnail",attrs:{src:t.product.thumbnail_image?"/storage/uploads/product/"+t.product.thumbnail_image:"",alt:"item "}})]),t._v(" "),s("div",{staticClass:"item-desc "},[s("div",{staticClass:"item-name "},[t._v(t._s(t.product.name))]),t._v(" "),s("div",{staticClass:"item-sub-text "},[t._v(t._s(t.product.unit?t.product.unit:""))]),t._v(" "),s("div",{staticClass:"price t-font-family"},[s("span",[t._v("৳ ")]),t._v(" "),s("span",[t._v(t._s(t.product.discount?t.product.discount_price:t.product.price))]),t._v(" "),s("del",{directives:[{name:"show",rawName:"v-show",value:t.product.discount,expression:"product.discount"}]},[s("span",[t._v(t._s(t.product.price))])])])]),t._v(" "),t._m(1),t._v(" "),s("div",{staticClass:"item-quantity-editor add-btn-wrapper border-radius-small "},[s("button",{staticClass:"minus-quantity",on:{click:function(e){return t.addToCart(t.product,"minus")}}},[t._v("–")]),t._v(" "),t.is_cart?t._e():s("button",{staticClass:"add-to-bag",attrs:{type:"button "},on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v("Add To Bag")]),t._v(" "),t.is_cart?s("button",{staticClass:"add-to-bag",attrs:{type:"button "},on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v(t._s(t.quantity)+" in  Bag")]):t._e(),t._v(" "),s("button",{staticClass:"plus-quantity",on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v("+")])])])]):t._e()])}),[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"overlay text "},[s("a",{staticClass:"quick-view ",attrs:{href:"javascript:void(0) "}},[s("i",{staticClass:"bi bi-eye "}),t._v(" "),s("span",[t._v("Quick View")])])])},function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"overlay text "},[s("a",{staticClass:"quick-view ",attrs:{href:"javascript:void(0) "}},[s("i",{staticClass:"bi bi-eye "}),t._v(" "),s("span",[t._v("Quick View")])])])}],!1,null,null,null).exports},8599:(t,e,s)=>{s.d(e,{Z:()=>i});const a={name:"ProductSubcategory",props:["categories","categoryType"],computed:{currentRouteName:function(){return this.$route.name}}};const i=(0,s(1900).Z)(a,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"item-categories-area"},[s("div",{staticClass:"container-fluid"},["home"==this.currentRouteName?s("div",{staticClass:"row justify-content-center"},t._l(this.$store.state.categories,(function(e){return s("div",{key:e.id,staticClass:"col-6 col-xl-2 col-lg-3 col-md-3"},[s("div",{staticClass:"item-categories cus-transition"},[s("router-link",{staticClass:"d-block",attrs:{to:"/"+e.slug}},[s("div",{staticClass:"item-category-img bg-white"},[s("img",{staticClass:"img-fluid",attrs:{src:"/storage/uploads/product/category/"+e.image,alt:"category",width:"150"}})]),t._v(" "),s("div",{staticClass:"item-category-info"},[t._v("\n                            "+t._s(e.name)+"\n                        ")])])],1)])})),0):s("div",{staticClass:"row justify-content-center"},t._l(t.categories.categories,(function(e){return s("div",{key:e.id,staticClass:"col-6 col-xl-2 col-lg-3 col-md-3"},["sub"==t.categoryType?s("div",[s("div",{staticClass:"item-categories cus-transition"},[s("router-link",{staticClass:"d-block",attrs:{to:"/sub-sub-category/"+e.slug}},[s("div",{staticClass:"item-category-img bg-white"},[s("img",{staticClass:"img-fluid",attrs:{src:"/storage/uploads/product/category/"+e.image,alt:"category",width:"150"}})]),t._v(" "),s("div",{staticClass:"item-category-info"},[t._v("\n                                "+t._s(e.name)+"\n                            ")])])],1)]):s("div",[s("div",{staticClass:"item-categories cus-transition"},[s("router-link",{staticClass:"d-block",attrs:{to:"/sub-category/"+e.slug}},[s("div",{staticClass:"item-category-img bg-white"},[s("img",{staticClass:"img-fluid",attrs:{src:"/storage/uploads/product/category/"+e.image,alt:"category",width:"150"}})]),t._v(" "),s("div",{staticClass:"item-category-info"},[t._v("\n                                "+t._s(e.name)+"\n                            ")])])],1)])])})),0)])])}),[],!1,null,null,null).exports},9263:(t,e,s)=>{s.r(e),s.d(e,{default:()=>n});var a=s(8599),i=s(8178);const r={name:"SubCategoryWiseSubSubCategory",components:{HomeProductCategory:a.Z,ProductBox:i.Z},data:function(){return{slug:this.$route.params.slug,products:{},category_name:"",category_slug:"",sub_category_slug:"",sub_category_name:"",sub_sub_category_name:"",sub_sub_category_banner:""}},methods:{getProducts:function(){var t=this;axios.get("/api/v1/sub-sub-category/".concat(t.slug)).then((function(e){200==e.status&&(t.sub_sub_category_name=e.data[0].name,t.sub_sub_category_banner=e.data[0].banner,t.category_name=e.data[0].category_name,t.category_slug=e.data[0].category_slug,t.sub_category_name=e.data[0].sub_category_name,t.sub_category_slug=e.data[0].sub_category_slug,t.products=e.data[0].products)})).catch((function(t){console.log(t)}))}},mounted:function(){this.getProducts()},watch:{"$route.params.slug":function(){this.getProducts()}}};const n=(0,s(1900).Z)(r,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"category-related-area"},[s("div",{staticClass:"common-banner-area"},[s("div",{staticClass:"container-fluid"},[s("div",{staticClass:"row justify-content-center"},[s("div",{staticClass:"col-md-8"},[s("a",{staticClass:"d-block banner-wrap",attrs:{href:"javascript:void(0)"}},[s("img",{staticClass:"img-fluid",attrs:{src:t.sub_sub_category_banner?"/storage/uploads/product/category/"+t.sub_sub_category_banner:"",alt:"banner"}})])])])])]),t._v(" "),s("div",{staticClass:"breadcrumb-area"},[s("div",{staticClass:"container-fluid"},[s("div",{staticClass:"row"},[s("div",{staticClass:"col-md-12"},[s("ol",{staticClass:"breadcrumb indigo lighten-4"},[s("li",{staticClass:"breadcrumb-item"},[s("router-link",{staticClass:"black-text",attrs:{to:"/"+t.category_slug}},[t._v(t._s(t.category_name))]),t._v(" "),s("i",{staticClass:"fa bi bi-chevron-right mx-2",attrs:{"aria-hidden":"true"}})],1),t._v(" "),s("li",{staticClass:"breadcrumb-item"},[s("router-link",{staticClass:"black-text",attrs:{to:"/sub-category/"+t.sub_category_slug}},[t._v(t._s(t.sub_category_name))]),t._v(" "),s("i",{staticClass:"fa bi bi-chevron-right mx-2",attrs:{"aria-hidden":"true"}})],1),t._v(" "),s("li",{staticClass:"breadcrumb-item active"},[t._v("\n                            "+t._s(t.sub_sub_category_name)+"\n                        ")])])])])])]),t._v(" "),this.products.length>0?s("div",[s("ProductBox",{attrs:{products:{products:t.products}}})],1):t._e()])}),[],!1,null,null,null).exports},1900:(t,e,s)=>{function a(t,e,s,a,i,r,n,c){var o,u="function"==typeof t?t.options:t;if(e&&(u.render=e,u.staticRenderFns=s,u._compiled=!0),a&&(u.functional=!0),r&&(u._scopeId="data-v-"+r),n?(o=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),i&&i.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(n)},u._ssrRegister=o):i&&(o=c?function(){i.call(this,(u.functional?this.parent:this).$root.$options.shadowRoot)}:i),o)if(u.functional){u._injectStyles=o;var d=u.render;u.render=function(t,e){return o.call(e),d(t,e)}}else{var l=u.beforeCreate;u.beforeCreate=l?[].concat(l,o):[o]}return{exports:t,options:u}}s.d(e,{Z:()=>a})}}]);