&#10084; Interact - A simple micro facebook
======================================================
[![Build Status](https://travis-ci.org/moviet/laravel-interact.svg?branch=master)](https://travis-ci.org/moviet/laravel-interact)
[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://doge.mit-license.org)
[![Usage](https://img.shields.io/badge/tutorial-basic-brightgreen.svg)](https://github.com/moviet/laravel-interact)

**__Interact__** is a simple [*social media website*](https://facebook.com) like (eg. *__facebook__*, *twitter*, etc) built using _[__Laravel version 5.7__](https://github.com/laravel/laravel)_ the purposes is just for learning a good project development practices using php laravel framework for teamwork or individual developer,  
you are free to create your own project by learning this sample source codes

## Quick Installation

Please free configure .env your app and run the command like below

* **Clone** ~ [https://github.com/moviet/laravel-interact.git](https://github.com/moviet/laravel-interact.git)
* **Install** ~ [laravel new version 5.7](https://github.com/laravel/laravel)
*  copy all vendor laravel 5.7 to your interact path 
*  composer dump-autoload
*  php artisan optimize
*  php artisan [migrate:refresh --seed](https://github.com/moviet/laravel-interact)
*  php artisan serve 
*  run localhost:8000
*  welcome to interact

> *configuration file .env (up your choices) please see basic tutorial on laravel.com*

## Data Builtin

After you create migration, please ensure your database like below  

*__user login__*

![data email](https://github.com/moviet/laravel-interact/blob/master/public/img/data-email.png?raw=true)

*__user password__: _interact_*

## Features

- [Authorization](https://github.com/moviet/laravel-interact)
- Authentication
- Validation
- Verification
- Notification
- Email
- Modify Models
- Database Relations
- Query Builder
- Styling Route
- API
  - [Resources API](https://github.com/moviet/laravel-interact)
  - [Separation API](https://github.com/moviet/laravel-interact)
  - [Custom API](https://github.com/moviet/laravel-interact)
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
- Contributions
- [Testing](https://laravel.com/docs/5.7/database-testing)
- Etc

## Custom API
You don't need to run basic _api_ like eg. http://localhost/api/ please see  

> *php artisan route:list*

## Testing
- new PHP v7.3+
- new PHPUnit v7.5
- new Laravel v5.7

## Contribution &#9996;

Welcome for any contributions, please **Pull** request manually  
#### &#9733; __Create New Trait__

Feel free to contribute by create __new trait__ like command on below  

> *php artisan [make:contrib](https://github.com/moviet/laravel-interact) yourname/traitname*


#### &#9733; __Create New Class__

Feel free to contribute by create __new class__, please use ``--c`` like command on below  

> *php artisan [make:contrib](https://github.com/moviet/laravel-interact) yourname/classname --c*


## License

`Moviet/laravel-interact` &copy; is released under the MIT public license.
