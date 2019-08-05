<template>
    <div>
        <div class="mdl-grid">
                <form action="#" method="POST">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                        <input class="mdl-textfield__input ripple" type="text" id="title" v-model="title">
                        <label class="mdl-textfield__label" for="title"></label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                        <textarea class="mdl-textfield__input" type="text" rows= "3" id="description" v-model="description"></textarea>
                        <label class="mdl-textfield__label" for="description"></label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
                        <input class="mdl-textfield__input ripple" type="text" id="place" v-model="place">
                        <label class="mdl-textfield__label" for="place"></label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--4-col">
                        <input class="mdl-textfield__input" type="text" id="time" v-model="time">
                        <label class="mdl-textfield__label" for="time"></label>
                    </div>
                    
                    <button @click.prevent="edit" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored 
                                                                            mdl-cell mdl-cell--2-col create">
                        Finish Edit
                    </button>
                </form>
        </div>

        <button @click="$router.go(-1)" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored backbtn mdl-grid">
            Back to Meetup
        </button>
        <keep-alive>
            <router-view/>
        </keep-alive>
    </div>
</template>
<script>
import { setTimeout } from 'timers';
import axios from 'axios';
import { mapActions } from 'vuex';


export default {
    components: {
    },

    data: function() {
        return {
            id : this.$route.params.id,
            title: [],
            description: [],
            place: [],
            time: [],
        }
    },

    methods: {
        edit() {
            axios.put('/api/meetups/' + this.id, {
                title : this.title,
                description: this.description,
                place: this.place,
                time_happening: this.time,
                group_id: this.group_id,
            }).then((response) => {
                this.$router.go(-1);
            }).catch((error) => {
                console.log(error);
            });
        }
    },

    mounted() {

    },

    created() {
        axios.get('/api/meetups/' + this.id, function(){
        }).then((response) => {
            console.log(response.data);
            this.title = response.data.title,
            this.description = response.data.description,
            this.place = response.data.place,
            this.time = response.data.time_happening
        }).catch((error) => {
            console.log(error);
        });
    }
}
</script>

<style scoped>
    
    .mdl-grid {
        align-content: center;
        margin-top: 200px;
        justify-content: center;
    }

    .mdl-textfield__input{
        border-bottom: 1.2px solid black;
    }

    .mdl-textfield__label{
        color: rgb(0, 0, 0);
    }

    .mdl-textfield.is-focused .mdl-textfield__label {
        color: rgb(0, 0, 0);
    }

    .mdl-textfield__label:after{
        background: #654ea3;
        background: -webkit-linear-gradient(to right, #eaafc8, #654ea3);
        background: linear-gradient(to right, #eaafc8, #654ea3);
    }

    .create {
        color: black !important;
        width: 150px;
        background: #654ea3;
        background: -webkit-linear-gradient(to right, #eaafc8, #654ea3);
        background: linear-gradient(to right, #eaafc8, #654ea3);
    }
    
    .backbtn {
        color: black;
        justify-content: flex-start;
    }

</style>