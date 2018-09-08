<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 9/8/2018
 * Time: 9:22 AM
 */
if (!function_exists('init_manager')){
    function init_manager(){
        return app('nav');
    }
}
