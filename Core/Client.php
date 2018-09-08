<?php
/**---------------------------------------------------------------------------------------
|  Operations Client
|----------------------------------------------------------------------------------------
| Created by : Mayaka Donnicias
| Date: 9/8/2018
| Time: 9:47 AM
| Description: This is the custom soap client for transacting manager operations
| ---------------------------------------------------------------------------------------
 */

namespace donnicias\nav_ip\Core;
use SoapClient;

define('USERPWD', config('nav.Auth_Mode.NTLM.Domain').'\\'.config('nav.Auth_Mode.NTLM.Username').':'.config('nav.Auth_Mode.NTLM.Password'));
class Client extends SoapClient {
    /**
     * @param string $request
     * @param string $location
     * @param string $action
     * @param int $version
     * @param int $one_way
     * @return mixed|string
     */
    function __doRequest($request, $location, $action, $version, $one_way = 0) {
        $headers = array(
            'Method: POST',
            'Connection: Keep-Alive',
            'User-Agent: PHP-SOAP-CURL',
            'Content-Type: text/xml; charset=utf-8',
            'SOAPAction: "'.$action.'"',
        );

        $this->__last_request_headers = $headers;
        $ch = curl_init($location);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
        curl_setopt($ch, CURLOPT_USERPWD, USERPWD);
        $response = curl_exec($ch);

        return $response;
    }

    /**
     * @return string
     */
    function __getLastRequestHeaders() {
        return implode("\n", $this->__last_request_headers)."\n";
    }
}
