<template>
  <div class="edit-comp">
    <div class="card" v-for="product in products">
      <input type="text" v-model="product.name" v-on:keyup.enter="updateProduct(product)">
    </div>
  </div>
</template>

<script>
  export default {
      mounted() {
        console.log('mounted');
        this.shopping_list_id = _.last(window.location.pathname.split('/'))
        console.log(this.shopping_list_id);
        
        if (this.shopping_list_id != null) {
          console.log('Not Null');
          this.getProducts();
        };
    },
    data: function() {
        return {
            products : [],
            shopping_list_id: null
        }
    },
    methods: {
      getProducts: function () {
        axios.get(`http://grocerylist.test/lists/${this.shopping_list_id}/products`).then((response) => {
          console.log(response.data);
          this.products = response.data
        }, (error) => {
          console.log(error);
        });
      },
      updateProduct: function (product) {
        axios.patch(`http://grocerylist.test/lists/${this.shopping_list_id}/products/${product.id}/update`, {
            'name': product.name,
            //'id': $shopping_list.id,
        }).then((response) => {
           //this.toggleItemStatus(item);
        });
      }
    }
  }
</script>

<style lang="css">
</style>
