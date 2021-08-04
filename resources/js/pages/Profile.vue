<template>
    <div>
        <section v-if="id">
            <h1>Hello {{ detailuser.name }}</h1>
            <h3>Email: {{ detailuser.email }}</h3>
            <!-- <router-link :to="{ username: 'User' }">Back</router-link> -->
            <router-link to="/user">Back</router-link>
        </section>
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
