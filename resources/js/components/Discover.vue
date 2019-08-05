<template>
    <div class="app">
        <Searchbar></Searchbar>
        <GroupCard></GroupCard>
    </div>
</template>


<script>

import Searchbar from './Searchbar';
import GroupCard from './GroupCard';
import axios from 'axios';

export default {
    components: {
        Searchbar,
        GroupCard,
    },
    
    mounted() {
        
    },

    created() {
        this.$eventBus.$on('search-groups', (searchInput) => {
            console.log(searchInput);
            axios.get('/api/groups/search?q=' + searchInput)
                .then((response) => {
                    this.groups = response.data;
                    console.log(this.groups)
                })
                .catch((error) => {
                    console.log(error)
                });
        });
    }

}

</script>

<style scoped>
    .app {
        flex: 10;
        height: 100%;
    }
</style>


