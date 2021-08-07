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
            <h1 class="m-0 text-dark">Profile</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Profile</li>
              <li class="breadcrumb-item">
                <router-link to="/user">Users</router-link>
              </li>
              <li class="breadcrumb-item">
                <router-link to="/home">Dashboard</router-link>
              </li>
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
        <div class="row">
          <div class="col-md-4 col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Profile</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Nama </strong>

                <p class="text-muted">
                  {{ detailuser.name }}
                </p>

                <hr />

                <strong
                  ><i class="fas fa-map-marker-alt mr-1"></i> Email</strong
                >

                <p class="text-muted">
                  {{ detailuser.email }}
                </p>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-md-8 col-12">
            <vue-bootstrap4-table
              class="table table-bordered table-responsive"
              :rows="users"
              :columns="columns"
              :config="config"
              @on-change-query="onChangeQuery"
              :total-rows="total_rows"
            >
              <template slot="empty-results"> Users not found </template>
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
    VueBootstrap4Table,
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
            placeholder: "Cari Nama",
          },
          sort: true,
          uniqueId: true,
        },
        {
          label: "Email",
          name: "email",
          filter: {
            type: "simple",
            placeholder: "Cari Email",
          },
          sort: true,
        },
        {
          label: "Level",
          name: "level",
          filter: {
            type: "simple",
            placeholder: "Cari Level",
          },
          sort: true,
        },
        {
          label: "Aksi",
          name: "id",
        },
      ],
      config: {
        server_mode: true, // by default false
        checkbox_rows: true,
        rows_selectable: true,
        card_title: "Data Kepala Cabang",
      },
      queryParams: {
        sort: [],
        filters: [],
        global_search: "",
        per_page: 10,
        page: 1,
      },
      total_rows: 0,
      users: [],
      detailuser: {},
    };
  },
  mounted() {
    this.getUser();
    this.getUsers();
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
            page: this.queryParams.page,
          },
        })
        .then(function (response) {
          console.log(response.data);
          console.log(response);
          self.users = response.data.data;
          self.total_rows = response.data.total;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    getUsers() {
      axios.get("/api/users").then((response) => {
        // this.users = response.data["data"];
        this.users = response.data;
      });
    },
    getUser() {
      axios.get("/api/users/" + this.id).then((response) => {
        console.log(response.data["data"]);
        this.detailuser = response.data["data"];
      });
    },
  }
};
</script>
