<template>
  <!-- <div class="container">
    d
    <ul>
      <li>cheh</li>
    </ul>
    <ul>
      <li v-for="item in navitem" :key="item.id">{{item.catagory_name}}</li>
    </ul>
  </div>-->
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link pr-3" href="/">
        Home
        <span class="sr-only">(current)</span>
      </a>
    </li>
    <router-link
      v-for="item in navitem"
      :key="item.id"
      :to="{ path: '/Display/'+  item.id  }"
      class="nav-link"
    >
      <p>{{item.catagory_name}}</p>
    </router-link>

    <!-- <li v-for="item in navitem" :key="item.id" class="nav-item pr-3">
      <a class="nav-link" :href="item.id">{{item.catagory_name}}</a>
    </li>-->
  </ul>
</template>

<script>
export default {
  data() {
    return {
      navitem: {}
    };
  },

  methods: {
    loadnav() {
      axios
        .get("api/catagory")
        .then(response => {
          this.navitem = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
  created() {
    this.loadnav();
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
