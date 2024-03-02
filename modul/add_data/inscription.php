<?php 

include ('../bdd/connexion.php');

if(isset($_POST['send'])){

	if(!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['genre']) and !empty($_POST['numPhone'])){

		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$genre = htmlspecialchars($_POST['genre']);
		$numPhone = htmlspecialchars($_POST['numPhone']);

		$requete = $pdo->prepare("INSERT INTO etudiant (nom, prenom, genre, numTelephone) values(?,?,?,?)");
		$requete->execute(array($nom, $prenom, $genre, $numPhone));

		$message = 'Enregistrement réussi';
		header('location:../../index.php?message='.$message);

	}else{
		$message = 'Tous les champs sont obligatoires';
		header('location:../../index.php?message='.$message);
	}
}

 ?>