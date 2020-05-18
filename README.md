<img src="https://github.com/moviet/laravel-interact/blob/master/public/img/it-logo-purple.png?raw=true" width="26"> Interact - A dead simple micro facebook
======================================================
[![Build Status](https://travis-ci.org/moviet/laravel-interact.svg?branch=master)](https://travis-ci.org/moviet/laravel-interact)
[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://doge.mit-license.org)
[![Usage](https://img.shields.io/badge/tutorial-basic-brightgreen.svg)](https://github.com/moviet/laravel-interact)

**__Interact__** is a simple [*social media website*](https://facebook.com) idea like (eg. *__facebook__*, *twitter*, etc) created using _[__Laravel Version 7.11__](https://github.com/laravel/laravel)_ the purpose is just for learning a simple project web (development) with php laravel framework for beginner, you are free to create your own project by learning and learning the concept of this simple patterns

## Quick Installation

Please free configure .env your app and run the command like below

* **Fork** this repository for the new update
* **Install** ~ composer global require laravel/installer
* **Create** ~ composer create-project --prefer-dist laravel/laravel laravel-interact
* **Clone** ~ [https://github.com/moviet/laravel-interact.git](https://github.com/moviet/laravel-interact.git)
* **Install** ~ composer require laravel/ui
*  composer install and/or update
*  create whatever database name
*  composer dump-autoload
*  php artisan optimize
*  php artisan [migrate:refresh --seed](https://github.com/moviet/laravel-interact)
*  php artisan serve
*  type localhost:8000 on the browser
*  welcome to interact

> *configuration file .env (is your choices) please see basic tutorial on laravel.com*

## Data Built-in

After you create migration, please ensure your database like below  

- __username__ : on below  
- __password__ : _interact_

![data email](https://github.com/moviet/laravel-interact/blob/master/public/img/data-email.png?raw=true)

> if you want to create new user, you must install local 'email server' for notification


## Custom Features

- [Authorization](#custom-api)
- Authentication
- Validation
- Verification
- Notification
- Email
- Custom Models
- Database Relations
- Query Builder
- Styling Route
- API
  - [Resources API](#custom-api)
  - [Separation API](#custom-api)
  - [Custom API](#custom-api)
- Console
- Stub
- Session
- Migrations
- Seeding
- Factory
- Observers
- Scopes
- Requests
- Resources
- View
- Blade Template
- Handle JSON
- Javascript
- AJAX
- [Contribution](#contribution)
- [Testing](#testing)
- Etc

## Custom API
You don't need to run basic _api_ like eg. [http://localhost/api/](#custom-features) please see [here](https://github.com/moviet/interact/tree/master/routes) or 

> *php artisan route:list*

## Testing
- new PHP v7.3+
- new PHPUnit v7.5
- new Laravel v7.11

## Demo
Please visit: <a href="http://laravel-interact.herokuapp.com" target="_blank">http://laravel-interact.herokuapp.com</a>

## Contribution &#9996;

Welcome for any contributions, please **Pull** request manually  
#### &#9733; __Create New Trait__

Feel free to contribute by create __new trait__ with command on below  

> *php artisan [make:contrib](https://github.com/moviet/laravel-interact) yourname/traitname*


#### &#9733; __Create New Class__

Feel free to contribute by create __new class__, please use ``--c`` with command on below  

> *php artisan [make:contrib](https://github.com/moviet/laravel-interact) yourname/classname --c*


## License

`Moviet/laravel-interact` &copy; is released under the MIT public license.
