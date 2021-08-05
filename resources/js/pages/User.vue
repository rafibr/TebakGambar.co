<template>
    <div>
        <section>
            <h1>Daftar User</h1>
            <ul>
                <li v-for="user in users">
                    <!-- <router-link :to="profile_uri(user.name)">
                        {{ user.name }}
                    </router-link> -->
                    <a href="" @click.prevent="lihatUser(user.id)">{{
                        user.name
                    }}</a>
                </li>
            </ul>

            <section v-if="id">
                <h1>Hello {{ detailuser.name }}</h1>
                <h3>Email: {{ detailuser.email }}</h3>
                <router-link :to="{ username: 'User' }">Back</router-link>
                <router-link to="/user">Back</router-link>
            </section>
        </section>
    </div>
</template>

<script>
export default {
    props: ["id"],
    data() {
        return {
            users: [],
             detailuser: {}
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
                // console.log(response.data);
                this.users = response.data["data"];
            });
        },
         getUser() {
            axios.get("/api/users/" + this.id).then(response => {
                console.log(response.data["data"]);
                this.detailuser = response.data["data"];
            });
        },
        lihatUser(id) {
            // this.$router.push("user/" + name.toLowerCase());
            this.$router.push({
                name: "User",
                params: { id }
            });
        }
    }
};
</script>
