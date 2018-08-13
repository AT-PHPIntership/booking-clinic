<?php

if (! function_exists('checkRouteActive')) {
    /**
     * Check request route name equal a route
     *
     * @param string $route route
     *
     * @return string
     */
    function checkRouteActive($route = '#')
    {
        return strpos(request()->url(), $route) !== false ? ' active' : '';
    }
}
