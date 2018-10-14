# Music Collection - Simple Application by Symfony Standard Edition

Based on https://github.com/symfony/symfony-standard

Design: http://getbootstrap.com/docs/3.3/getting-started/

### Foreword
If you are wondering if I will make similar task in real life like this... **never!** I would use 
https://sonata-project.org/ (or any similar framework for CRUD operations), but than it will be boring and you will 
know nothing about my programming skills cos this task can be completed without writing of single line of code.

## What is used in Music collection
 * Doctrine ORM framework
    * no MySQL injection
    * used ArrayCollection to handle many albums in one form
    * pagination (to save resources)
 * Twig
    * no XSS (no raw output)
 * Symfony Forms
    * all actions (that possibly alter data) are available only via form (CSFR guarded)
 * Symfony Security
    * standard Symfony component for login/logout - this is not tuned up, so I guarantee nothing (not important in this app... I guess) 
 * Added some extra fields for more fun
 * **Clean Code** & **Test Driven Development**

# Installation & Requirements
* php 7.1 or higher
* composer
* mysql
* web browser (tested only on chrome latest version)

## Database
Before you series of commands you should alter app/parameters.yml or create a new file named  app/parameters_env.yml (in the same directory) and store credentials to database:
```yml
parameters:
    database_host: 127.0.0.1
    database_port: ~
    database_name: your_db_name
    database_user: your_db_user
    database_password: your_db_password_or_tilde_if_empty
```

Script with database schema and users is located in schema.sql. You can log in as admin/admin, user/user or music/music. There is no difference between users. You can generate your own user with command (I must generated it somehow..)

## Installation
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

Open provided link and have fun with application.


# Tests
As always my code highly covered with different types of tests.

## Unit tests
 - only pagination - there is no space to test something else with Unit Testing

```bash
./vendor/phpunit/phpunit/phpunit
```

## Functional tests
 - tests that some pages return 404 https status code (edit non-existing artist)
 - yeah, I know these test are not working after I added login page... sorry :)

```bash
./vendor/phpunit/phpunit/phpunit
```

## Acceptance tests
If you want to run acceptance tests you have
 - tested Login / Invalid credentials Login
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