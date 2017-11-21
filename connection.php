<?php
$hote = 'localhost';
$nom_bdd = 'projetbulko';
$utilisateur = 'root';
$port=3306;
try {
 //On test la connexion à la base de donnée
    $pdo = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nom_bdd, $utilisateur);

} catch(Exception $e) {
 //Si la connexion n'est pas établie, on stop le chargement de la page.
 reponse_json($success, $data, 'Echec de la connexion à la base de données');
    exit();

}   
