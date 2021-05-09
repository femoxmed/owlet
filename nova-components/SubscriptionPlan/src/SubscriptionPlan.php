<?php

namespace Plan\SubscriptionPlan;

use Laravel\Nova\ResourceTool;

class SubscriptionPlan extends ResourceTool
{
    /**
     * Get the displayable name of the resource tool.
     *
     * @return string
     */
    public function name()
    {
        return 'Subscription Plan';
    }

    /**
     * Get the component name for the resource tool.
     *
     * @return string
     */
    public function component()
    {
        return 'subscription-plan';
    }
}
