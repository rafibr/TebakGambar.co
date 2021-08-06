<template>
    <div>
        <section>
            <h1>Daftar User</h1>
            <data-table
                url="http://vue-datatable.test/ajax"
                :per-page="perPage"
                :columns="columns"
            >
            </data-table>
            <!-- <table id="table_user" class="display table is-bordered data-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users">
                        <td>
                            <a href="" @click.prevent="lihatUser(user.id)">{{
                                user.name
                            }}</a>
                        </td>
                        <td>{{ user.email }}</td>
                    </tr>
                </tbody>
            </table> -->
        </section>
    </div>
</template>

<script>
export default {
    name: "app",
    props: ["id"],
    data() {
        return {

            perPage: ["10", "25", "50", "100"],
            columns: [
                {
                    label: "ID",
                    name: "id",
                    filterable: true
                },
                {
                    label: "Name",
                    name: "name",
                    filterable: true
                },
                {
                    label: "Email",
                    name: "email",
                    filterable: true
                }
            ]
        };
    },
    watch: {
        $route: "getUser"
    },
    mounted() {
        this.getUsers();
    },
    methods: {
        getUsers() {
            axios.get("/api/users").then(response => {
                this.users = response.data["data"];
            });
        },
        lihatUser(id) {
            this.$router.push("user/" + id);
            // this.$router.push({
            //     name: "Profile",
            //     params: { id }
            // });
        }
    }
};
</script>
