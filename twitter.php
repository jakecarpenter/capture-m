<?php
	session_start();
	
	//twitter stuff
	$auth = array();
	$auth['oauth_access_token'] = '13847502-UBL9TqXz17T93lLkIwMvCeqWQTf5bJFUaZYuoo';
	$auth['oauth_access_token_secret'] = 'KBXmWjEzZQivp5Y3dpIOpVVySEnAanfi4CaRY9A6Y2M';
	$auth['consumer_key'] = 'WTjy8aqpg5fo7MNrjjYfQ';
	$auth['consumer_secret'] = 'SNeFuSp9UXyXZX2HujW2lnojmvv4VyoskDXG02PYCM';
	
	//get the library
	require("twitteroauth/twitteroauth.php");
	
	//parse
	$parse_user = $_GET['user'];
	$parse_session = $_GET['session'];
	
	// The TwitterOAuth instance  
	$connection = new TwitterOAuth($auth['consumer_key'], $auth['consumer_secret']); 
	
//	$connection->$host = "https://api.twitter.com/1.1/"; 

	//setup our callback.
	$callback = "http://m.trycapture.com/twitter_complete.php?user=" . $parse_user . "&session=" . $parse_session;

	/* Get temporary credentials. */
	$request_token = $connection->getRequestToken($callback);
	
	/* Save temporary credentials to session. */
	$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	 
	/* If last connection failed don't display authorization link. */
	switch ($connection->http_code) {
	  case 200:
	    /* Build authorize URL and redirect user to Twitter. */
	    $url = $connection->getAuthorizeURL($token);
	    header('Location: ' . $url); 
	    break;
	  default:
	    /* Show notification if something went wrong. */
	    echo 'Could not connect to Twitter. Refresh the page or try again later.';
	}
	






?>
