<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

class Transaction extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Transaction::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            ID::make(__('ID'), 'id')->sortable(),
            Text::make('Title')->sortable(),
            Textarea::make('Description')->sortable(),
            Text::make('Amount')->sortable(),
            Text::make('Txr Ref')->sortable(),
            Text::make('Txr Date')->sortable(),
            Text::make('Paid Date')->sortable(),
            Text::make('Txr Fees')->sortable(),
            Text::make('Txr Ip')->sortable(),
            Text::make('Charged Amount')->sortable(),
            Text::make('Acct Number')->sortable(),
            Text::make('Currency')->sortable(),
            Text::make('Event Type')->sortable(),
            Select::make('Job Type')->options([
                'success' => 'SUCCESS',
                'pending' => 'PENDING',
                'failed' =>  'FAILED',
                ]),
            Select::make('Type')->options([
                'credit' => 'CREDIT ',
                'debit' => 'DEBIT',
                ]),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
