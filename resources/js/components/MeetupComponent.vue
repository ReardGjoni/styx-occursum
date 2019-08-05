<template>
    <div class="container">
        <div class="demo-card-event mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title mdl-card--expand">
        <router-link v-bind:to="id + '/edit'" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect opt-in">
            Edit        
        </router-link>
            <h4>
            🤗 {{ meetup.title }} <br>
            📖 {{ meetup.description }} <br>
            🌠 {{ meetup.place }} <br>
            ⌚️ {{ meetup.time_happening }} <br>
            </h4>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <a  @click="$router.go(-1)" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"> Back to Group </a>
            <a  @click="deleteMethod" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"> Delete Meetup </a>

            <div class="mdl-layout-spacer"></div>
            <a  @click="$router.go(-1)" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect opt-in"> Opt in </a>
            <i class="material-icons">event</i>
        </div>
        </div>
    </div>
    
</template>

<script>
import { setTimeout } from 'timers';
import axios from 'axios';

export default {
    components: {
        /* InfiniteLoading */
    },

    data: function() {
        return {
            id : this.$route.params.id,
            meetup: [],
        }
    },

    methods: {
        deleteMethod() {
            axios.delete('/api/meetups/' + this.id)
            .then((response) => {
                this.$router.go(-1);
            })
            .catch((error) => {
                console.log(error);
            })
        }
    },

    mounted() {

    },

    created() {
        setTimeout(() => {
            axios.get('/api/meetups/' + this.id).then((response) => {
                this.meetup = response.data;
            }, 2000);
        })
    }
}
</script>

<style scoped>
    .container {
        display: flex;
        justify-content: center;    
        margin-top: 100px;
    }

    .demo-card-event.mdl-card {
        width: 100%;
        height: 80vh;
        background: #ededed;
    }
    
    .demo-card-event > .mdl-card__actions {
        border-color: rgba(255, 255, 255, 0.2);
    }
    
    .demo-card-event > .mdl-card__title {
        align-items: flex-start;
    }
    
    .demo-card-event > .mdl-card__title > h4 {
        margin-top: 0;
        font-size: 22px;
        padding-top: 50px;
        line-height: 50px;
    }
    
    .demo-card-event > .mdl-card__actions {
        display: flex;
        box-sizing:border-box;
        align-items: center;
    }
    
    .demo-card-event > .mdl-card__actions > .material-icons {
        padding-right: 10px;
    }
    
    .demo-card-event > .mdl-card__title,
    .demo-card-event > .mdl-card__actions,
    .demo-card-event > .mdl-card__actions > .mdl-button {
         color: black;
    }

    .opt-in {
        margin-right: 20px;
        color: black;
    }

    .opt-in:hover {
        background: #654ea3;
        background: -webkit-linear-gradient(to right, #eaafc8, #654ea3);
        background: linear-gradient(to right, #eaafc8, #654ea3);
    }

</style>
