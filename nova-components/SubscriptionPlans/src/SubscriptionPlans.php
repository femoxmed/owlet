<?php

namespace Resources\SubscriptionPlans;

use Laravel\Nova\ResourceTool;

class SubscriptionPlans extends ResourceTool
{
    /**
     * Get the displayable name of the resource tool.
     *
     * @return string
     */
    public function name()
    {
        return 'Subscription_Plans';
    }

    /**
     * Get the component name for the resource tool.
     *
     * @return string
     */
    public function component()
    {
        return 'subscription_plans';
    }
}
