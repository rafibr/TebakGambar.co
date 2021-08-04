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
        </section>
    </div>
</template>

<script>
export default {
    props: ["id"],
    data() {
        return {
            users: []
        };
    },
    watch: {
        $route: "getUser"
    },
    mounted() {
        this.getUser();
    },
    methods: {
        getUser() {
            axios.get("/api/users").then(response => {
                // console.log(response.data);
                this.users = response.data["data"];
            });
        },
        lihatUser(id) {
            // this.$router.push("user/" + name.toLowerCase());
            this.$router.push({
                name: "Profile",
                params: { id }
            });
        }
    }
};
</script>
