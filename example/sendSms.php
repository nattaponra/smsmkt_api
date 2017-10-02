<?php
/*
 * @copyright   2017 Push and Motion. All rights reserved
 * @author      PAM
 *
 * @link        https://pushandmotion.com
 *
 */
require_once __DIR__ . '/../app/autoload.php';
use smsmkt_api\SmsMkt;
use smsmkt_api\properties\sendSMSParameters;




$username = "your username";
$password = "your password";
$SmsMkt = new SmsMkt($username, $password, true);
$credit = $SmsMkt->checkCredit();
print_r($credit);


$parameters = new sendSMSParameters();
$parameters->setSender("SENDER_NAME");
$parameters->setProjectId(100);
$parameters->setPhoneNumberList(array("08xxxxxxx1","08xxxxxxx2"));
$parameters->setMessage("HELLO 3DS");
$result = $SmsMkt->sendSms($parameters);
print_r($result);
