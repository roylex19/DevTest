<template>
  <div class="wrapper">
    <input type="range" class="slider-original" min="0" max="100" :value="value" @input="setValue">

    <div class="slider">
      <div class="slider__track"></div>
      <div class="slider__range" :style="{ right: PercentRange }"></div>
      <div class="slider__thumb" :style="{ left: Percent }"></div>
      <div class="slider__values">
        <span class="slider__min-value">
          1 тыс. руб.
        </span>
          <span class="slider__max-value">
          3 000 000
        </span>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  props: {
    value: {
      type: Number,
      required: true,
      default: 0
    }
  },
  data() {
    return {
      percent: 0,
    }
  },
  computed: {
    Percent(){
      return this.value + '%';
    },
    PercentRange(){
      return 100 - this.value + '%'
    }
  },
  methods: {
    setValue(e){
      let min = parseInt(e.target.min)
      let max = parseInt(e.target.max)
      this.percent = Math.round((e.target.value - min) / (max - min) * 100)
      this.$emit('setValue', this.percent)
     }
  },
}
</script>

<style lang="scss" scoped>
  .wrapper {
    position: relative;
    width: 200px;
    height: 20px;
  }
  .slider {
    position: relative;
    z-index: 1;
    &__track {
      position: absolute;
      z-index: 1;
      border-radius: 20px;
      height: 9px;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      background-color: #000;
      border: 1px solid #fff;
      box-shadow: 0 0 7px rgba(0, 0, 0, 0.5);
      padding-right: 10px;
    }
    &__range {
      position: absolute;
      z-index: 1;
      left: 2px;
      right: 0;
      top: 2px;
      bottom: 0;
      border-radius: 20px;
      background-color: #84aa31;
      height: 5px;
    }
    &__thumb {
      position: absolute;
      z-index: 3;
      width: 9px;
      height: 9px;
      border-radius: 50%;
      background: radial-gradient(farthest-side ellipse at top left, white, #aaaaaa);
      cursor: pointer;
      transform: translate(-3px);
    }
    &__values {
      font-family: Verdana, sans-serif;
      font-style: italic;
      font-size: 10px;
      position: absolute;
      top: 15px;
      color: #676767;
      width: 100%;
    }
    &__max-value {
      float: right;
    }
  }
  .slider-original {
    position: absolute;
    z-index: 2;
    height: 10px;
    width: 100%;
    -webkit-appearance: none;
    opacity: 0;
    pointer-events: all;
    &::-webkit-slider-thumb {
      pointer-events: all;
      width: 15px;
      height: 15px;
      border-radius: 0;
      border: 0 none;
      -webkit-appearance: none;
      background-color: #eb5017;
      cursor: pointer;
    }
  }

</style>