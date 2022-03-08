<template>
    <span class="close-cart" @click="closeCart">
        Close 
    </span>
</template>
<script>
export default ({
    name: "CartCloseButton",
    methods: {
        closeCart() {
            const _this = this;
            _this.$store.state.cartshow = false;
            _this.$store.state.backdrop = false;
        }
    }
})
</script>
