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

if (! function_exists('getPerPage')) {
    /**
     * Check request to get per_page query
     *
     * @return string
     */
    function getPerPage()
    {
        if (request()->has('perpage')) {
            return request()->perpage;
        }
        return config('define.limit_rows');
    }
}
