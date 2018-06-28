<?php

if (! function_exists('module_path')) {
    /**
     * Get the path to the public folder.
     *
     * @param  string  $path
     * @return string
     */
    function module_path($path = '')
    {
        return URL::to('/node_modules/').$path;
    }
}

?>