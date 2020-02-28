<?php

namespace Devpartners\TypeaheadFilter;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class TypeaheadFilter extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'typeahead-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed                                 $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query;
    }

    /**
     * Get the filter's available options.
     *
     * @return array
     */
    public function options(Request $request)
    {
        return [];
    }
}
