<?php
include_once (dirname(__FILE__) . '/../vendor/autoload.php');

use prodigyview\network\Router;
use prodigyview\network\Request;
use prodigyview\network\Response;

Router::init();

Router::post('/callme', array('callback'=>function(Request $request){
	
	$response = array('status' => 'success', 'message' => 'Responding');
	echo Response::createResponse(200, json_encode($response));
}));

Router::setRoute();