![w.eloquent](https://raw.githubusercontent.com/bruno-barros/w.eloquent-framework/master/weloquent.png)

[![Build Status](https://travis-ci.org/bruno-barros/w.eloquent-framework.svg)](https://travis-ci.org/bruno-barros/w.eloquent-framework)

Wordpress integrated with Laravel via Composer.

* Atention! The branch `master` is no longer manteined. Now I'm working on branch `light`. Not booting Laravel anymore, instead just using some packages. It all is because performance reason.

#### Documentation is being building on [wiki page](https://github.com/bruno-barros/w.eloquent/wiki).

### Goals
Run `composer install` and have a system in place with:

- Wordpress as front and back-end
- Laravel as API and front-and (if necessary)
- Install Wordpress and plugins via composer
- Keeping plugins and themes for Wordpress environment as it is 
- Access to Laravel API, including Facades, inside Wordpress
- Access Wordpress API inside Laravel

### Theme features
The w.eloquent project comes with a very simple theme (base).

To see the very features you have at your disposal, check out the [w.eloquent starter theme](https://github.com/bruno-barros/weloquent-starter-theme)

### Complementary packages

[**w.eloquent Command Bus**](https://github.com/bruno-barros/w.eloquent-bus)


### Inspirations
These are projects I like and did inspire me to put it all together:

- [Wordpress](https://wordpress.org/)
- [Laravel](http://laravel.com/)
- [Themosis framework](http://framework.themosis.com/)
- [Brain Project](http://giuseppe-mazzapica.github.io/Brain)

### Status
The packages are being adapted to WordPress environment.

 - [x] Views
 - [x] Blade template engine
 - [x] Routes by Cortex
 - [x] Assets by Occiptial
 - [x] Hooks by Striatum
 - [x] Validation
 - [x] CLI (php wel)
 - [x] Cache
 - [x] Hash
 - [x] Filesystem
 - [x] Html
 - [x] Translation
 - [x] Encryption
 - [x] Cookie
 - [x] Session
 - [x] Database
 - [x] Migration
 - [x] Seed
 - [x] Auth
 - [x] Log
 - [x] Mail
 - [x] Queue

<br>

 - [ ] Redis
 - [ ] Remote
 - [ ] Reminder

<br>

 - Workbench <sup>(not planned)</sup>
 - Pagination <sup>(provided by WordPress)</sup>
