# Favorite Movies

> Favorite Movies is an app built in Laravel using php. It consists of authenticating a user with their email and password, using laravel's auth scaffolding, to view dynamic details of their top 5 favorite movies. It also has an api endpoint, with built in middleware, and can be accessed thru basic authentication with a platform such as Postman. The app also uses global scoping to sort favorite movies by newest first.

## Dependencies

* php 7.3
* Laravel 5.8
* Dusk

## Setup

Configure server and database in .env
```
(possible configs)
APP_URL=http://localhost:8000
DB_HOST=localhost
```
In the command line of the root directory of the project

``` bash
# run migrations and seed database
php artisan migrate:fresh --seed

# serve with hot reload at localhost:8000
php artisan serve
```
Then visit local host in browser

http://localhost:8000/login

**email:** test@example.com

**password:** password

## Testing

In the command line of the root directory of the project

``` bash
# run unit and feature tests
phpunit or vendor/bin/phpunit

# to run view page test run command to start server:
php artisan serve

# and run command to run test
php artisan dusk
```

### Postman testing

* make a get request to http://localhost:8000/api/users/2

* click on authorization tab

* enter:

**email:** test@example.com

**password:** password

* send request

----

