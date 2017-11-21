<?php
include('templateJson.php');

if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['tel'])  && isset($_POST['message'])) {
	$tel = intval($_POST['tel']);
	//verivication que l'email et valide et que le numero de téléphone soit composé de 10 chiffre et commence par un 0
	if (filter_var($email_a, FILTER_VALIDATE_EMAIL)) && (preg_match("~^0\d{10}$~", $tel)) &&  {
	//securisation d'injection sql
		$nom =mysql_real_escape_string($_POST['nom']);
		$email =mysql_real_escape_string($_POST['email']);
		$telephone =mysql_real_escape_string($_POST['tel']);
		$message =mysql_real_escape_string($_POST['message']);
		//preparation de la requete sql
		$requete = $pdo->prepare("INSERT INTO `message` (`id`, `nom`, `email`, `tel`, `message`) VALUES (NULL, :nom, :email, :tel, :message);");
		$requete->bindParam(':nom', $nom);
		$requete->bindParam(':email', $email);
		$requete->bindParam(':tel', $telephone);
		$requete->bindParam(':message', $message);
			if( $requete->execute() ){	
				$success = true;
				$msg = 'le message a bien été ajouté';
				// Le contenu du mail
				$mail = "un message a \ét\é post\é par "+$nom+" avec son email " + $email + "et ce numero de telephone " + $tel + " . le message est le suivant : " + $message;

				// Envoi du mail
				mail('info@bulko.net', 'message envoy\é', $mail);
			} else {
				$msg = "Une erreur s'est produite";
			}
	}
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg); 
?>