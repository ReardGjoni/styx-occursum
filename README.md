[![CircleCI]()]()

# Styx Occursum Events
A social network where people of all interests can create events, and network with each other. The idea is simple: be it programming, reading, gaming, doing sports or dancing, there is a whole group of people out there sharing that interest with you. The only thing remaining is for you to meet them :)

Final project for my studies @SAE Institute Munich, Germany, WBD52040319
- Developer: Reard Gjoni

Tech Stack:
- Backend: Laravel, SQL, MYSQL Workbench, Laravel Passport
- Frontend: Vue.js, Axios, Google's Material Design
- Methodology: RESTful API
- Features: Basic CRUD Application- create, read, update & delete Events(API Resources)

# Database Model:
Simple Many-to-Many relationship as seen below
- User - many - Meetups & vice versa et cetera

![Image](resources/img/Relational%20Data%20Model.png)


# Installation

First make sure you have an environment such as XAMPP, MAMP, WAMP, Vagrant, Laravel Valet etc.
After cloning this repo into your server directory:

```
Copy .env.example into .env

Run following commands:

composer install
npm install
npm run dev

php artisan migrate
php artisan key:generate
php artisan passport:install

php artisan serve    <- see 'Worth noting' below
```

In order to fill the tables with relational data, run the following factories:

```
php artisan tinker
>>> factory(App\Models\User::class, 50)->create();
>>> factory(App\Models\Groups::class, 20)->create();
>>> factory(App\Models\Meetups::class, 50)->create();
>>> factory(App\Models\Comments::class, 100)->create();
>>> factory(App\Models\CommentLikes::class, 100)->create();
>>> factory(App\Models\GroupMembers::class, 100)->create();
>>> factory(App\Models\Attending::class, 100)->create();
```

## Other technical features include:
- CircleCI configuration
- Telescope Monitoring package installed
- Token auth powered by Laravel Passport
- Vue.js frontend with Vuex and Vue Router, utilizing auth API endpoints for registration, login and retrieval of currently logged in user 

## Worth noting
- Laravel is configured so that web server accesses base directory, not `/public`. To run it locally with `php artisan serve`, copy `index.php` in base directory and rename it to `server.php`.
- The frontend can be accessed at `localhost:8000/app` or respectively the assigned IP Address assigned from ```php artisan serve```

Taking into consideration that you have a running copy in your machine, congratulations :). Test it, play around with it and don't hesitate to report any bugs or suggest new features.

Contact: reard.gjoni97@hotmail.co.uk