# ViewModelBundle

A Symfony2 bundle to filter and organize data sent to the View from the Controller

[![Build Status](https://travis-ci.org/gotakk/ViewModelBundle.svg?branch=master)](https://travis-ci.org/gotakk/ViewModelBundle)
[![Coverage Status](https://coveralls.io/repos/gotakk/ViewModelBundle/badge.svg?branch=master&service=github)](https://coveralls.io/github/gotakk/ViewModelBundle?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gotakk/ViewModelBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gotakk/ViewModelBundle/?branch=master)

## Installation

### Step 1: Add this bundle to your project in composer.json


```
$ composer require gotakk/view-model-bundle
```

### Step 2: Enable the bundle to your app/AppKernel.php

```php
// app/AppKernel.php
public function registerBundles()
{
  return array(
    // ...
    new gotakk\ViewModelBundle\gotakkViewModelBundle(),
    // ...
  );
}
```

### Step 3: Use it

Example of ViewModel structure in your project

```
src/Acme/FooBarBundle
|
...
|
`-- View
    |-- Assembler
    |   |-- Corporate
    |   |   |-- ContactViewAssembler.php
    |   |   `-- HomeViewAssembler.php
    |   `-- Travel
    |       |-- BelgiumViewAssembler.php
    |       `-- FranceViewAssembler.php
    `-- Model
        |-- Corporate
        |   |-- ContactViewModel.php
        |   `-- HomeViewModel.php
        `-- Travel
            |-- BelgiumViewModel.php
            `-- FranceViewModel.php
```

## License

ViewModelBundle is licensed under the MIT license (see LICENSE.md file).

## Authors

Thanks to
* [Remiii](https://github.com/Remiii)

