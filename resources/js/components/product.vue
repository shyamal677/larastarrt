<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="row">
          <div class="col-12 mt-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Our Product Table</h3>

                <div class="card-tools">
                  <button class="btn btn-primary" @click="newModel()">Add New Product</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr class="bg-dark">
                      <th>Product name</th>
                      <th>description</th>
                      <th>catagory</th>
                      <th>price</th>
                      <th>quntity</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="product in product" :key="product.id">
                      <th>{{ product.product_name }}</th>
                      <th>{{ product.description }}</th>
                      <th>{{ product.catagory }}</th>
                      <th>{{ product.price }}</th>
                      <th>{{ product.quntity }}</th>

                      <td>
                        <a href="#" @click="deletecatagory(catagory.id)">
                          <i class="fa fa-trash-alt red pr-2"></i>
                        </a>
                        /
                        <a href="#" @click="EditModel(product)">
                          <i class="fa fa-edit blue pl-2"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="sendData" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label>Product Name</label>
                <input
                  v-model="form.product_name"
                  type="text"
                  name="product_name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('product_name') }"
                />
                <has-error :form="form" field="product_name"></has-error>
              </div>
              <div class="form-group">
                <label>Product Catagory</label>
                <select
                  v-model="form.catagory"
                  type="text"
                  name="catagory"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('catagory') }"
                >
                  <option value>select catagory</option>
                  <option
                    v-for="item in catagory"
                    :key="item.id"
                    :value="item.id"
                  >{{item.catagory_name}}</option>
                </select>
                <has-error :form="form" field="catagory"></has-error>
              </div>
              <div class="form-group">
                <label>Product Description</label>
                <textarea
                  v-model="form.description"
                  name="description"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('description') }"
                ></textarea>
                <has-error :form="form" field="description"></has-error>
              </div>
              <div class="form-group">
                <label>Product Price</label>
                <input
                  v-model="form.price"
                  type="number"
                  min="10"
                  step="100.00"
                  name="price"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('price') }"
                />
                <has-error :form="form" field="price"></has-error>
              </div>
              <div class="form-group">
                <label>quntity</label>
                <input
                  v-model="form.quntity"
                  type="number"
                  name="quntity"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('quntity') }"
                />
                <has-error :form="form" field="quntity"></has-error>
              </div>
              <div class="form-group">
                <label>image 1</label>
                <input
                  @change="onselect1"
                  type="file"
                  name="image_1"
                  class="form-control"
                  multiple
                  :class="{ 'is-invalid': form.errors.has('image_1') }"
                />
                <has-error :form="form" field="image_1"></has-error>
              </div>
              <div class="form-group">
                <label>image 2</label>
                <input
                  @change="onselect2"
                  type="file"
                  name="image_2"
                  class="form-control"
                  multiple
                  :class="{ 'is-invalid': form.errors.has('image_2') }"
                />
                <has-error :form="form" field="image_2"></has-error>
              </div>
              <div class="form-group">
                <label>image 3</label>
                <input
                  @change="onselect3"
                  type="file"
                  name="image_3"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('image_3') }"
                />
                <has-error :form="form" field="image_3"></has-error>
              </div>
              <div class="form-group">
                <label>image 4</label>
                <input
                  @change="onselect4"
                  type="file"
                  name="image_4"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('image_4') }"
                />
                <has-error :form="form" field="image_4"></has-error>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /main scope -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      product: {},
      catagory: {},
      form: new Form({
        product_name: "",
        catagory: "",
        description: "",
        price: "",
        quntity: "",
        image_1: "",
        image_2: "",

        image_3: "",
        image_4: ""
      })
    };
  },
  methods: {
    onselect1(e) {
      let selectFile = e.target.files[0];
      let reader = new FileReader();
      reader.onloadend = selectFile => {
        this.form.image_1 = reader.result;
      };
      reader.readAsDataURL(selectFile);
    },
    onselect2(e) {
      let selectFile = e.target.files[0];
      let reader = new FileReader();
      reader.onloadend = selectFile => {
        this.form.image_2 = reader.result;
      };
      reader.readAsDataURL(selectFile);
    },
    onselect3(e) {
      let selectFile = e.target.files[0];
      let reader = new FileReader();
      reader.onloadend = selectFile => {
        this.form.image_3 = reader.result;
      };
      reader.readAsDataURL(selectFile);
    },
    onselect4(e) {
      let selectFile = e.target.files[4];
      let reader = new FileReader();
      reader.onloadend = selectFile => {
        this.form.image_4 = reader.result;
      };
      reader.readAsDataURL(selectFile);
    },
    loadData() {
      axios
        .get("api/ourproduct")
        .then(({ data }) => (this.product = data.data));
    },

    GetCatagory() {
      axios.get("api/catagory").then(({ data }) => (this.catagory = data));
    },

    newModel() {
      this.form.reset();
      $("#exampleModal").modal("show");
    },
    EditModel(product) {
      this.form.reset();
      $("#exampleModal").modal("show");
      this.form.fill(product);
    },

    sendData() {
      const config = {
        headers: { "content-type": "multipart/form-data" }
      };
      this.form.post("api/ourproduct").then(() => {
        Toast.fire({
          icon: "success",
          title: "New catagory created in successfully"
        });
        this.form.reset();
        $("#exampleModal").modal("hide");
      });

      this.loadData();
    },
    deletecatagory(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        if (result.value) {
          this.form.delete("api/ourproduct/" + id).then(() => {
            this.loadData();
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
          });
        }
      });
    }
  },
  created() {
    this.loadData();
    this.GetCatagory();
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
