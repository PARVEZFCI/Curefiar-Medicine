<template>
    <div>
        <div class="search-form">
            <form>
                <div class="search input-group my-3 my-lg-0">
                    <input type="text" class="form-control" placeholder="Search Product" v-model="search" @keyup="searchProduct">
                </div>
            </form>
        </div>
    </div>
</template>