<template>
  <section class="main container">
    <div class="main__inner">
      <h1 class="main__title">
        Калькулятор
      </h1>
      <form class="main__form">
        <label for="" class="main__form-label">Дата оформления вклада</label>
        <datepicker class="main__form-control" placeholder="дд.мм.гггг" format="dd.MM.yyyy" v-model="date" :language="ru"></datepicker>

        <label for="" class="main__form-label">Сумма вклада</label>
        <input type="text" class="main__form-control" v-model.number="depositAmount">
        <Slider @setValue="setDepositAmount" v-model="depositAmountPercent"></Slider>

        <label for="" class="main__form-label">Срок вклада</label>
        <select class="main__form-control" v-model="depositTerm">
          <option value="1">1 год</option>
          <option value="2">2 года</option>
          <option value="3">3 года</option>
          <option value="4">4 года</option>
          <option value="5">5 лет</option>
        </select>

        <label for="" class="main__form-label">Пополнение вклада</label>
        <div class="main__form-control">
          <input type="radio" name="radio" value="0" v-model="depositReplenishment"><label for="">Нет</label>
          <input type="radio" name="radio" value="1" v-model="depositReplenishment"><label for="">Да</label>
        </div>

        <label for="" class="main__form-label">Сумма пополнения вклада</label>
        <input type="text" class="main__form-control" v-model.number="depositReplenishmentAmount">
        <Slider @setValue="setDepositReplenishmentAmount" v-model="depositReplenishmentAmountPercent"></Slider>
      </form>

      <button class="main__button" @click="calculate">Рассчитать</button>
      <span class="main__result-text">Результат: </span> {{ result }} руб

    </div>
  </section>
</template>

<script>
import Slider from "./Slider.vue";
import Datepicker from 'vuejs-datepicker';
import {ru} from 'vuejs-datepicker/dist/locale'

import moment from 'moment'
import axios from 'axios'

export default {
  components: {
    Slider,
    Datepicker
  },
  computed: {
    depositAmountPercent(){
      return this.calcPercent(this.depositAmount)
    },
    depositReplenishmentAmountPercent(){
      return this.calcPercent(this.depositReplenishmentAmount)
    },
    Date(){
      return moment(this.date).format('YYYY-MM-DD')
    }
  },
  data() {
    return {
      ru,
      date: null,
      depositAmount: 1000,
      depositTerm: 1,
      depositReplenishment: 0,
      depositReplenishmentAmount: 1000,
      result: 0,
    }
  },
  methods: {
    async calculate() {
      const res = await axios.post('http://devtestapi.local/calc.php', {
        date: this.Date,
        depositAmount: this.depositAmount,
        depositTerm: this.depositTerm,
        depositReplenishment: this.depositReplenishment,
        depositReplenishmentAmount: this.depositReplenishmentAmount,
      }).catch(err => {
        throw new Error(err.message)
      })
      this.result = res.data.result
    },
    setDepositAmount(val){
      this.depositAmount = 29990 * val + 1000
    },
    setDepositReplenishmentAmount(val){
      this.depositReplenishmentAmount = 29990 * val + 1000
    },
    calcPercent(val){
      if(val >= 3000000){
        return 100
      } else if (val <= 1000){
        return 0
      }
      return Math.round((val - 1000) / 29990)
    }
  }
}
</script>

<style lang="scss">
  .main {
    &__inner {
      width: 652px;
      background: #f2f2f2;
      padding: 19px 22px;
      margin: 22px 0 0 20px;
    }
    &__title {
      font-size: 30px;
      margin: 0 0 0 98px;
      color: #eb5017;
      font-weight: 400;
    }
    &__form {
      margin: 28px 0;
      display: inline-grid;
      grid-template-columns: 175px 1fr 175px;
      grid-gap: 21px;
      column-gap: 27px;
    }
    &__form-label {
      text-align: right;
      grid-column: 1 / 2;
    }
    &__form-control {
      grid-column: 2 / 3;
      width: 88px;
      input[type=text] {
        width: 88px;
      }
    }
    &__button {
      border: 1px solid #c3c4c4;
      width: 102px;
      height: 35px;
      border-radius: 7px;
      font-weight: 600;
      background: linear-gradient(180deg, #bef435, #81c900);
      padding-top: 2px;
      outline: none;
      cursor: pointer;
      margin-right: 15px;
    }
    &__result-text {
      font-size: 12px;
      font-weight: 600;
      color: #395306;
    }
  }
</style>