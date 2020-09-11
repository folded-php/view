# folded/view

View utilities for your PHP web app.

[![Packagist License](https://img.shields.io/packagist/l/folded/view)](https://github.com/folded-php/view/blob/master/LICENSE) [![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/folded/view)](https://github.com/folded-php/view/blob/master/composer.json#L14) [![Packagist Version](https://img.shields.io/packagist/v/folded/view)](https://packagist.org/packages/folded/view) [![Build Status](https://travis-ci.com/folded-php/view.svg?branch=master)](https://travis-ci.com/folded-php/view) [![Maintainability](https://api.codeclimate.com/v1/badges/c3484b0de6fe6db59f18/maintainability)](https://codeclimate.com/github/folded-php/view/maintainability)

## Summary

- [About](#about)
- [Requirements](#requirements)
- [Installation](#installation)
- [Examples](#examples)
- [Version support](#version-support)

## About

I created this library to be able to pull it in an existing web app without too much effort setting it up.

Folded is a constellation of packages to help you setting up a web app easily, using ready to plug in packages.

- [folded/config](https://github.com/folded-php/config): Configuration utilities for your PHP web app.
- [folded/exception](https://github.com/folded-php/exception): Various kind of exception to throw for your web app.
- [folded/history](https://github.com/folded-php/history): Manipulate the browser history for your web app.
- [folded/orm](https://github.com/folded-php/orm): An ORM for you web app.
- [folded/request](https://github.com/folded-php/request): Request utilities, including a request validator, for your PHP web app.
- [folded/routing](https://github.com/folded-php/routing): Routing functions for your PHP web app.

## Requirements

- PHP version >= 7.4.0
- Composer installed

## Installation

- [1. Install the package](#1-install-the-package)
- [2. Set up the view engine](#2-set-up-the-view-engine)

### 1. Install the package

In your root folder directory, run this command:

```bash
composer require folded/view
```

### 2. Set up the view engine

In the script that is called before displaying your view, add this set up code:

```php
use function Folded\setViewFolderPath;
use function Folded\setViewCacheFolderPath;

setViewFolderPath(__DIR__ . "/views");
setViewCacheFolderPath(__DIR__ . "/cache/views");
```

The cache is a place where your code is compiled to plain PHP, and stored in the disk, for faster rendering for next requests displaying the view.

## Examples

Since this library relies on Laravel's [illuminate/view](https://github.com/illuminate/view), you can refer to [the 7.X documentation](https://laravel.com/docs/7.x/blade) if you need any information regarding the Blade syntax and the available Blade directives.

- [1. Display a view](#1-display-a-view)
- [2. Pass data to your view](#2-pass-data-to-your-view)
- [3. Display a plain PHP view](#3-display-a-plain-php-view)

### 1. Display a view

In this example, we will display a Blade view.

```php
use function Folded\displayView;

displayView("home.index");
```

With the following content inside `views/home/index.blade.php`:

```html
<h1>Hello world</h1>
```

### 2. Pass data to your view

In this example, we will pass a string to the view we display.

```php
use function Folded\displayView;

displayView("home.index", [
  "name" => "John",
]);
```

With the following content inside the view:

```html
<h1>Hello world</h1>

<p>Welcome to my website, {{ $name }}.</p>
```

### 3. Display a plain PHP view

In this example, we will display a plain PHP file.

```php
use function Folded\displayView;

displayView("about-us.index");
```

The plain PHP view is located at `views/about-us/index.php` (notice there is no "blade" extension now), with the following content:

```html
<h1>About us</h1>
```

## Version support

|        | 7.3 | 7.4 | 8.0 |
| ------ | --- | --- | --- |
| v0.1.0 | ❌  | ✔️  | ❓  |
| v0.1.1 | ❌  | ✔️  | ❓  |
| v0.1.2 | ❌  | ✔️  | ❓  |
