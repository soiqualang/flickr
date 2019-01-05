<?php
// Start the session since phpFlickr uses it but does not start it itself
session_start();

// Require the phpFlickr API
require_once('phpFlickr.php');

// Create new phpFlickr object: new phpFlickr('[API Key]','[API Secret]')
$flickr = new phpFlickr('ebba237355f8b84de50d168b5acae0d0','9e1ae67320f220a3', true);

// Authenticate;  need the "IF" statement or an infinite redirect will occur
//The three permissions are "read", "write" and "delete"
if(empty($_GET['frob'])) {
	$flickr->auth('write'); // redirects if none; write access to upload a photo
}
else {
	// Get the FROB token, refresh the page;  without a refresh, there will be "Invalid FROB" error
	$flickr->auth_getToken($_GET['frob']);
	header('Location: flickr.php');
	exit();
}
//https://www.flickr.com/services/auth/?api_key=ebba237355f8b84de50d168b5acae0d0&perms=write&api_sig=e476439b805ecff23631dac7fdb2469b


// Send an image sync_upload(photo, title, desc, tags)
// The returned value is an ID which represents the photo
/* $result = $flickr->sync_upload('img1.png', $_POST['title'], $_POST['description'], 'david walsh, php, mootools, dojo, javascript, css') */
?>