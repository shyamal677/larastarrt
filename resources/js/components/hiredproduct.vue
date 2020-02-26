<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="row">
          <div class="col-12 mt-5">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Hired Product Table</h3>

                <div class="card-tools">
                  <button class="btn btn-primary" @click="newModel()">Add New Catagory</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>catagory name</th>
                      <th>description</th>
                      <th>modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="catagory in catagories" :key="catagory.id">
                      <th>{{ catagory.id }}</th>
                      <th>{{ catagory.catagory_name }}</th>
                      <th>{{ catagory.description }}</th>

                      <td>
                        <a
                          href="#"
                          @click="
                                                        deletecatagory(
                                                            catagory.id
                                                        )
                                                    "
                        >
                          <i class="fa fa-trash-alt red pr-2"></i>
                        </a>
                        /
                        <a href="#" @click="EditModel(catagory)">
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
          <form @submit.prevent="sendData">
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.name"
                  type="text"
                  name="name"
                  placeholder="Enter Catagory Name"
                  class="form-control"
                  :class="{
                                        'is-invalid': form.errors.has('name')
                                    }"
                />
                <has-error :form="form" field="name"></has-error>
              </div>
              <div class="form-group">
                <input
                  style="font-weight:bold"
                  v-model="form.description"
                  type="text"
                  name="description"
                  placeholder="Enter Description"
                  class="form-control text-dark"
                  :class="{
                                        'is-invalid': form.errors.has(
                                            'description'
                                        )
                                    }"
                />
                <has-error :form="form" field="description"></has-error>
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
      catagories: {},
      form: new Form({
        name: "",
        description: ""
      })
    };
  },
  methods: {
    loadData() {
      axios
        .get("api/catagory")
        .then(({ data }) => (this.catagories = data.data));
    },

    newModel() {
      this.form.reset();
      $("#exampleModal").modal("show");
    },
    EditModel(catagory) {
      this.form.reset();
      $("#exampleModal").modal("show");
      this.form.fill(catagory);
    },

    sendData() {
      this.form.post("api/catagory");
      Toast.fire({
        icon: "success",
        title: "New catagory created in successfully"
      });
      $("#exampleModal").modal("hide");
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
          this.form.delete("api/catagory/" + id).then(() => {
            this.loadData();
            Swal.fire("Deleted!", "Your file has been deleted.", "success");
          });
        }
      });
    }
  },
  created() {
    this.loadData();
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
