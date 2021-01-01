# rdm-editions
============

A Symfony project created by wild code school's student, october 10, 2016, 4:57 pm.
+ Symfony version 2.8
+ PHP 5.3.9
+ Mysql 5.7.13 
+ API: google map embed

## How to play with it:

### Requirements:
You need to have [docker](https://docs.docker.com/get-docker/) and [docker-compose](https://docs.docker.com/compose/install/) installed.
### Run it with:
- `docker-compose up`
- Site should be available on [http://localhost](http://localhost)

##### Bundles :

+ Sonata project / Sonata admin 3.9
+ excelwebzone / recaptcha 1.4
+ egeloen / ckeditor 4.0

##### Bundle-dev :
+ doctrine/doctrine-fixtures-bundle 2.3

##### Database table :
+ book
+ event
+ press_article

##### Install:
+ git clone 
+ composer update
+ composer install
+ php app/console doctrine:schema:update
+ php app/console doctrine:fixtures:load


