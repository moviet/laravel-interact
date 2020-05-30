<img src="https://github.com/moviet/laravel-interact/blob/master/public/img/it-logo-purple.png?raw=true" width="26"> Interact - A dead simple micro facebook
======================================================
[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://doge.mit-license.org)
[![Usage](https://img.shields.io/badge/tutorial-basic-brightgreen.svg)](https://github.com/moviet/laravel-interact)

**__Interact__** is just a simple [*social media web app*](https://facebook.com) like (eg. *__facebook__*, *twitter*, etc) created using new _[__Laravel Version 7.11__](https://github.com/laravel/laravel)_ the purpose is just for learning web (development) project using laravel framework, it's may just using pure patterns for starter and you are free to create your own project by learning the source codes explicitly

## Quick Installation

Please free configure .env your app and run the command like below

* **Fork** this repository for new update
*  Open your command line and move to the local path you want to install 
* **Clone** ~ [https://github.com/moviet/laravel-interact.git](https://github.com/moviet/laravel-interact.git)
*  create new database name
*  setting .env for your database
* **update** ~ `composer update`
*  composer dump-autoload
*  php artisan optimize
*  php artisan [migrate:refresh --seed](https://github.com/moviet/laravel-interact)
*  php artisan serve
*  type localhost:8000 on the browser
*  welcome to interact

> *setting environment eg: .env (is your choice) please check the documentation on laravel.com*

## Data Built-in

After you create migration, please ensure your database like below  

- __username__ : on below  
- __password__ : _interact_

![data email](https://github.com/moviet/laravel-interact/blob/master/public/img/data-email.png?raw=true)

> *if you want to create new account, you must install local 'email server' for such as notification*


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
Please visit: <a href="https://interaksi.my.id" target="_blank">https://interaksi.my.id</a>

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
