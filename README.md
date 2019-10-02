# Telesoft-Gilded-Rose

A small refractoring kata about a small merchant city.

## Built With

* [Symfony console](https://symfony.com/doc/current/components/console.html) - Console symfony skeleton used
* [Composer](https://getcomposer.org/) - Dependency Management
* [PHP 7.3](https://www.php.net/releases/7_3_0.php/) - Language version used

### Installing

To test project on local mashines you need to do the following.

On the project directory:
```
composer update
```

## Running

To start program:

On the project directory:

```
php app.php start
```
### Note

If some settings like number of days or quality decrease number needs to be corrected
change values in:
  telesoft_task/src/Enum/ItemValueEnum


## Running the tests

To run the automated tests for this system

Run all the tests:

```
vendor/bin/phpunit tests
```

Run seperate test

```
vendor/bin/phpunit tests/PATH_TO_SIGLE_TEST_FILE
```

## Extra tought about project

 - Edited Item class, added functionality there because it was convenient. Technically it should be in different stop.
 - Slightly changed item array input logic, now it accepts unassociated array (That gets transformed to item array) insted of Item array, not sure if thats allowed. Did it to seperate each uniques item logic, for easier to understand code.


## Versioning

I used [GitHub](http://github.com/) for versioning. 

## Authors

* **Justinas Garipovas** - *Whole project* - [JustinasGaripovas](https://github.com/JustinasGaripovas)
