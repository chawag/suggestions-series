<?php
// Connexion bdd
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

// Objet serie
include_once '../objects/serie.php';
$serie = new Serie($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));
//print_r($data);

$serie->imdbID = $data->imdbID;
$serie->title = $data->title;
$serie->year = $data->year;
$serie->runtime = $data->runtime;
$serie->genre = $data->genre;
$serie->actors = $data->actors;
$serie->plot = $data->plot;
$serie->country = $data->country;
$serie->poster = $data->poster;
$serie->pseudo = $data->pseudo;

if ( isset($data->comment) && !empty($data->comment) ) {
	$serie->comment = $data->comment;
}
else{
	$serie->comment = '';
}

$serie->created = date('Y-m-d H:i:s');

// méthode création en bdd de la série
if ($serie->createSerie()) {
	echo "ok";
}
else{
	echo "error";
}