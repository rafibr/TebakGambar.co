<template>
    <!-- <section v-if="id">
            <h1>Hello {{ detailuser.name }}</h1>
            <h3>Email: {{ detailuser.email }}</h3>
            <router-link to="/user">Back</router-link>
        </section> -->

    <div class="no">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <section class="content">
            <div class="container">
                <h5 class="mb-2">Info Box</h5>
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong
                                    ><i class="fas fa-book mr-1"></i>
                                    Education</strong
                                >

                                <p class="text-muted">
                                    B.S. in Computer Science from the University
                                    of Tennessee at Knoxville
                                </p>

                                <hr />

                                <strong
                                    ><i class="fas fa-map-marker-alt mr-1"></i>
                                    Location</strong
                                >

                                <p class="text-muted">Malibu, California</p>

                                <hr />

                                <strong
                                    ><i class="fas fa-pencil-alt mr-1"></i>
                                    Skills</strong
                                >

                                <p class="text-muted">
                                    <span class="tag tag-danger"
                                        >UI Design</span
                                    >
                                    <span class="tag tag-success">Coding</span>
                                    <span class="tag tag-info">Javascript</span>
                                    <span class="tag tag-warning">PHP</span>
                                    <span class="tag tag-primary">Node.js</span>
                                </p>

                                <hr />

                                <strong
                                    ><i class="far fa-file-alt mr-1"></i>
                                    Notes</strong
                                >

                                <p class="text-muted">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Etiam fermentum enim neque.
                                </p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-8 col-12">
                        <table>
                            <tr>
                                <td>
                                    <h5>test</h5>
                                </td>
                                <td>
                                    <h5>test</h5>
                                </td>
                                <td>
                                    <h5>test</h5>
                                </td>
                                <td>
                                    <h5>test</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>test</h5>
                                </td>
                                <td>
                                    <h5>test</h5>
                                </td>
                                <td>
                                    <h5>test</h5>
                                </td>
                                <td>
                                    <h5>test</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>test</h5>
                                </td>
                                <td>
                                    <h5>test</h5>
                                </td>
                                <td>
                                    <h5>test</h5>
                                </td>
                                <td>
                                    <h5>test</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>test</h5>
                                </td>
                                <td>
                                    <h5>test</h5>
                                </td>
                                <td>
                                    <h5>test</h5>
                                </td>
                                <td>
                                    <h5>test</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>test</h5>
                                </td>
                                <td>
                                    <h5>test</h5>
                                </td>
                                <td>
                                    <h5>test</h5>
                                </td>
                                <td>
                                    <h5>test</h5>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>

        <!-- /.content -->
    </div>
</template>

<script>
export default {
    props: ["id"],
    data() {
        return {
            detailuser: {}
        };
    },
    mounted() {
        this.getUser();
    },
    methods: {
        getUser() {
            axios.get("/api/users/" + this.id).then(response => {
                console.log(response.data["data"]);
                this.detailuser = response.data["data"];
            });
        }
    }
};
</script>
