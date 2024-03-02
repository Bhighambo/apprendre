<?php 

try {

	$pdo = new pdo('mysql:host=localhost;dbname=inscription','root','');
	
} catch (Exception $e) {
	echo $e->getMessage();
}


?>