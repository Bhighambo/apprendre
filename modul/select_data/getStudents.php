<?php 

function get_students($pdo){
	$statement = $pdo->prepare("SELECT * FROM etudiant");
	$statement->execute();

	return $statement;
}

function get_students_update($id, $pdo){
	$statement = $pdo->prepare("SELECT * FROM etudiant where id=?");
	$statement->execute([$id]);

	return $statement;
}

