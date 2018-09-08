<?php
/**---------------------------------------------------------------------------------------
|  Operations Wrapper Trait
|----------------------------------------------------------------------------------------
| Created by : Mayaka Donnicias
| Date: 9/8/2018
| Time: 9:47 AM
| Description: This provides the commonly used methods in Manager. Can be used globally.
| ---------------------------------------------------------------------------------------
 */

namespace donnicias\nav_ip\Traits;
use donnicias\nav_ip\Core\StreamHandler;

Trait Wrapper
{
    /**
     *Prepares the wrapper before streaming
     */
    public static function prepareWrapper(){
        stream_wrapper_unregister('http');
        stream_wrapper_register('http', StreamHandler::class) or die("Failed to register protocol");
    }

    /**
     * Switches the wrapper back after streaming
     */
    public static function restoreWrapper(){
        stream_wrapper_restore('http');
    }

    /**
     * @param $service ~ Service end point to invoke
     * @param $identifier ~ Specifies whether you are calling a codeunit or page
     * @return string ~ Returns full service URL
     */
    public static function resolveUrl($service, $identifier){
        $url = config('nav.Auth_Mode.NTLM.BaseURL').config('nav.Auth_Mode.NTLM.Company').'/'.$identifier.'/'.$service;
        return $url;
    }
}
