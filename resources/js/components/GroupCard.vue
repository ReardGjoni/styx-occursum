<template>
    <div>
        <div>
            <div class="group-card" v-if="groups.length >= 0">
                <div v-for="group in groups" :key="group.id" class="demo-card-wide mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text"> {{ group.name }}</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        {{ group.description }}
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <router-link v-bind:to="'/group/' + group.id">
                            <a class="mdl-button"> View Group </a>
                        </router-link>
                    </div>
                    <div class="mdl-card__menu">
                        <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">share</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <infinite-loading spinner="spiral" @distance="10" @infinite="infiniteHandler">
        <div class="feedback" slot="no-more">You've reached the end  👻 </div>
        <div class="feedback" slot="no-results">No results 😶 </div>
    </infinite-loading>
    </div>
</template>


<script>
import InfiniteLoading from 'vue-infinite-loading';
import axios from 'axios';
import { setTimeout } from 'timers';


export default {
    components: {
        InfiniteLoading,
    },

    data: function() {
        return {
            groups: [],
            page: 1,
        }
    },

    methods: {
        infiniteHandler($state) {
        setTimeout(() => {
            axios.get('/api/groups', {
                params: {
                    page: this.page,
                },
            }).then(({ data }) => {
                if (data.data.length) {
                    this.page += 1;
                    this.groups.push(...data.data);
                    $state.loaded();
                } else {
                    $state.complete();
                }
            });
        }, 500);
    },
},

    mounted() {
        
    },

    created() {
        // Global Bus event handling the group search
        this.$eventBus.$on('search-groups', (searchInput) => {
            axios.get('/api/groups/search?q=' + searchInput)
                .then((response) => {
                    this.groups = response.data;
                })
                .catch((error) => {
                    console.log(error)
                });
        });
    }
}
</script>

<style scoped>

    .group-card {
        flex: 2;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    .demo-card-wide.mdl-card {
        margin: 50px;
        width: 560px;
        height: 300px;
    }

    .demo-card-wide > .mdl-card__title {
        color: #fff;
        height: 176px;
        background: url('https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940') center / cover;
    }

    .demo-card-wide > .mdl-card__menu {
        color: #fff;
    }

    .feedback {
        font-size: 24px;
        padding: 30px;
    }


</style>
