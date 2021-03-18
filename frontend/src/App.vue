<template>
  <div class="page">
    <Header></Header>
    <div class="content">
      <Menu></Menu>
      <Breadcrumbs></Breadcrumbs>
      <Main></Main>
    </div>
    <Footer></Footer>
  </div>
</template>

<script>
import Header from "./components/Header.vue";
import Menu from "./components/Menu.vue";
import Breadcrumbs from "./components/Breadcrumbs.vue";
import Main from "./components/Main.vue";
import Footer from "./components/Footer.vue";

export default {
    components: {
      Header,
      Menu,
      Breadcrumbs,
      Main,
      Footer
    },
}
</script>

<style lang="scss">
  body {
    margin-top: 22px;
    font-family: Arial, sans-serif;
    font-size: 14px;
    margin-bottom: 0;
  }

  *,
  *:before,
  *:after {
    box-sizing: border-box;
  }

  h1, h2, h3, h4, h5, h6 {
    margin: 0;
  }

  .page {
    overflow: hidden;
  }

  .content {
    min-height: calc(100vh - 173px);
  }

  .container {
    width: 100%;
    max-width: 1024px;
    margin: 0 auto;
  }
</style>