<?php 

include ('../bdd/connexion.php');

if(isset($_POST['send'])){

	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$genre = htmlspecialchars($_POST['genre']);
	$numPhone = htmlspecialchars($_POST['numPhone']);
	$id = htmlspecialchars($_POST['id']);

	$requete = $pdo->prepare("UPDATE etudiant set nom=?, prenom=?, genre=?, numTelephone=? where id=?");
	$requete->execute([$nom, $prenom, $genre, $numPhone, $id]);

	$message = 'Modification réussie';
	header('location:../../index.php?message='.$message);
}