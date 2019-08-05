import Vue from 'vue';
import Router from 'vue-router';

import store from './store';

import Login from './components/Login.vue';
import Secure from './components/Secure.vue';
import Register from './components/Register.vue';
import Discover from './components/Discover.vue';
import GroupMeetups from './components/GroupMeetups.vue';
import MeetupComponent from './components/MeetupComponent.vue';
import CreateMeetup from './components/CreateMeetup.vue';
import EditMeetup from './components/EditMeetup.vue';
import Profile from './components/Profile.vue';
import Admin from './components/Admin.vue';



Vue.use(Router);

let router = new Router({
    mode: 'history',
    base: '/app/',
    routes: [
        {
            path: '/',
            component: Discover,
            name: 'Discover',
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/register',
            name: 'register',
            component: Register
        },
        {
            path: '/secure',
            name: 'secure',
            component: Secure,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/group/:id',
            name: 'GroupMeetups',
            component: GroupMeetups,
        },
        {   path: '/group/:id/meetup/:id',
            name: 'MeetupComponent',
            component: MeetupComponent,
        },
        {   path: '/group/:id/create/',
            name: 'CreateMeetup',
            component: CreateMeetup,
            meta: {
                requiresAuth: true
            }
        },
        {   path: '/group/:id/meetup/:id/edit/',
            name: 'EditMeetup',
            component: EditMeetup,
            meta: {
                requiresAuth: true
            }
        },
        {   path: '/profile',
            name: 'Profile',
            component: Profile,
            meta: {
                requiresAuth: true
            }
        },
        {   path: '/admin',
            name: 'admin',
            component: Admin,
            meta: {
                requiresAuth: true
            }
        },
    ]
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (store.getters.isLoggedIn) {
            next();

            return;
        }

        next('/login');
    }

    else
        next();
});

export default router;