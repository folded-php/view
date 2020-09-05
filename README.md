# folded/view

View utilities for your PHP web app.

## Summary

- [About](#about)
- [Requirements](#requirements)
- [Installation](#installation)
- [Examples](#examples)
- [Version support](#version-support)

## About

I created this library to be able to pull it in an existing web app without too much effort setting it up.

Folded is a constellation of packages to help you setting up a web app easily, using ready to plug in packages.

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
