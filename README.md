# smsmkt_api
Sdk for easy connect mkt sms service with PHP language.
# How to use it?
## 1.Connection
```php
$username = "your username";
$password = "your password";
$SmsMkt = new SmsMkt($username, $password, true);
```
result
```php
Array
(
    [http_code] => 200
    [result_message] => Status=0,Detail=Your account have xxx SMS@Valid thru 20 September 2561@Within 999 Days

)
```
## 2.Check your credit
```php
$credit = $SmsMkt->checkCredit();
print_r($credit);
```

## 3.Send SMS
Create sms parameters properties
```php
$parameters = new sendSMSParameters();
$parameters->setSender("SENDER_NAME");
$parameters->setPhoneNumberList(array("08xxxxxxx1","08xxxxxxx2"));
$parameters->setMessage("HELLO 3DS");
```
Call sendSms method
```php
$result = $SmsMkt->sendSms($parameters);
print_r($result);
```
result
```php
Array
(
    [http_code] => 200
    [result_message] => Status=0,Detail=xxxxxx/xxxx.

)
```
