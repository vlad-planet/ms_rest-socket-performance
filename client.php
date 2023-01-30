<?php
include ('vendor/autoload.php');

use prodigyview\network\Curl;
use prodigyview\network\Socket;
use prodigyview\system\Security;

/*
echo "\nStarting Route Speed Tests\n\n";

	$data = array('test' => 'string','ofdata' => 'to send');
	Security::init();

	$curl = new Curl('127.0.0.1:8000/callme');
	$curl->send('post',$data );
	
	echo '<pre>';
	var_dump($curl);
	
	$curl->getResponse();
*/


echo "\nStarting Route Speed Tests\n\n";

$request = 100;
$data = array('test' => 'string','ofdata' => 'to send');
Security::init();


//Rest Запрос отправки данных с использованием Маршрутиризации
$start = microtime(true);
for($i =0; $i<$request; $i++) {
	$curl = new Curl('127.0.0.1:8000/callme');
	$curl->send('post',$data );
	//echo $curl->getResponse() . "\n";
}
echo 'HTTP Routing Time: ' . (microtime(true) - $start) . "\n";


//Rest Прямой запрос отправки данных
$start = microtime(true);
for($i =0; $i<$request; $i++) {
	$curl = new Curl('127.0.0.1:8000/get.php');
	$curl->send('get',$data );
	//echo $curl->getResponse() . "\n";
}
echo 'HTTP GET Time (No Routing): ' . (microtime(true) - $start) . "\n";


//Socket Запрос передачи данных на сервер
$start = microtime(true);
for($i =0; $i<$request; $i++) {
	//Connect To Server 1, send message
	
	$socket = new Socket('localhost', 8650, array('connect' => true));
	$message = Security::encrypt(json_encode($data));
	$response = $socket->send($message);
	$socket->close();
	//echo $response . "\n";
}
echo 'Socket Test Time: ' . (microtime(true) - $start) . "\n";


/*
$start = microtime(true);
$socket = new Socket();

for($i =0; $i<$request; $i++) {
	//Connect To Server 1, send message
	
	$options = array(
		'domain' => AF_INET,
		'type' => SOCK_STREAM,
		'protocol' => 0,
	);

	$socket->create($options['domain'], $options['type'], $options['protocol']);
	$socket->connect('localhost', 8650);

	$message = Security::encrypt(json_encode($data));
	$response = $socket->send($message);
	$socket->close();
	//echo $response . "\n";
}

echo 'Socket Test Time: ' . (microtime(true) - $start) . "\n";
*/