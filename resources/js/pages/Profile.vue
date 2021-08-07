<template>
    <div>
        <section v-if="id">
            <h1>Hello {{ detailuser.name }}</h1>
            <h3>Email: {{ detailuser.email }}</h3>
            <!-- <router-link :to="{ username: 'User' }">Back</router-link> -->
            <router-link to="/user">Back</router-link>
        </section>
        <div class="info-box"><span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span> <div class="info-box-content"><span class="info-box-text">Messages</span> <span class="info-box-number">1,410</span></div></div>
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
