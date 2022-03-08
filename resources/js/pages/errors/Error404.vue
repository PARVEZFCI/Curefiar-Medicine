<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>Sorry, that page does not exists. 😢</h1>
                <h2>Please go back <router-link tag="a" to="/dashboard">home</router-link></h2>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    created() {
      document.title = 'Page Not Found! 😢';
    }
  }
</script>