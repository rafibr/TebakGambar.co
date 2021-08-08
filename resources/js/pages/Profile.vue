<template>
    <!--

     -->

    <div class="no">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3>
                                    {{ detailuser.name }}
                                </h3>
                                <small class="card-title">{{
                                    detailuser.email
                                }}</small>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong
                                    ><i class="fas fa-user mr-1"></i> Jumlah
                                    Penebak:
                                    <span>{{ this.total_rows }}</span></strong
                                >

                                <hr />

                                <strong
                                    ><i class="fas fa-check mr-1"></i> Berhasil:
                                    <span>23</span></strong
                                >
                                <hr />

                                <strong
                                    ><i class="fas fa-times mr-1"></i> Gagal:
                                    <span>23</span></strong
                                >
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-9 col-12">
                        <vue-bootstrap4-table
                            class="table table-bordered table-responsive"
                            :rows="users"
                            :columns="columns"
                            :config="config"
                            @on-change-query="onChangeQuery"
                            :total-rows="total_rows"
                        >
                            <template slot="empty-results">
                                Users not found
                            </template>
                            <template slot="id" slot-scope="props">
                                <a
                                    class="btn btn-info"
                                    @click.prevent="lihatUser(props.cell_value)"
                                >
                                    Lihat
                                </a>
                            </template>
                        </vue-bootstrap4-table>
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
import VueBootstrap4Table from "vue-bootstrap4-table";

export default {
    components: {
        VueBootstrap4Table
    },
    props: ["id"],
    data() {
        return {
            columns: [
                {
                    label: "Nama",
                    name: "name",
                    filter: {
                        type: "simple",
                        placeholder: "Cari Nama"
                    },
                    sort: true,
                    uniqueId: true
                },
                {
                    label: "Kepala Cabang",
                    name: "kepala_cabang",
                    filter: {
                        type: "simple",
                        placeholder: "Cari Cabang"
                    },
                    sort: true
                },
                {
                    label: "IDNA Address",
                    name: "alamat_idena",
                    filter: {
                        type: "simple",
                        placeholder: "Cari Address"
                    },
                    sort: true
                },

                {
                    label: "Pembayaran",
                    name: "tipe_pembayaran",
                    filter: {
                        type: "simple",
                        placeholder: "Cari Pembayaran"
                    },
                    sort: true
                },
                {
                    label: "Aksi",
                    name: "id"
                }
            ],
            config: {
                server_mode: true, // by default false
                checkbox_rows: true,
                rows_selectable: true,
                card_title: "Data Penebak"
            },
            queryParams: {
                sort: [],
                filters: [],
                global_search: "",
                per_page: 10,
                page: 1
            },
            total_rows: 0,
            users: [],
            detailuser: {}
        };
    },
    watch: {
        $route: "getUser"
    },
    mounted() {
        this.getUser();
    },
    methods: {
        onChangeQuery(queryParams) {
            this.queryParams = queryParams;
            this.fetchData();
        },
        fetchData() {
            let self = this;
            axios
                .get("/api/penebak/" + this.id, {
                    params: {
                        queryParams: this.queryParams,
                        page: this.queryParams.page
                    }
                })
                .then(function(response) {
                    self.users = response.data.data;
                    self.total_rows = response.data.total;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        lihatUser(id) {
            // this.$router.push("user/" + id);
            this.$router.push({
                name: "Profile",
                params: { id }
            });
        },
        getUser() {
            axios.get("/api/user/" + this.id).then(response => {
                this.detailuser = response.data["data"];
            });
        }
    }
};
</script>
