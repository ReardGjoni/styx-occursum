<template>
<div>
    <table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
        <thead>
            <tr>
            <th class="mdl-data-table__cell--non-numeric">Full Name</th>
            <th>E-Mail</th>
            <th>Joined at</th>
            <th>Edit credentials</th>
            </tr>
        </thead>
        <tbody v-for="user in users" :key="user.id">
            <tr>
            <td class="mdl-data-table__cell--non-numeric">{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.created_at }}</td>
            <td><button class="mdl-button mdl-js-button mdl-js-ripple-effect">Edit</button></td>
            </tr>
        </tbody>
    </table>
</div>
</template>


<script>
import axios from 'axios';


export default {
    components: {
    },

    data: function() {
        return {
            users: [],
            placeholder: 'Search user',
        }
    },

    methods: {
        searchMethod() {

        }
    },

    mounted() {
        
    },

    created() {
        axios.get('/api/users')
        .then((response) => {
            this.users = response.data.users;
        })
        .catch((error) => {
            console.log(error)
        });
    }
}

</script>


<style scoped>
    .mdl-data-table {
        margin: 200px auto;
        width: 70%;
    }

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