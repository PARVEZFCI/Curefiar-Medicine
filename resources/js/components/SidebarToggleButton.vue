<template>
    <button class="sidebar-collapse-btn bg-transparent d-lg-block d-none" type="button"  @click="collapseCategorySide">
        <!-- <span class="navbar-toggler-icon"></span> -->
        <div class="hamBergerMenuIcon">
            <div class="bar1"></div>
            <div class="bar2" style="width: 15px;margin-left: auto;"></div>
            <div class="bar3"></div>
        </div>
    </button>
</template>

<script>
export default {
    name: 'SidebarToggleButton',
    methods: {
        collapseCategorySide() {
            this.$emit('toggle-sidebar')
        }
    }
}
</script>