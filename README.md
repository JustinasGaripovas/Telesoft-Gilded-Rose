# Telesoft-Gilded-Rose

A small refractoring kata about a small merchant city. [LINK TO KATA](https://github.com/emilybache/GildedRose-Refactoring-Kata)

## Built With

* [Symfony console](https://symfony.com/doc/current/components/console.html) - Console symfony skeleton used
* [Composer](https://getcomposer.org/) - Dependency Management for PHP 
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

  - Could have created better casting to ItemType function [FIXED](https://github.com/JustinasGaripovas/Telesoft-Gilded-Rose/commit/f1aca4d26ba5f4dbcf3cdf80b2ea14ad77eae502)
  - Edited item class minimally [FIXED](https://github.com/JustinasGaripovas/Telesoft-Gilded-Rose/commit/30a70e4037d183011373ec9f1c18441e44b3758d)
  - Unit test's are there, but they are laughable
  - Item manager should be turned into ItemFactory
  - ItemFactory system could be better in general


## Versioning

I used [GitHub](http://github.com/) for versioning. 

## Authors

* **Justinas Garipovas** - *Whole project* - [JustinasGaripovas](https://github.com/JustinasGaripovas)
