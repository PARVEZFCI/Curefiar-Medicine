// export default {
//     state: {
//         product: [],
//         modal: false
//     },
//     mutations: {
//          TRIGGER_MODAL(state, product) {
//             //  console.log(product)
//             //  console.log(state.modal)
//             state.product = product
//             state.modal = true
//          console.log(state.modal)
//          }   
//     },
//     actions: {
//         triggerModal(product) {
//             product.commit('TRIGGER_MODAL', product);
//         }
//     },
//     getters: {
//         getModal(state) {
//             return state.modalData
//         }
//     },
// }