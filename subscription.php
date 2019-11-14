<?php
ob_start();
session_start() ;
// session_destroy();
// Prevent direct access to this class
define("BASEPATH", 1);

include('lib/rave.php');
include('lib/PaymentPlan.php');
include('lib/Subscription.php');
include('config.php');

use Flutterwave\Rave;
use Flutterwave\PaymentPlan;
use Flutterwave\Subscription;


$URL = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$getData = $_GET;
$postData = $_POST;
$publicKey =$publicKey;
$secretKey = $secretKey;
$success_url = $successurl;
$failure_url = $failureurl;

$name ="Subscription Plan for Order Number: ".$postData['orderno']." & Email: ".$postData['email'];
$array = array(
    "id " => '6110' ,
    "seckey" => $secretKey
);
$planID = '6110';

$subscription = new Subscription();

$resultActivate = $subscription->activateSubscription($array);

print_r($resultActivate);
ob_end_flush();