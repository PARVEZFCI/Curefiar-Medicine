<template>
    <div>
        <div class="container-fluid">
            <div class="search-page-title m-5 text-center">
                <span v-if="searchProducts.length">
                    <h4>Search result for : <strong class="text-danger">{{searchKey}}</strong></h4>
                </span>
                <span v-else>
                    <h4>Your search <strong class="text-danger">{{searchKey}}</strong> did not match any products</h4>
                </span>
            </div>
            <div class="row" v-if="searchKey.length">
                <ProductBox v-for="product in searchProducts" :key="product.id" :product="product" type="product"/>
            </div>
        </div>
    </div>
</template>
<script>
    import ProductBox from '../components/CardProduct.vue';
    export default {
        name: "ProductSearch",
        components:{ProductBox},
        data() {
            return {
                searchKey: this.$route.params.searchText,
                searchProducts: {},
                found: false,
            }
        },
        methods:{
            getSearchWiseProduct() {
                const _this = this;
                axios
                    .get('/api/v1/search/' + this.searchKey )
                    .then((response) => {
                        this.searchProducts = response.data;
                    }).catch((error) => {
                        console.log(error)
                    })
            },  
        },
        created: function() {
            this.getSearchWiseProduct();
            // this.searchKey = this.$route.params.searchText;
        }
    }
</script>