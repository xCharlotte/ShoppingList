<template> 
   <!-- <button v-on:click="counter()">You clicked me {{ count }} times.</button> -->
   <button v-on:click="counterUp()">+{{ count }}</button>
   <!-- <button v-on:click="counterDown()">-</button> -->
</template>

<script>
  export default {
    data: function () {
      return {
        count: 0
      }
    },
    methods: {
      counterUp() {
        this.count++
      },
      counterDown() {
        this.count--
      },
    }
  }
</script>