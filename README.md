# Music Collection - Simple Application by Symfony Standard Edition

Application is based on https://github.com/symfony/symfony-standard
Design: http://getbootstrap.com/docs/3.3/getting-started/

### Foreword
If you are wondering if I will make similar task in real life like this... **never!** I would use 
https://sonata-project.org/ (or any similar framework for CRUD operations), but than it will be boring and you will 
know nothing about my programming skills cos this task can be completed without writing of single line of code.

## What is used to music collection
 * Doctrine ORM framework
    * no MySQL injection
    * used ArrayCollection to handle many albums in one form
    * pagination (to save resources)
 * Twig
    * no XSS (no raw output)
 * Symfony forms
    * all actions are available only via form (CSFR guarded)
 * Added some extra fields for more fun
 * **Clean Code** & **Test Driven Development**

# Installation & Requirements
* php 7.1 or higher
* composer
* mysql
* web browser (tested only on chrome latest version)

```bash
git clone https://github.com/MatokUK/music-collection-sf-standard.git
cd music-collection-sf-standard
composer install
php bin/console server:run
```
You should get output like this:

```bash
[OK] Server listening on http://127.0.0.1:8000 
```

Have a fun with application.
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