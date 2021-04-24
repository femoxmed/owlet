<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Http\Requests\NovaRequest;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\MorphOne;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\HasOne;
use App\Nova\Address;
// use Devpartners\AuditableLog\AuditableLog;
use Coreproc\NovaAuditingUserFields\CreatedBy;
use Coreproc\NovaAuditingUserFields\UpdatedBy;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;



class Advert extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Advert::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        // 'email'
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
            Images::make('Images', 'images')
            ->withResponsiveImages()
            ->setFileName(function($originalFilename, $extension, $model){
                return md5($originalFilename) . '.' . $extension;
            }),

            Text::make('Title'),
            Text::make('Slug'),
            NovaTinyMCE::make('Description'),
            BelongsTo::make('Category','Category'),
            BelongsTo::make('Brand Model','brandmodel'),
            BelongsTo::make('Dealer','Dealer')->withMeta($this->returnDealerMetadata())->searchable(),
            BelongsTo::make('Agent','agent')->withMeta($this->returnAgentMetadata())->searchable()->nullable(),
            BelongsTo::make('condition'),
            MorphOne::make('Address', 'address', 'App\Nova\Address')->inline(),
            // Text::make('year'),
            Text::make('price'),
            Boolean::make('Status','is_active'),
            DateTime::make('Approved At')->hideWhenCreating()->nullable(),
            DateTime::make('Verified At')->hideWhenCreating()->nullable(),
            CreatedBy::make('Created By'),
            UpdatedBy::make('Updated By'),
            // AuditableLog::make(),


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
        return [
            new Filters\AdvertsUserFilter('agent'),
        ];
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

    public function returnDealerMetadata()
    {


                switch (auth()->user()->userable_type) {
                    case 'App\Dealer':
                        return [
                            'belongsToId' => auth()->user()->userable->id,
                            'readonly' => true
                        ];

                        // break;

                    default:
                    return [
                        'placeholder' => 'Choose Dealer'
                    ];
                        break;

                }

    }

    public function returnAgentMetadata()
    {


                switch (auth()->user()->userable_type) {
                    case 'App\Agent':
                        return [
                            'belongsToId' => auth()->user()->userable->id,
                            'readonly' => true
                        ];

                        break;

                    default:
                    return [
                        'placeholder' => 'Choose Dealer'
                    ];
                        break;

                }

    }
}
