# Laravel Nova Typeahead Filter

This package provides an easy-to-setup searchable select filter.

## Installation

Install via composer:

```shell
$ composer require devpartners/typeahead-filter
```

## Using in Laravel Nova

After the package has been installed with Composer, simply create a new Nova filter or change an existing filter to use the typeahead-filter component.

```php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class IndustryFilter extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'typeahead-filter';

```

## Demo

(docs/demo.gif)