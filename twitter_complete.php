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
	
	//twitter stuff
	$auth = array();
	$auth['oauth_access_token'] = '13847502-UBL9TqXz17T93lLkIwMvCeqWQTf5bJFUaZYuoo';
	$auth['oauth_access_token_secret'] = 'KBXmWjEzZQivp5Y3dpIOpVVySEnAanfi4CaRY9A6Y2M';
	$auth['consumer_key'] = 'WTjy8aqpg5fo7MNrjjYfQ';
	$auth['consumer_secret'] = 'SNeFuSp9UXyXZX2HujW2lnojmvv4VyoskDXG02PYCM';
	
print_r($_REQUEST);

$parse_url = "https://api.parse.com";
$parse_headers = array(
   'X-Parse-Application-Id:  JfuHcRkELk91tbejwxCllYPRyauk3s4jCnTKQjah',
   'X-Parse-REST-API-Key: LO8kGXmk83QlC2vQI1QGcEkt3cNDeIC2RHNogfpn'
);


$parseData = array(
		
		"authData" => array(
			"twitter" => array(
				"id" => "",
				"screen_name" => $_REQUEST['screen'],
				"consumer_key" => $auth['consumer_key'],
				"consumer_secret" => $auth['consumer_secret'],
				"auth_token" => "",
				"auth_token_secret" => ""
			)
		)
	);
	
	$curl = curl_init();
	
	//add the content type for the data to the headers;
	$parse_headers[] = "Content-type: application/json";
	
	$parse_header[] = "X-Parse-Session-Token:  ".$_REQUEST['session'];
	
	curl_setopt($curl, CURLOPT_URL,  $parse_url . "/1/users/".$_REQUEST['user']);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_USERAGENT, 'trycapture.com-update-engine/1.0');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $parse_headers);
	curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($parseData));
	
	$curl_response = curl_exec($curl);
    curl_close($curl);

?>