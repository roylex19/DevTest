<template>
  <footer class="footer container">
    <div class="footer__menu">
      <a class="footer__menu-link" href="#">
          Кредитные карты
      </a>
      <a class="footer__menu-link" href="#">
          Вклады
        </a>
      <a class="footer__menu-link" href="#">
          Дебетовая карта
      </a>
      <a class="footer__menu-link" href="#">
          Страхование
      </a>
      <a class="footer__menu-link" href="#">
          Друзья
      </a>
      <a class="footer__menu-link" href="#">
          Интернет-банк
      </a>
    </div>
  </footer>
</template>

<script>
export default {

}
</script>

<style lang="scss">
  .footer {
    height: 55px;
    background-color: #231f20;
    font-size: 12px;
    padding: 13px 0 0 64px;
    &__menu-link {
      margin-right: 29px;
      &:visited {
        color: #eee
      }
    }
  }
</style>