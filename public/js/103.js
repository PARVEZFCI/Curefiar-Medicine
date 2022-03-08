"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[103],{5609:(t,e,i)=>{i.d(e,{Z:()=>a});var r=i(3645),n=i.n(r)()((function(t){return t[1]}));n.push([t.id,"del{font-size:12px}",""]);const a=n},9165:(t,e,i)=>{i.d(e,{Z:()=>a});var r=i(3645),n=i.n(r)()((function(t){return t[1]}));n.push([t.id,"del[data-v-1ec8d0af]{font-size:12px}",""]);const a=n},3645:t=>{t.exports=function(t){var e=[];return e.toString=function(){return this.map((function(e){var i=t(e);return e[2]?"@media ".concat(e[2]," {").concat(i,"}"):i})).join("")},e.i=function(t,i,r){"string"==typeof t&&(t=[[null,t,""]]);var n={};if(r)for(var a=0;a<this.length;a++){var s=this[a][0];null!=s&&(n[s]=!0)}for(var o=0;o<t.length;o++){var c=[].concat(t[o]);r&&n[c[0]]||(i&&(c[2]?c[2]="".concat(i," and ").concat(c[2]):c[2]=i),e.push(c))}},e}},3379:(t,e,i)=>{var r,n=function(){return void 0===r&&(r=Boolean(window&&document&&document.all&&!window.atob)),r},a=function(){var t={};return function(e){if(void 0===t[e]){var i=document.querySelector(e);if(window.HTMLIFrameElement&&i instanceof window.HTMLIFrameElement)try{i=i.contentDocument.head}catch(t){i=null}t[e]=i}return t[e]}}(),s=[];function o(t){for(var e=-1,i=0;i<s.length;i++)if(s[i].identifier===t){e=i;break}return e}function c(t,e){for(var i={},r=[],n=0;n<t.length;n++){var a=t[n],c=e.base?a[0]+e.base:a[0],u=i[c]||0,d="".concat(c," ").concat(u);i[c]=u+1;var l=o(d),p={css:a[1],media:a[2],sourceMap:a[3]};-1!==l?(s[l].references++,s[l].updater(p)):s.push({identifier:d,updater:_(p,e),references:1}),r.push(d)}return r}function u(t){var e=document.createElement("style"),r=t.attributes||{};if(void 0===r.nonce){var n=i.nc;n&&(r.nonce=n)}if(Object.keys(r).forEach((function(t){e.setAttribute(t,r[t])})),"function"==typeof t.insert)t.insert(e);else{var s=a(t.insert||"head");if(!s)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");s.appendChild(e)}return e}var d,l=(d=[],function(t,e){return d[t]=e,d.filter(Boolean).join("\n")});function p(t,e,i,r){var n=i?"":r.media?"@media ".concat(r.media," {").concat(r.css,"}"):r.css;if(t.styleSheet)t.styleSheet.cssText=l(e,n);else{var a=document.createTextNode(n),s=t.childNodes;s[e]&&t.removeChild(s[e]),s.length?t.insertBefore(a,s[e]):t.appendChild(a)}}function f(t,e,i){var r=i.css,n=i.media,a=i.sourceMap;if(n?t.setAttribute("media",n):t.removeAttribute("media"),a&&"undefined"!=typeof btoa&&(r+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(a))))," */")),t.styleSheet)t.styleSheet.cssText=r;else{for(;t.firstChild;)t.removeChild(t.firstChild);t.appendChild(document.createTextNode(r))}}var v=null,m=0;function _(t,e){var i,r,n;if(e.singleton){var a=m++;i=v||(v=u(e)),r=p.bind(null,i,a,!1),n=p.bind(null,i,a,!0)}else i=u(e),r=f.bind(null,i,e),n=function(){!function(t){if(null===t.parentNode)return!1;t.parentNode.removeChild(t)}(i)};return r(t),function(e){if(e){if(e.css===t.css&&e.media===t.media&&e.sourceMap===t.sourceMap)return;r(t=e)}else n()}}t.exports=function(t,e){(e=e||{}).singleton||"boolean"==typeof e.singleton||(e.singleton=n());var i=c(t=t||[],e);return function(t){if(t=t||[],"[object Array]"===Object.prototype.toString.call(t)){for(var r=0;r<i.length;r++){var n=o(i[r]);s[n].references--}for(var a=c(t,e),u=0;u<i.length;u++){var d=o(i[u]);0===s[d].references&&(s[d].updater(),s.splice(d,1))}i=a}}}},2455:(t,e,i)=>{i.d(e,{Z:()=>c});const r={name:"ProductBox",props:["product","type"],data:function(){return{cartProduct:{},is_cart:!1}},methods:{addToCart:function(t,e){this.$store.commit("ADD_TO_CART",{product:t,incType:e})},productDetails:function(t){this.$store.dispatch("triggerModal",this.product)}},computed:{quantity:function(){var t=this,e=this.$store.getters.getCart,i="";if(e.length)return e.forEach((function(e){t.product&&e.id===t.product.id&&(t.is_cart=!0,i=e.qty)})),i}},watch:{quantity:function(t,e){return t}}};var n=i(3379),a=i.n(n),s=i(5609),o={insert:"head",singleton:!1};a()(s.Z,o);s.Z.locals;const c=(0,i(1900).Z)(r,(function(){var t=this,e=t.$createElement,i=t._self._c||e;return"medicine"==t.type?i("div",{staticClass:"col-6 col-xl-2 col-lg-3 col-md-3 col-md-3-half"},[i("div",{staticClass:"item mb-5"},[i("div",{staticClass:"item-inner "},[i("div",{directives:[{name:"lazy-container",rawName:"v-lazy-container",value:{selector:"img",loading:"preloader.gif"},expression:"{ selector: 'img',loading: 'preloader.gif'}"}],staticClass:"item-img "},[i("img",{staticClass:"item-thumbnail",attrs:{"data-src":t.product.image?"/storage/uploads/medicines/"+t.product.image:"/image.svg",alt:t.product.name}})]),t._v(" "),i("div",{staticClass:"item-desc "},[i("div",{staticClass:"item-name "},[t._v(t._s(t.product.name))]),t._v(" "),i("div",{staticClass:"item-sub-text "},[t._v(t._s(t.product.prices[0]?t.product.prices[0].unit.unit_name:""))]),t._v(" "),i("div",{directives:[{name:"show",rawName:"v-show",value:t.product.prices[0],expression:"product.prices[0]"}],staticClass:"price t-font-family"},[i("span",[t._v("৳ ")]),t._v(" "),t.product.prices[0]?i("span",[t.product.prices[0].discount?i("span",[t._v(t._s(t.product.prices[0].discount_price))]):i("span",[t._v(t._s(t.product.prices[0].price))])]):t._e(),t._v(" "),i("del",{directives:[{name:"show",rawName:"v-show",value:t.product.prices[0]?t.product.prices[0].discount:"",expression:"product.prices[0] ? product.prices[0].discount : ''"}]},[i("span",[t._v(t._s(t.product.prices[0]?t.product.prices[0].price:""))])])])]),t._v(" "),i("div",{staticClass:"overlay text "},[i("a",{staticClass:"quick-view",attrs:{href:"javascript:void(0) "},on:{click:function(e){return e.preventDefault(),t.productDetails(t.product)}}},[i("i",{staticClass:"bi bi-eye "})])]),t._v(" "),i("div",{staticClass:"item-quantity-editor add-btn-wrapper border-radius-small "},[i("button",{staticClass:"minus-quantity",on:{click:function(e){return t.addToCart(t.product,"minus")}}},[t._v("–")]),t._v(" "),t.is_cart?t._e():i("button",{staticClass:"add-to-bag",attrs:{type:"button "},on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v("Add To Bag")]),t._v(" "),t.is_cart?i("button",{staticClass:"add-to-bag",attrs:{type:"button "},on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v(t._s(t.quantity)+" in  Bag")]):t._e(),t._v(" "),i("button",{staticClass:"plus-quantity",on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v("+")])])])])]):i("div",{staticClass:"col-6 col-xl-3 col-lg-4 col-md-4 col-md-3-half"},[t.product?i("div",{staticClass:"item"},[i("div",{staticClass:"item-inner "},[i("div",{directives:[{name:"lazy-container",rawName:"v-lazy-container",value:{selector:"img",loading:"preloader.gif"},expression:"{ selector: 'img',loading: 'preloader.gif'}"}],staticClass:"item-img"},[i("img",{staticClass:"item-thumbnail",attrs:{"data-src":t.product.thumbnail_image?"/storage/uploads/product/"+t.product.thumbnail_image:"",alt:"item "}})]),t._v(" "),i("div",{staticClass:"item-desc "},[i("div",{staticClass:"item-name "},[t._v(t._s(t.product.name))]),t._v(" "),i("div",{staticClass:"item-sub-text "},[t._v(t._s(t.product.unit?t.product.unit:""))]),t._v(" "),i("div",{staticClass:"price t-font-family"},[i("span",[t._v("৳ ")]),t._v(" "),i("span",[t._v(t._s(t.product.discount?t.product.discount_price:t.product.price))]),t._v(" "),i("del",{directives:[{name:"show",rawName:"v-show",value:t.product.discount,expression:"product.discount"}]},[i("span",[t._v(t._s(t.product.price))])])])]),t._v(" "),i("div",{staticClass:"overlay text "},[i("a",{staticClass:"quick-view",attrs:{href:"javascript:void(0) "},on:{click:function(e){return e.preventDefault(),t.productDetails(t.product)}}},[i("i",{staticClass:"bi bi-eye "})])]),t._v(" "),i("div",{staticClass:"item-quantity-editor add-btn-wrapper border-radius-small "},[i("button",{staticClass:"minus-quantity",on:{click:function(e){return t.addToCart(t.product,"minus")}}},[t._v("–")]),t._v(" "),t.is_cart?t._e():i("button",{staticClass:"add-to-bag",attrs:{type:"button "},on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v("Add To Bag")]),t._v(" "),t.is_cart?i("button",{staticClass:"add-to-bag",attrs:{type:"button "},on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v(t._s(t.quantity)+" in  Bag")]):t._e(),t._v(" "),i("button",{staticClass:"plus-quantity",on:{click:function(e){return t.addToCart(t.product,"plus")}}},[t._v("+")])])])]):t._e()])}),[],!1,null,null,null).exports},1103:(t,e,i)=>{i.r(e),i.d(e,{default:()=>c});const r={name:"OfferProduct",components:{ProductBox:i(2455).Z},data:function(){return{offerProducts:{},is_cart:!1}},methods:{getOfferProduct:function(){var t=this;axios.get("api/v1/offer-products").then((function(e){console.log(e.data),200==e.status&&(t.offerProducts=e.data)})).catch((function(t){console.log(t)}))},addToCart:function(t,e){this.$store.commit("ADD_TO_CART",{product:t,type:e})}},computed:{quantity:function(){var t=this,e=this.$store.getters.getCart,i="";if(e.length)return e.forEach((function(e){t.product&&e.id===t.product.id&&(t.is_cart=!0,i=e.qty)})),i}},watch:{quantity:function(t,e){return t}},mounted:function(){this.getOfferProduct()}};var n=i(3379),a=i.n(n),s=i(9165),o={insert:"head",singleton:!1};a()(s.Z,o);s.Z.locals;const c=(0,i(1900).Z)(r,(function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"offer-area"},[t._m(0),t._v(" "),i("div",{staticClass:"container-fluid"},[i("div",{staticClass:"row "},t._l(t.offerProducts,(function(t){return i("ProductBox",{key:t.id,attrs:{product:t.product,type:"product"}})})),1)])])}),[function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"breadcrumb-area"},[i("div",{staticClass:"container-fluid"},[i("div",{staticClass:"row"},[i("div",{staticClass:"col-md-12"},[i("ol",{staticClass:"breadcrumb indigo lighten-4"},[i("li",{staticClass:"breadcrumb-item"},[i("a",{staticClass:"black-text",attrs:{href:"#"}},[t._v("Offer Products")])])])])])])])}],!1,null,"1ec8d0af",null).exports},1900:(t,e,i)=>{function r(t,e,i,r,n,a,s,o){var c,u="function"==typeof t?t.options:t;if(e&&(u.render=e,u.staticRenderFns=i,u._compiled=!0),r&&(u.functional=!0),a&&(u._scopeId="data-v-"+a),s?(c=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),n&&n.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(s)},u._ssrRegister=c):n&&(c=o?function(){n.call(this,(u.functional?this.parent:this).$root.$options.shadowRoot)}:n),c)if(u.functional){u._injectStyles=c;var d=u.render;u.render=function(t,e){return c.call(e),d(t,e)}}else{var l=u.beforeCreate;u.beforeCreate=l?[].concat(l,c):[c]}return{exports:t,options:u}}i.d(e,{Z:()=>r})}}]);