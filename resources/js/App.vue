<template>
<div id="app">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">
                <router-link to="/">Styx Occursum</router-link>
            </span>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <router-link v-if="isLoggedIn" to="/profile" class="mdl-navigation__link">{{ username }}</router-link>

                <a v-if="isLoggedIn" @click="submitLogout" class="mdl-navigation__link">Logout</a>

                <router-link v-if="!isLoggedIn" to="/login" class="mdl-navigation__link">Login</router-link>

                <router-link v-if="!isLoggedIn" to="/register" class="mdl-navigation__link">Register</router-link>

                <router-link v-if="isLoggedIn" to="/admin" class="mdl-navigation__link">Administrator users overview</router-link>

            </nav>
        </div>

        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Styx Occursum</span>
            <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
            </nav>
        </div>
        <keep-alive>
            <router-view :key="$route.fullPath"></router-view>
        </keep-alive>
    </div>
</div>
</template>


<style>
    body{
        background-color: #ededed;
    }

    header.mdl-layout__header, .mdl-layout__drawer {
        position: fixed;
    }

    .mdl-layout__header-row, .mdl-layout__drawer-button {
        background-color: black !important;
    }

    .mdl-layout-title a {
        color: white;
        text-decoration: none;
        font-weight: 400;
    }

</style>

<script>
    import { mapActions, mapGetters } from 'vuex';
    import { setTimeout } from 'timers';
    import axios from 'axios';

    export default {

        data: function() {
            return {
                username: ''
            }
        },

        computed : {
            ...mapGetters(['isLoggedIn']),
        },
        methods: {
            ...mapActions(['logout', 'getUser']),

            submitLogout() {
                this.logout();

                this.$router.push('/login');
            }
        },
        mounted() {
            if (this.isLoggedIn)
                this.getUser();
                setTimeout(() => {
                    axios.get('/api/user', function() {

                    }).then((response) => {
                        this.username = response.data.name;
                    });
                }, 200);
        }
    }
</script>