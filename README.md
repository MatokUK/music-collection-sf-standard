# Music Collection - Simple Application by Symfony Standard Edition

Application is based on https://github.com/symfony/symfony-standard
Design: http://getbootstrap.com/docs/3.3/getting-started/

# Installation & Requirements
* php 7.1 or higher
* composer
* mysql
* web browser (tested only on chrome latest version)

```bash
git clone
cd music-collection-sf-standard
composer install
php bin/console server:run
```
# Tests


## Functional tests

 - tests that some pages return 404 https status code (edit non-existing artist)

```bash
./vendor/phpunit/phpunit/phpunit
```

# Acceptance tests
If you want to run acceptance tests you have 
 - tested whole CRUD cycle on Albums
 - tested whole CRUD cycle on Artists

```bash
./vendor/codeception/codeception/codecept run 
```

# Original Task

Create an admin page for a music collection using MVC pattern (you can use any framework you like) and OOP, where after logging in, you can add, edit and remove details about artist and albums.

- table for users + login to admin page (no registration required)

- table artists + list, add, edit and remove

- table albums + list, add to artist, edit and remove

This task is to see your object oriented programming and programming in general, so you do not have to worry about the design.

Please attach link to code and sql (github, bitbucket). Live demo would be appreciated.