<?php

//Retrieve form data. 
//GET - user submitted data using AJAX
//POST - in case user does not support javascript, we'll use POST instead
$name = ($_GET['name']) ? $_GET['name'] : $_POST['name'];
$email = ($_GET['email']) ?$_GET['email'] : $_POST['email'];
$comments = ($_GET['comments']) ?$_GET['comments'] : $_POST['comments'];
$company = ($_GET['company']) ?$_GET['company'] : $_POST['company'];
$requestType = ($_GET['requestType']) ?$_GET['requestType'] : $_POST['requestType'];
$cardNumber = ($_GET['cardNumber']) ?$_GET['cardNumber'] : $_POST['cardNumber'];
$cvv = ($_GET['cvv']) ?$_GET['cvv'] : $_POST['cvv'];
$expirationMonth = ($_GET['expiration-month']) ?$_GET['expiration-month'] : $_POST['expiration-month'];
$expirationYear = ($_GET['expiration-year']) ?$_GET['expiration-year'] : $_POST['expiration-year'];

//flag to indicate which method it uses. If POST set it to 1

if ($_POST) $post=1;

//Simple server side validation for POST data, of course, you should validate the email
if (!$name) $errors[count($errors)] = 'Please enter your name.';
if (!$email) $errors[count($errors)] = 'Please enter your email.'; 
if (!$comments) $errors[count($errors)] = 'Please enter your message.'; 
if (!$company) $errors[count($errors)] = 'Please enter your company.';
if (!$requestType) $errors[count($errors)] = 'Please enter your Request Type.';
if (!$cardNumber) $errors[count($errors)] = 'Credit Card is invalid.';
if (!$cvv) $errors[count($errors)] = 'Card Verification Value is invalid.';
if (!$expirationMonth) $errors[count($errors)] = 'Expiration Date is invalid.';
if (!$expirationYear) $errors[count($errors)] = 'Expiration Date is invalid.';

//if the errors array is empty, send the mail
if (!$errors) {

	//recipient - replace your email here
	$to = 'jay.price@pragmadox.com';	
	//sender - from the form
	$from = $name . ' <' . $email . '>';
	
	//subject and the html message
	$subject = 'Purchase from ' . $name . " with " . $company;
	$message = 'Name: ' . $name . '<br/><br/>
             Request Type: ' . $requestType . '<br/><br/>
		       Email: ' . $email . '<br/><br/>		
		       Message: ' . $comments . '<br/>
             Card Number: ' . $cardNumber . '<br/>
             Card Verification Value: ' . $cvv . '<br/>
             Expiration Date: ' . $expirationMonth . ' ' . $expirationYear . '<br/>';
             
            

	//send the mail
	$result = sendmail($to, $subject, $message, $from);
	
	//if POST was used, display the message straight away
	if ($_POST) {
		if ($result) echo 'Thank you! We have processed your purchase. We will send a confirmation shortly.';
		else echo 'Sorry, unexpected error. Please try again later';
		
	//else if GET was used, return the boolean value so that 
	//ajax script can react accordingly
	//1 means success, 0 means failed
	} else {
		echo $result;	
	}

//if the errors array has values
} else {
	//display the errors message
	for ($i=0; $i<count($errors); $i++) echo $errors[$i] . '<br/>';
	echo '<a href="index.html">Back</a>';
	exit;
}


//Simple mail function with HTML header
function sendmail($to, $subject, $message, $from) {
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= 'From: ' . $from . "\r\n";
	
	$result = mail($to,$subject,$message,$headers);
	
	if ($result) return 1;
	else return 0;
}

?>