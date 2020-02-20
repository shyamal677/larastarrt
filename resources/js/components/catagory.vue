<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Catagory Table</h3>

                                <div class="card-tools">
                                    <button
                                        class="btn btn-primary"
                                        data-toggle="modal"
                                        data-target="#exampleModal"
                                    >
                                        Add New Catagory
                                    </button>
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
                                        <tr>
                                            <td>183</td>
                                            <td>John Doe</td>
                                            <td>11-7-2014</td>

                                            <td>
                                                <a href="#">
                                                    <i
                                                        class="fa fa-trash-alt red pr-2"
                                                    ></i>
                                                </a>
                                                /
                                                <a href="#">
                                                    <i
                                                        class="fa fa-edit blue pl-2"
                                                    ></i>
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
                        <h5 class="modal-title" id="exampleModalLabel">
                            Modal title
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
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
                                <has-error
                                    :form="form"
                                    field="name"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.description"
                                    type="text"
                                    name="description"
                                    placeholder="Enter Description"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'description'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="description"
                                ></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                            >
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Save changes
                            </button>
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
            form: new Form({
                name: "",
                description: ""
            })
        };
    },
    methods: {
        sendData() {
            // this.form.post("api/catagory").then(({ data }) => {
            //     alert(data.name);
            // });
            alert();
        }
    },
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
