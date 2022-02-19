<template>
  <div>
    <div class="form__input">
      <v-swatches
          v-model="color"
          row-length="12"
          v-on="listeners"
          inline
          popover-x="left"
          :swatches="swatches"
      ></v-swatches>
    </div>
    <input :name="nameinput" :value="value" hidden>
  </div>
</template>

<script>
import VSwatches from 'vue-swatches'

// Import the styles too, typically in App.vue or main.js
import 'vue-swatches/dist/vue-swatches.css'

export default {
  name: "ColorPiker",
  components: { VSwatches },
  props: ['nameinput','data'],
  data() {
    return {
      color: '' ,
      value: '',
      swatches: ['#1FBC9C', '#1CA085', '#2ECC70', '#27AF60', '#3398DB',
        '#2980B9', '#A463BF', '#8E43AD', '#3D556E', '#222F3D', '#F2C511', '']
    }
  },
  created() {
    this.color = this.data;
    this.value = this.data;
  },
  computed: {
    listeners() {
      return {
        ...this.$listeners,
        input: this.updateColorValue
      };
    }
  },

  methods: {
    updateColorValue(event) {
      console.log(event)
      this.value = event;
    }
  }
}
</script>