<template>
    <form action="#" autocomplete="off" class="searchform">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label searchdiv">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="searchBar">
                <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
                <label class="mdl-textfield__label" for="searchBar"></label>
                <input @keyup="searchMethod" @keyup.enter="searchMethod" v-model="searchInput" class="mdl-textfield__input" type="text" id="searchBar" :placeholder="placeholder">
            </div>
      </div>
    </form>
</template>



<script>
import _ from 'lodash';

export default {

    data: function() {
        return {
            searchInput: '',
            placeholder: 'What interests you lately?',
        }
    },

    mounted() {
        
    },

    methods: {
        searchMethod: _.debounce(function() {
            this.$eventBus.$emit('search-groups', this.searchInput);
        }, 1500) // initiates the search-groups event every 1.5 seconds
    }
}
</script>

<style scoped>

.searchform {
    flex: 2;
    display: flex;
    justify-content: center;
    align-self: flex-start;
    margin-top: 100px;
}

.searchdiv, div input, div .mdl-textfield__label {
    width: 22vw;
}

textarea {
  resize: none;
}

.searchform .mdl-textfield__label {
    color: rgb(0, 0, 0);
}

.searchform .mdl-textfield.is-focused .mdl-textfield__label {
    color: rgb(0, 0, 0);
}

.searchform .mdl-textfield__label:after {
    background: #654ea3;
    background: -webkit-linear-gradient(to right, #eaafc8, #654ea3);
    background: linear-gradient(to right, #eaafc8, #654ea3);
}

</style>

