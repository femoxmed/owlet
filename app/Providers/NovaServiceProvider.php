<?php

namespace App\Providers;

use App\Nova\Dashboards\AgentDashboard;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use App\Nova\Metrics\DealersPerDay;
use App\Nova\Metrics\AgentsPerDay;
use SimonHamp\LaravelNovaCsvImport\LaravelNovaCsvImport;
use Coroowicaksono\ChartJsIntegration\StackedChart;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Tools\Dashboard;
use Plan\PlanType\PlanType;
use Subscription\Plans\Plans;

// coroowicaksono/chart-js-integration



class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
            //    Nova::style('backend-theme', public_path('css/admin-app.css'));
            Nova::sortResourcesBy(function ($resource) {
                return $resource::$priority ?? 9999;
            });
            // Nova::script('menuFix', __DIR__.'/../../resources/js/fixMenu.js');

           
        
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [

            (new StackedChart())
            ->title('Revenue')
            ->series(array([
                'barPercentage' => 0.5,
                'label' => 'Product #1',
                'backgroundColor' => '#ffcc5c',
                'data' => [30, 70, 80],
            ],[
                'barPercentage' => 0.5,
                'label' => 'Product #2',
                'backgroundColor' => '#ff6f69',
                'data' => [40, 62, 79],
                ]))
                ->options([
                    'xaxis' => [
                        'categories' => [ 'Jan', 'Feb', 'Mar' ]
                    ],
                    ])
                    ->width('1/2'),
                (new DealersPerDay)->width('1/2'),
                // (new AgentsPerDay)->width('1'),
            // new Help,
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {

        switch (auth()->user()->userable_type) {
            case 'App\Dealer':
                return [
                    // new AgentDashboard()
                ];
                break;

            default:
            return [];
                break;

        }
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {

        return [
            new LaravelNovaCsvImport,
            \Vyuldashev\NovaPermission\NovaPermissionTool::make(),
            // ->rolePolicy(RolePolicy::class)
            // ->permissionPolicy(PermissionPolicy::class),
            // new PlanType,
            new Plans
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
