<?php

use App\Helpers\General\HtmlHelper;

/*
 * Global helpers file with misc functions.
 */
if (! function_exists('check_image_format')) {
    /**
     * Assign high numeric IDs to a config item to force appending.
     *
     * @param  array  $array
     * @return array
     */
    function check_image_format($file)
    {
        if(strtolower($file) == "png" || strtolower($file) == "jpg" || strtolower($file) == "bmp" || strtolower($file) == "jpeg"){
            return true;
        }
        else{
            return false;
        }
    }
}







    if (! function_exists('date_check_format')) {
    /**
     * Assign high numeric IDs to a config item to force appending.
     *
     * @param  array  $array
     * @return array
     */
    function date_check_format($date)
    {
        $date = new \Carbon\Carbon($date);
        return $date;
    }
    }

