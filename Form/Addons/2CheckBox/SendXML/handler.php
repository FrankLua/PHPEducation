<?php

$message = $_POST['message'];
$data = array( $message => "message");
$xml = new SimpleXMLElement('<response/>');
array_walk_recursive($data, array($xml, 'addChild'));

echo $xml->asXML();
