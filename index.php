<?php
include 'db_connection.php';

ini_set('display_errors', 0);

date_default_timezone_set('Europe/Riga');

$error_messages = array();
$result = '';

define("REGEX", [
  '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',
  '/\S+@\S+\.co$/',
]);

function validate_input($email, $tos, $regex)
{
    global $error_messages;
    if(empty($email))
    {
        array_push($error_messages, 'Email address is required');
    }
    if(!preg_match($regex[0], $email))
    {
        array_push($error_messages, 'Please provide a valid e-mail address');
    }
    if(preg_match($regex[1], $email))
    {
        array_push($error_messages, 'We are not accepting subscriptions from Colombia e-mails');
    }
    if(empty($tos))
    {
        array_push($error_messages, 'You must accept the terms and conditions');
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{  
    validate_input($_POST['email'], $_POST['tos'], REGEX);
    if(empty($error_messages))
    {
        global $result;
        
		$pineapple = new db();
		$pineapple->store($_POST['email']);
        
        $result = 'OK';
    }
}

require("view.php");
    
?>