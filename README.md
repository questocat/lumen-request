# lumen-request

Input request is a package for Lumen

[![StyleCI](https://styleci.io/repos/122983980/shield?branch=master)](https://styleci.io/repos/122983980)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/questocat/lumen-request/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/questocat/lumen-request/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/questocat/lumen-request/badges/build.png?b=master)](https://scrutinizer-ci.com/g/questocat/lumen-request/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/questocat/lumen-request/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/questocat/lumen-request/?branch=master)
[![Packagist](https://img.shields.io/packagist/l/doctrine/orm.svg)](https://packagist.org/packages/questocat/lumen-request)

## Installation

Via [Composer](https://getcomposer.org) to add the package to your project's dependencies:

```bash
$ composer require questocat/lumen-request
```

Add the service provider in bootstrap/app.php

```php
$app->register(Questocat\LumenRequest\InputRequestServiceProvider::class);
```

## Usage

Now you can generate the UserRequest class using the artisan console.

```bash
$ php artisan make:request UserRequest
```

Have fun!

## License

Licensed under the [MIT license](https://github.com/questocat/lumen-request/blob/master/LICENSE).
