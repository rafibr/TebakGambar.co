<template>
    <div class="container bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <router-link class="navbar-brand" :to="{ name: 'Home' }">
                <img
                    src="/docs/4.0/assets/brand/bootstrap-solid.svg"
                    width="30"
                    height="30"
                    class="d-inline-block align-top"
                    alt=""
                />
                Bootstrap
            </router-link>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'Home' }">
                            Home
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link
                            class="nav-link"
                            v-bind:to="{ name: 'About' }"
                        >
                            About
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'User' }">
                            User
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>
