<template>
  <nav class="menu container">
    <div class="menu__inner">
      <a class="menu__link" href="#">
        Кредитные карты
      </a>
      <a class="menu__link menu__link_active" href="#">
        Вклады
      </a>
      <a class="menu__link" href="#">
        Дебетовая карта
      </a>
      <a class="menu__link" href="#">
        Страхование
      </a>
      <a class="menu__link" href="#">
        Друзья
      </a>
      <a class="menu__link" href="#">
        Интернет-банк
      </a>
    </div>
  </nav>
</template>

<script>
export default {

}
</script>

<style lang="scss">
  .menu {
    background: #231f20;
    height: 45px;
    &__inner {
      display: flex;
      height: 100%;
      justify-content: center;
      align-items: center;
      margin-top: 22px;
      :last-child:after {
          display: none;
      }
    }
    &__link {
      display: flex;
      align-items: center;
      color: #fff;
      font-size: 14px;
      cursor: pointer;
      height: 100%;
      padding: 0 40px;
      position: relative;
      text-decoration: none;
      &:after {
        content: "";
        display: inline-block;
        background: #eb5017;
        width: 1px;
        height: 100%;
        position: absolute;
        left: 100%;
      }
      &:hover {
        background: #eb5017;
      }
      &_active {
        background: #eb5017;
      }
    }
  }
</style>