<?php
/**
 * Created by IntelliJ IDEA.
 * User: PHP Developer
 * Date: 10/4/2017
 * Time: 5:19 PM
 */

namespace App;

class helpers
{
    function setActive($path)
    {
        return Request::is($path . '*') ? ' class=active' :  '';
    }

}