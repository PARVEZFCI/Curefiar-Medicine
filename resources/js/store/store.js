import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

let cartData = window.localStorage.getItem("cart");
let subTotal = window.localStorage.getItem("subTotal");

export default new Vuex.Store({
  state: {
    categories: {},
    section: null,
    backdrop: false,
    show: false,
    cartshow: false,
    regshow: false,
    loginshow: false,

    authenticated:false,
    user:{},

    cart: cartData ? JSON.parse(cartData) : [],
    subTotal: subTotal ? JSON.parse(subTotal) : 0,
    
    modalData: {
      modal: false, 
      singleProduct: []
    },

    medicineUnitType: 'primary',
  },
  mutations: {
    TRIGGER_MODAL(state, product) {
      state.modalData.singleProduct = product;
      state.modalData.modal = true;
      
    },
    RESET_MODAL(state, product) {
      state.modalData.singleProduct = [];
      state.modalData.modal = false;
    },
    getCategory(state, categories) {
      if(categories) {
        state.categories = categories;
        state.section = 'home-category';
      }
    },
    
    SET_MEDICINE(state, medicine) {
      if(medicine) {
        state.medicine = medicine;
      }
    },

    ADD_TO_CART (state,data) {
      // Check localstorage is product or not
      let found = state.cart.findIndex(
        item => item.id == data.product.id
      );
      
      if( found == -1 ) {
        // Either push new product in storageg
        if(data.product.type == 'medicine') {
            if(state.medicineUnitType === 'primary') {
              state.cart.push({
                id: data.product.id,
                name: data.product.name,
                price: data.product.prices[0].discount ? data.product.prices[0].discount_price : data.product.prices[0].price,
                discount: data.product.prices[0].discount ? data.product.prices[0].discount : '', 
                discount_price: data.product.prices[0].discount_price ? data.product.prices[0].discount_price : '', 
                type: 'medicine',
                image: data.product.image,
                unit:  data.product.prices[0] ? data.product.prices[0].unit.unit_name : '',
                qty: data.product.qty,
              });
            } else {
              state.cart.push({
                id: data.product.id,
                name: data.product.name,
                price: data.product.prices[1].discount_price ? data.product.prices[1].discount_price : data.product.prices[1].price,
                discount: data.product.prices[1].discount_price ? data.product.prices[1].discount : '', 
                discount_price: data.product.prices[1].discount_price ? data.product.prices[1].discount_price : '', 
                type: 'medicine',
                image: data.product.image,
                unit:  data.product.prices[1] ? data.product.prices[1].unit.unit_name : '',
                qty: data.product.qty,
              });
            }
          
        } else {
          state.cart.push({
            id: data.product.id,
            name: data.product.name,
            price: data.product.discount ? data.product.discount_price : data.product.price,
            discount: data.product.discount ? data.product.discount : '',
            discount_price: data.product.discount_price ? data.product.discount_price : '',
            type: 'product',
            image: data.product.thumbnail_image,
            unit: '',
            qty: data.product.qty,
          });
        }

        state.cart.forEach((exitProduct, index) => {
          if(exitProduct.id == data.product.id) {
              if(exitProduct.discount) {
                state.subTotal += parseFloat(
                    exitProduct.discount_price *
                        1
                );
              } else {
                  state.subTotal += parseFloat(
                    exitProduct.price * 1
                  );
              }
          }
        })
      } else {
        state.cart.forEach((exitProduct, index) => {
            if(exitProduct.id == data.product.id) {
              if(data.incType === 'minus') {
                if (exitProduct.qty === 1) {
                    exitProduct.qty = 1;
                } else {
                  parseInt(state.cart[index].qty -= 1);
                  if(exitProduct.discount) {
                    state.subTotal -= parseFloat(
                        exitProduct.discount_price *
                            1
                    );
                  } else {
                      state.subTotal -= parseFloat(
                        exitProduct.price * 1
                      );
                  }
                }
                
              } else {
                parseInt(state.cart[index].qty += 1);
                if(exitProduct.discount) {
                  state.subTotal += parseFloat(
                      exitProduct.discount_price *
                          1
                  );
                } else {
                    state.subTotal += parseFloat(
                      exitProduct.price * 1
                  );
                }
              }
            }
        })
      }

      this.commit("CART_TO_STORAGE");

    },

    REMOVE_CART(state, product) {
       state.cart.forEach((item, index) => {
          if(item.id == product.id) {
            if (product.discount_price) {
              state.subTotal -=
                  parseFloat(product.discount_price * 1) *
                  parseInt(state.cart[index].qty);
            } else {
                state.subTotal -=
                    parseFloat(product.price) *
                    parseInt(state.cart[index].qty);
            }

            state.cart.splice(index, 1);
            this.commit("CART_TO_STORAGE");
          }
       });
    },

    CART_TO_STORAGE(state) {
      window.localStorage.setItem("cart", JSON.stringify(state.cart));
      window.localStorage.setItem(
          "subTotal",
          JSON.stringify(state.subTotal)
      );
    },

    REMOVE_CART_DATA_FORM_STORAGE() {
       localStorage.removeItem('cart');
       localStorage.removeItem('subTotal');
    },

    toggleSidebar(state, toggleOption) {
      state.backdrop = true;
      if(toggleOption == 1) {
        state.cartshow = true;
      }else if(toggleOption == 2) {
        state.loginshow = true;
      }else if(toggleOption == 3) {
        state.regshow = true;
      }else if(toggleOption == 4) {
        if(state.show == false) {
          state.show = true;
        } else {
          state.show = false;
          state.backdrop = false;
        }
      }
    },
  },
  actions: {
    triggerModal({commit}, product) {
      commit('TRIGGER_MODAL', product)
    },
    resetModal({commit}) {
      commit('RESET_MODAL')
    }
  },
  getters:{
    getCart(state) {
      return state.cart
    },
    getModal(state) {
      return state.modalData
    }

  },
});