<?php

if (!function_exists('DummyFunction')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function setting($name, $default = null)
    {
        return \App\Models\Setting::getByName($name, $default);
    }
}
