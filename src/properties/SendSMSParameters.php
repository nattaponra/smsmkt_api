<?php
/*
 * @copyright   2017 Push and Motion. All rights reserved
 * @author      PAM
 *
 * @link        https://pushandmotion.com
 *
 */

namespace smsmkt_api\properties;

class SendSMSParameters
{
    private $phoneList;
    private $sender;
    private $message;

    /** @var array $phoneNumbers */
    public function setPhoneNumberList($phoneNumbers)
    {
        $this->phoneList = $phoneNumbers;
    }

    public function getPhoneNumberList()
    {
        return $this->phoneList;
    }

    public function getPhoneNumberListUrl()
    {
        if ($this->phoneList != null) {
            return implode(';', $this->phoneList);
        }
        return null;
    }

    public function setSender($sender)
    {
        $this->sender = $sender;
    }

    public function getSender()
    {
        return $this->sender;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }
}