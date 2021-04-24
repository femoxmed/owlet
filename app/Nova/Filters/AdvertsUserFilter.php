<?php

namespace App\Nova\Filters;

use App\Advert;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class AdvertsUserFilter extends Filter
{
   /**
     * The column that should be filtered on.
     *
     * @var string
     */
    protected $column;

    /**
     * Create a new filter instance.
     *
     * @param  string  $column
     * @return void
     */
    public function __construct($column)
    {
        $this->column = $column;
    }

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {

       switch (auth()->user()->userable_type) {
           case 'App\Agent':
            return $query->where('agent_id', auth()->user()->userable->id);
               break;
               case 'App\Dealer':
                return $query->where('dealer_id', auth()->user()->userable->id);
                   break;
                   case 'App\Admin':
                    return $query;
                       break;
           default:
           return $query->where('id', null);
               break;

     }
        // ->where(['id' => 1]);
    }

    /**
     * Get the key for the filter.
     *
     * @return string
     */
    // public function key()
    // {
    //     return $this->column;
    // }

    public function options(Request $request)
    {
        //
    }

    public function default()
    {
        return $this->column;
    }
}
