<template>
  <div>
    <button
      type="button"
      id="checkOut"
      data-toggle="modal"
      class="btn btn-success"
      data-target="#checkOutModal"
    >
      Checkout
      <span class="glyphicon glyphicon-play"></span>
    </button>

    <!-- start of modal -->

    <div class="modal fade" id="checkOutModal">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editi details</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="createorder()">
            <div class="modal-body">
              <div class="form-group row">
                <label for="contactNo" class="col-sm-4 col-form-label">Contact Number</label>
                <div class="col-sm-8">
                  <span>(requested format : 07*-*******)</span>
                  <input
                    v-model="form.contactNo"
                    type="tel"
                    name="contactNo"
                    placeholder="please enter like 071-0000000"
                    pattern="[0-9]{3}-[0-9]{7}"
                    class="form-control"
                    :class="{'is-invalid': form.errors.has('contactNo')  }"
                  />
                  <has-error :form="form" field="contactNo"></has-error>
                </div>
              </div>
              <div class="form-group row">
                <label for="address" class="col-sm-4 col-form-label">Delevery Address</label>
                <div class="col-sm-8">
                  <textarea
                    rows="5"
                    v-model="form.address"
                    type="text"
                    name="address"
                    placeholder="Enter the address that order should delevery"
                    class="form-control"
                    :class="{'is-invalid': form.errors.has('address')  }"
                  ></textarea>
                  <has-error :form="form" field="address"></has-error>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">create</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- end of modal -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      check: "",
      form: new Form({
        contactNo: "",
        address: ""
      })
    };
  },
  props: ["userid"],
  methods: {
    createorder() {
      this.form
        .post("/cart")
        .then(response => {
          Toast.fire({
            icon: "success",
            title: "New catagory created in successfully"
          });
          $("#checkOutModal").modal("hide");
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
  mounted() {
    console.log(this.userid);
  }
};
</script>
