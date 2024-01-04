<?php

if (!function_exists('DummyFunction')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function routeHelper($url)
    {
        if (auth()->user()->role_id == 1) {
            $fixed_url = '/admin/';
        } 
        else if (auth()->user()->role_id == 2) {
            $fixed_url = '/vendor/';
        }

        return $fixed_url.$url;
    }
}
