<?php
/*///////////////////////////////////////////////////////////////////////
Part of the code from the book 
Building Findable Websites: Web Standards, SEO, and Beyond
by Aarron Walter (aarron@buildingfindablewebsites.com)
http://buildingfindablewebsites.com

Distrbuted under Creative Commons license
http://creativecommons.org/licenses/by-sa/3.0/us/
///////////////////////////////////////////////////////////////////////*/
	
// Validation
if(!$_GET['email']){ return '<div class="error">No email address provided</div>'; }

if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $_GET['email'])) {
	print '<div class="error">Email address is invalid</div>';
	exit();
}

require_once('MCAPI.class.php');
// grab an API Key from http://admin.mailchimp.com/account/api/
$api = new MCAPI('0c8e66209155649380f5974edc69a413-us4');

// grab your List's Unique Id by going to http://admin.mailchimp.com/lists/
// Click the "settings" link for the list - the Unique Id is at the bottom of that page. 
$list_id = "e652689d9b";

if($api->listSubscribe($list_id, $_GET['email'], '') === true) {
	// It worked!	
	print '<div class="success">Success! Check your email to confirm sign up.</div>';
} elseif ($api->errorCode == 214) {
	print '<div class="error">Your email\'s already on the list! We\'re working hard and we\'ll be in touch soon.</div>';
} else {
	// Catch all error
	print '<div class="error">Error: ' . $api->errorMessage . '</div>';
}
	
?>
