<?php
include_once (dirname(__FILE__) . '/../vendor/autoload.php');

use prodigyview\system\Security;
use prodigyview\network\Socket;

//Создать сервер
$server = new Socket('localhost', 8650, array(
	'bind' => true,
	'listen' => true
));

//Запустите сервер
$server->startServer('', function($message) {

	//Расшифровать полученное зашифрованное сообщение
	Security::init();
	$message = Security::decrypt($message);

	//Преобразовать данные в массив
	$data = json_decode($message, true);

	//Ответ по умолчанию
	$response = array('status' => 'success', 'message' => 'Responding');

	//Преобразовать ответ в JSON
	$response =json_encode($response);
	
	//Вернуть зашифрованное сообщение
	return Security::encrypt($response);

}, 'closure');
