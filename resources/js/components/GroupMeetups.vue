<template>
    <div class="container">
        <div class="group-details">
            <div class="demo-card-image mdl-card mdl-shadow--2dp">
                <div class="mdl-card__actions">
                    <span class="demo-card-image__filename"> {{ group.group_name }} </span>
                </div>
                <div class="mdl-card__title mdl-card--expand"></div>

                <div class="buttons">
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect follow">
                        Follow
                    </button>
                    <router-link tag:="button" v-bind:to="id + '/create/'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect follow">
                        Create an Event
                    </router-link>
                </div>
            </div>

            <div class="description">
                {{ group.group_description }}
            </div>
        </div>


        <div class="event-container">
            <div class="greeting">
                Hello {{ username }}, it's great to have you here. <br> Here are the Events of this group, have fun 🤙
            </div>

            <!--- Event Card -->
            <div class="event">
                <div v-for="meetup in meetups" :key="meetup.id" class="demo-card-event mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-card--expand">
                    <div class="meetup-description">
                        <h4>
                            {{ meetup.meetup_title }} <br> happening on
                            {{ meetup.time_happening }} at
                            {{ meetup.meetup_place }}
                        </h4>

                        <p>
                            {{ meetup.meetup_description }}
                        </p>
                    </div>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <router-link v-bind:to= "id + '/meetup/' + meetup.meetup_id">
                            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect more-details"> More details </a>
                        </router-link>
                        <div class="mdl-layout-spacer"></div>
                        <i class="material-icons">event</i>
                    </div>
                </div>
            </div>
        </div>
        <div class="back-button">
            <button @click="$router.push({path: '/'})" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored backbtn">
                Back to Groups
            </button>
        </div>
    </div>
</template>

<script>
import { setTimeout } from 'timers';
import axios from 'axios';


export default {
    components: {
        
    },

    data: function() {
        return {
            id : this.$route.params.id,
            group : [],
            meetups: [],
            page: 1,
            username: ''
        }
    },

    methods: {
        
    },

    mounted() {
        if (this.isLoggedIn)
            this.getUser();
            setTimeout(() => {
                axios.get('/api/user', function() {

                }).then((response) => {
                    this.username = response.data.name;
                    console.log(response.data.name);
                });
        }, 200);
    },

    created() {
        setTimeout(() => {
            axios.get('/api/groups/' + this.id).then((response) => {
                this.group = response.data.data[0];
                this.meetups = response.data.data;
            }, 2000);
        })
    }
}
</script>


<style scoped>

    .buttons {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .buttons button, .follow {
        margin: 1rem;
        background-color: rgba(255, 255, 255, 0.8);
        color: black;
    }

    .buttons button:first-child > i {
        margin-left: 4px;
    }

    .back-button {
        position: fixed;
        bottom: 40px;
    }

    .backbtn {
        color: black !important;
    }

    .more-details {
        color: black;
    }

    .more-details:hover, .more-details:active {
        background-color: white;
    }

    .container {
        display: flex;
        justify-content: space-between;
        align-self: flex-start;
        flex-direction: row;
        flex-wrap: wrap;
        font-family: 'Roboto';
    }

    .group-details {
        display: flex;
        max-width: 90vw;
        margin: 0 auto;
    }

    .group-details .demo-card-image, .group-details .description {
        margin: 20px;
    }

    .demo-card-image.mdl-card {
        margin-top: 10rem;
        width: 50vw;
        height: 50vh;
        background: url('https://images.pexels.com/photos/745045/pexels-photo-745045.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940') center / cover;
    }

    .demo-card-image > .mdl-card__actions {
        height: 60px;
        padding: 16px;
        background: rgba(0, 0, 0, 0.5);
    }

    .demo-card-image__filename {
        color: #fff;
        font-size: 22px;
        font-weight: 500;
    }

    .description {
        font-size: 34px;
        width: 40vw;
        word-wrap: break-word;
        line-height: 50px;
        align-self: center;
        justify-self: flex-start;
        margin: 0 auto;
        font-weight: 400;
    }


    .event {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .greeting {
        display: flex;
        justify-content: center;
        margin-top: 200px;
        margin-bottom: 100px;
        font-size: 28px;
        text-align: center;
        line-height: 50px;
    }

    .demo-card-event.mdl-card {
        width: 950px;
        max-width: 1000px;
        height: 286px;
        margin: 100px;
        background: #3494E6;
        background: -webkit-linear-gradient(to top, #EC6EAD, #3494E6);
        background: linear-gradient(to top, #EC6EAD, #3494E6);
        transition: all 400ms ease-in-out;
        -webkit-transition: all 400ms ease-in-out;
        -moz-transition: all 400ms ease-in-out;
    }

    .demo-card-event.mdl-card:nth-child(odd) {
        margin-top: 10px;
    }

    .demo-card-event:hover {
        box-shadow: 1px 1px 15px rgba(0, 0, 0, 0.4);
        transition: all 600ms ease-in-out;
        -webkit-transition: all 600ms ease-in-out;
        -moz-transition: all 600ms ease-in-out;
        height: 356px;
        margin: 100px;
    }

    .demo-card-event:hover .mdl-card__actions, .demo-card-event:hover .meetup-description p {
        opacity: 1;
        transition: all 600ms ease-in-out;
        -webkit-transition: all 600ms ease-in-out;
        -moz-transition: all 600ms ease-in-out;
    }

    .demo-card-event > .mdl-card__actions {
        border-color: rgba(255, 255, 255, 0.2);
        background-color: rgba(0, 0, 0, 0.1);
        transition: all 300ms ease-in-out;
        -webkit-transition: all 300ms ease-in-out;
        -moz-transition: all 300ms ease-in-out;
        opacity: 0;
    }
    .demo-card-event > .mdl-card__title {
        align-items: flex-start;
    }
    .demo-card-event > .mdl-card__title > h4 {
        margin-top: 0;
        font-size: 22px;
        padding-top: 10px;
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
        color: #fff;
    }

    .loader {
        display: flex;
        justify-content: center;
    }

    .meetup-description p {
        font-size: 20px;
        margin-top: 60px;
        opacity: 0;
        transition: all 600ms ease-in-out;
        -webkit-transition: all 600ms ease-in-out;
        -moz-transition: all 600ms ease-in-out;
    }


</style>
