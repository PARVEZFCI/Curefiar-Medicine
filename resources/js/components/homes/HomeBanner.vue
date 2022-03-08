<template>
    <lazy-component>
        <div class="home-landing-banner" style="background-color:rgb(217 200 154)">
            <img :src="banner ? 'storage/uploads/media/'+banner : ''" alt="banner">
        </div>
    </lazy-component>
</template>

<script>
export default {
    name: "Banner",
    props: ['banner'],
}
</script>