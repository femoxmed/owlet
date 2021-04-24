<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Devpartners\AuditableLog\AuditableLog;
use Coreproc\NovaAuditingUserFields\CreatedBy;
use Coreproc\NovaAuditingUserFields\UpdatedBy;
// use Laravel\Nova\Fields\MorphMany;
// use Laravel\Nova\Fields\MorphToMany;
// use Vyuldashev\NovaPermission\PermissionBooleanGroup;
// use Vyuldashev\NovaPermission\RoleBooleanGroup;
use Vyuldashev\NovaPermission\RoleSelect;
use DigitalCreative\InlineMorphTo\HasInlineMorphToFields;
use DigitalCreative\InlineMorphTo\InlineMorphTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;

// use App\Nova\DownloadExcel

class User extends Resource
{
    use HasInlineMorphToFields;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $priority = 1;
    public static $model = \App\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'email';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'email',
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
            ID::make()->sortable(),

            // Gravatar::make()->maxWidth(50),

            // Files::make('Main image', 'avatar') // second parameter is the media collection name
            Images::make('Logo / Profile Picture', 'avatar')
            ->conversionOnIndexView('thumb')
            ->singleMediaRules('max:5000')
            ->setFileName(function($originalFilename, $extension, $model){
                return md5($originalFilename) . '.' . $extension;
            }),
            Text::make('First Name')->rules('required'),
            Text::make('Last Name')->rules('required'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),
                DateTime::make('Email Verified At')
                ->sortable(),
            \DigitalCreative\InlineMorphTo\InlineMorphTo::make('User Type' , 'userable', )
            ->types([
                \App\Nova\Admin::class,
                \App\Nova\Agent::class,
                \App\Nova\Dealer::class,
                ])->placeholder('Choose A User Type')
                // ->default(\App\Nova\Admin::class)
                ->rules('required'),
                RoleSelect::make('Role', 'roles'),
                Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),
                CreatedBy::make('Created By'),
            
                UpdatedBy::make('Updated By')->onlyOnDetail(),
                AuditableLog::make(),
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
            switch (auth()->user()->userable_type) {
                case 'App\Admin':
                    return [
                        new Filters\UserType,
                    ];
                    break;

                default:
                return [];
                    break;

          }
            // return [
            //     new Filters\UserType,
            // ];
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
        return [
            new DownloadExcel,
        ];
    }

}
