<?php
include('templateJson.php');

if( !empty($_GET['id']) ){
	$requete = $pdo->prepare("SELECT * FROM `messge` WHERE `id` LIKE :id");
	$requete->bindParam(':id', $_GET['id']);
} else {
	//Sinon on affiche tous les messages
	$requete = $pdo->prepare("SELECT * FROM `message`");
}


if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
	$success = true;
	$data['messages'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data); 
?>