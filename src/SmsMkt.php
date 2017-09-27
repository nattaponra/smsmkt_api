<?php
/*
 * @copyright   2017 Push and Motion. All rights reserved
 * @author      PAM
 *
 * @link        https://pushandmotion.com
 *
 */

namespace smsmkt_api;

use smsmkt_api\properties\sendSMSParameters;

class SmsMkt
{
    private $username;
    private $password;
    private $apiUrl;
    private $needSecure;

    public function __construct($username, $password, $needSecure = true)
    {
        $this->username   = $username;
        $this->password   = $password;
        $this->needSecure = $needSecure;
        $this->apiUrl     = ($this->needSecure ? "https" : "http") . "://member.smsmkt.com/SMSLink/";

    }

    private function curlExec($method, $parameters = array())
    {
        $fullUserApi                = $this->apiUrl . $method . "/index.php";
        $authParameters["User"]     = $this->username;
        $authParameters["Password"] = $this->password;
        $queryParameters            = http_build_query(array_merge($authParameters, $parameters));


        $ch = curl_init();
        if($this->needSecure){
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }
        curl_setopt($ch, CURLOPT_URL, $fullUserApi);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $queryParameters);
        $result    = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return array("http_code" => $http_code, "result_message" => $result);
    }

    public function checkCredit()
    {
        $result = $this->curlExec("GetCredit");
        return $result;
    }

    public function sendSms(sendSMSParameters $parameters)
    {
        $inputParameter = array(
            "Sender"  => $parameters->getSender(),
            "Msnlist" => $parameters->getPhoneNumberListUrl(),
            "Msg"     => $parameters->getMessage()
        );
        $result = $this->curlExec("SendMsg", $inputParameter);
        return $result;
    }


}