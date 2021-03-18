<template>
  <section class="breadcrumbs container">
    <div class="breadcrumbs__inner">
      <a class="breadcrumbs__link" href="#">
          Главная
      </a>
      <a class="breadcrumbs__link" href="#">
          Вклады
      </a>
      <a class="breadcrumbs__link breadcrumbs__link_current" href="#">
          Калькулятор
      </a>
    </div>
  </section>
</template>

<script>
export default {

}
</script>

<style lang="scss">
  .breadcrumbs {
    font-size: 12px;
    &__inner {
      margin: 16px 0 0 20px;
      :last-child:after {
        display: none;
      }
    }
    &__link {
      &:after {
        content: "-";
        display: inline-block;
        text-decoration: none;
      }
      &_current {
        pointer-events: none;
        cursor: default;
        text-decoration: none;
      }
    }
  }
</style>