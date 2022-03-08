// const state = {
//     snippets: []
//  }
 
//  const mutations = {
//  SET_SNIPPETS(state, payload) {
//      state.snippets = payload;
//    },
//  }
 
 const actions = {
 getProduct(context) {
     console.log(context)
//      const userId = firebase.auth().currentUser.uid;
//      db.collection("projects")
//        .where("person", "==", userId)
//        .orderBy("title", "desc")
//        .onSnapshot(snap => {
//          let tempSnippets = [];
//          snap.forEach(doc => {
//            tempSnippets.push({
//              id: doc.id,
//              title: doc.data().title,
//              description: doc.data().description,
//              code: doc.data().code,
//              person: doc.data().person
//            });
//          });
//          context.commit("SET_SNIPPETS", tempSnippets);
//        });
//    }
 }
}
 
// const getters = {
//    getCurrentSnippet(state) {
//      return state.snippet
//     }
// }