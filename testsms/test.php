<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15/3/17
 * Time: 2:08 AM
 */

// Required if your environment does not handle autoloading
require $_SERVER['DOCUMENT_ROOT']. '/twilio-php-master/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'ACd51dd094851a93db1fc6d0ee51fb9410';
$token = '6282744f66b7d768ee5c5a1474a4c4e8';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->messages->create(
// the number you'd like to send the message to
    '+919501925559',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+15017250604',
        // the body of the text message you'd like to send
        'body' => 'Hey Jenny! Good luck on the exam!'
    )
);
echo 'DOne';