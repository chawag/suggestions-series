<?php 
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8"); 

include_once '../config/database.php';
include_once '../objects/serie.php';

$database = new Database();
$db = $database->getConnection();

$orderData = json_decode(file_get_contents("php://input"));
//print_r($orderData);
$limit = $orderData->limit;
$orderBy = $orderData->orderBy;

$serie = new Serie($db);

// appel de la méthode fetchAllSeries 
$stmt = $serie->fetchAllSeries($limit, $orderBy);
$numbr = $stmt->rowCount();
$data = '';

if ($numbr > 0) {
	$data = $stmt->fetchAll();
	echo json_encode($data);
}