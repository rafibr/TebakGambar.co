<template>
    <div class="no">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Users</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Users</li>
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
                    <div class="col">
                        <vue-bootstrap4-table class="table table-bordered table-responsive"
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
                        <!-- <table id="table_user" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table> -->
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
                    label: "Email",
                    name: "email",
                    filter: {
                        type: "simple",
                        placeholder: "Cari Email"
                    },
                    sort: true
                },
                {
                    label: "Level",
                    name: "level",
                    filter: {
                        type: "simple",
                        placeholder: "Cari Level"
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
                card_title: "Data Kepala Cabang"
            },
            queryParams: {
                sort: [],
                filters: [],
                global_search: "",
                per_page: 10,
                page: 1
            },
            total_rows: 0,
            users: []
        };
    },
    watch: {
        $route: "getUser"
    },
    methods: {
        onChangeQuery(queryParams) {
            this.queryParams = queryParams;
            this.fetchData();
        },
        fetchData() {
            let self = this;
            axios
                .get("/api/users", {
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
        }
    }
};
</script>
