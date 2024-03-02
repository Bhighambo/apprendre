<?php 

include ('../bdd/connexion.php');

if(isset($_GET['supprimer'])){
	$id = $_GET['supprimer'];

	$requete = $pdo->prepare("DELETE from etudiant where id=?");
	$requete->execute([$id]);

	$message = 'Suppression réussie';
	header('location:../../index.php?message='.$message);
}