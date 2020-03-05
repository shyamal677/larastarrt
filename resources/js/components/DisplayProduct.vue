<template>
  <div class="container-fluid">
    <div
      v-for="product in products"
      :key="product.product_name"
      class="item col-xs-12 col-lg-3 col-sm-6"
    >
      <div class="thumbnail card mb-4">
        <div class="img-event">
          <img
            class="group list-group-image img-fluid"
            style="max-height:4cm;"
            src="/storage/cover_images/a"
            alt
          />
        </div>
        <div class="caption card-body">
          <h4
            class="group card-title inner list-group-item-heading text-dark"
          >{{product.product_name}}</h4>

          <div class="row">
            <div class="col-xs-12 col-md-6">
              <p class="lead text-darker">Rs : {{product.price}}</p>
            </div>
            <div class="col-xs-12 col-md-6">
              <router-link :to="{ path: '/Show/'+  product.product_name  }" class="nav-link">
                <p>Show more...</p>
              </router-link>
              <!-- <a
                class="btn btn-success btn-sm pr-3"
                href="../product/{{product.image_1}}"
              >Show more..</a>-->
            </div>
          </div>

          <hr />
          <div class="row">
            <div class="col-6">
              <a class="btn btn-dark btn-sm ml-2" href="product/a/edit">Edit</a>
            </div>
            <div class="col-6"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">I'm an example component {{$route.params.Cid}}.</div>
    <!-- <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component</div>

          <div class="card-body">I'm an example component {{$route.params.Cid}}.</div>
        </div>
      </div>
    </div>-->
  </div>
</template>

<script>
export default {
  data() {
    return {
      displyId: "",
      products: {}
    };
  },
  methods: {
    load_disply_itms(id) {
      console.log("im in methode: " + id);
      axios
        .get("/api/showItems/" + id)
        .then(response => {
          this.products = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
  created() {
    this.displyId = this.$route.params.Cid;
    this.load_disply_itms(this.displyId);
    console.log(this.displyId);
  },
  mounted() {
    console.log("Component mounted.");
  },
  updated() {
    // this.displyId = this.$route.params.Cid;
    // this.load_disply_itms(this.displyId);
    // console.log(this.displyId);
  }
};
</script>
