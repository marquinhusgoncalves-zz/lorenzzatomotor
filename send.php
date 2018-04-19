<?php
// This script sends an email to your email address from the contact form. Change the variable below to your own email address:
$my_email = 'eu@marquinhusgoncalves.com';

// Checks email address is a valid one (as far as possible - it basically checks for user errors)
function validateEmail($data){
	$filterEmail = filter_var($data,FILTER_SANITIZE_EMAIL);
	if($data == $filterEmail && filter_var($data,FILTER_VALIDATE_EMAIL)){
		return true;
	} else {
		return false;
}

// Use validateEmail function above
if(validateEmail($_POST['email'])){

	// Sanitise data
	$first_name = htmlspecialchars($_POST['name']);
	$email = $_POST['email'];
	$message = htmlspecialchars($_POST['message']);


	$content = "<p>Hey hey,</p>
		<p>You have recieved an email from $first_name via the website's 'Contact Us' form. Here's the message:</p>
		<p>$message</p>
		<p>
			From: $first_name
			<br />
			Email: $email
		</p>";

	$try = mail($my_email,"$name has emailed via the website",$content,"Content-Type: text/html;");

	// If there was an error sending the email (PHP can use 'sendmail' on GNU/Linux, the easiest way - but do check your spam folder)
	if(!$try){
		echo '<p>There was an error when trying to send your email. Please try again.</p>';
	} else {
		// echo out some response text (to go in <div id="reponse"></div>)
		echo '<p>Thank you ' . $first_name . '. We will reply to you at <em>' . $email .'</em></p>';
	}

// If the email address does not pass the validation
} else {
	echo '<p>There was an error with the email address you entered. Please try again.</p>';
}
