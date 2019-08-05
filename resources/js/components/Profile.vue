<template>
    <div>
        <h2 style="text-align:center">User Profile Card</h2>

<div class="card">
  <img src="https://images.pexels.com/photos/374044/pexels-photo-374044.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="John">
  <h1>{{ username }}</h1>
  <p class="email">{{ email }}</p>
  <p class="personDesc">Hallo. Ich bin ein kleiner Blindtext. Und zwar schon so lange ich denken kann. </br> Es war nicht leicht zu verstehen, was es bedeutet, ein blinder Text zu sein: </br> Man macht keinen Sinn.</p>
  <p><button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored contactBtn">Contact</button></p>
<p><button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored discover" @click="$router.push({path: '/'})">Discover</button></p>
</div>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex';
    import { setTimeout } from 'timers';
    import axios from 'axios';

    export default {

        data: function() {
            return {
                username: '',
                email: '',
            }
        },

        mounted() {
            if (this.isLoggedIn)
                this.getUser();
                setTimeout(() => {
                    axios.get('/api/user', function() {

                    }).then((response) => {
                        this.username = response.data.name;
                        this.email = response.data.email;
                    });
                }, 200);
        }
    }
</script>

<style scoped>

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        width: 100%;
        height: 80vh;
        text-align: center;
        font-family: arial;

        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        margin: 0 auto;
    }

    .email {
        color: grey;
        font-size: 18px;
    }

    .contactBtn {
        margin-top: 20px;
        width: 10%;
        color: black !important;
        width: 150px;
        background: #654ea3;
        background: -webkit-linear-gradient(to right, #eaafc8, #654ea3);
        background: linear-gradient(to right, #eaafc8, #654ea3);
    }

    .discover {
        margin-top: 20px;
        color: black;
    }

    .personDesc {
        font-size: 16px;
    }
</style>