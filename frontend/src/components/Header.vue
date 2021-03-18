<template>
  <header class="header container">
    <div class="header__inner">
      <div class="logo header__logo"></div>
      <div class="contacts header__contacts">
        <a href="tel:8800105005" class="contacts__link">8&ndash;800&ndash;100&ndash;5005</a>
        <a href="tel:83452522000" class="contacts__link">+7 (3452) 522&ndash;000</a>
      </div>
    </div>
  </header>
</template>

<script>
export default {

}
</script>

<style lang="scss">
  .header {
    &__inner {
      display: flex;
      justify-content: space-between;
    }
    &__contacts {
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
  }

  .logo {
    width: 216px;
    height: 74px;
    background: url("../assets/images/logo.jpg") no-repeat center top;
  }

  .contacts {
    font-family: Europe, sans-serif;
    font-size: 18px;
    width: 180px;
    &__link {
      color: #eb5017;
      text-decoration: none;
    }
  }
</style>