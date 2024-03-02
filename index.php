<?php 
include ('modul/bdd/connexion.php');


include ('modul/select_data/getStudents.php');
$students = get_students($pdo);

$id = "";

if(isset($_GET['modifier'])){
	$id = $_GET['modifier'];
}

$update_student = get_students_update($id, $pdo);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ma page de d'index</title>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center align-intems-center vh-800">
	<?php if (empty($_GET['modifier'])): ?>
		<div class="w-40 p-5 shadow rounded">
			<div>
				<h1>Inscription</h1>
			</div>

			<?php if (!empty($_GET['message'])): ?>
				<div class="alert alert-info"><?= $_GET['message']?></div>
			<?php endif ?>

			<form action="modul/add_data/inscription.php" method="post">
				<div class="group-form">
					<label>NOM</label>
					<input type="text" name="nom" class="form-control">
				</div>

				<div class="group-form">
					<label>PRENOM</label>
					<input type="text" name="prenom" class="form-control">
				</div>
				<div class="group-form">
					<label>GENRE</label>
					<select class="form-control" name="genre">
						<option>M</option>
						<option>F</option>
					</select>
				</div>

				<div class="group-form">
					<label>NUM TELEPHONE</label>
					<input type="phone" name="numPhone" class="form-control">
				</div> <br>

				<div class="group-form">
					<input type="submit" name="send" class="btn btn-success">
				</div>
			</form>	
		</div>
	<?php endif ?>

	<?php if (!empty($_GET['modifier'])): ?>

		<?php 
		foreach ($update_student as $values) {
			?>
			<div class="w-40 p-5 shadow rounded">
				<div>
					<h1>Modification</h1>
				</div>
				<form action="modul/update_data/updateStudents.php" method="post">
					<div class="group-form">
						<label>NOM</label>
						<input type="text" name="nom" value="<?= $values['nom'] ?>" class="form-control">
					</div>

					<div class="group-form">
						<label>PRENOM</label>
						<input type="text" name="prenom" value="<?= $values['prenom'] ?>" class="form-control">
					</div>
					<div class="group-form">
						<label>GENRE</label>
						<select class="form-control" name="genre">
							<option value="<?= $values['genre'] ?>"><?=$values['genre'] ?></option>
							<option>M</option>
							<option>F</option>
						</select>
					</div>

					<div class="group-form">
						<label>NUM TELEPHONE</label>
						<input type="phone" name="numPhone" value="<?= $values['numTelephone'] ?>" class="form-control">
					</div> <br>

					<input type="hidden" name="id" value="<?= $values['id'] ?>">

					<div class="group-form">
						<input type="submit" name="send" class="btn btn-success" value="Appliquer">
					</div>
				</form>	
			</div>

			<?php
		}

		 ?>
	<?php endif ?>

	<div class="w-40 p-5 shadow rounded">
		<?php if (!empty($_GET['confirmer'])): ?>
			<div class="alert alert-success">Voulez-vous vraiment supprimer? <a href="modul/delete_data/deleteStudents.php?supprimer=<?= $_GET['confirmer']?>" class="btn btn-primary">OUI</a> <a href="index.php" class="btn btn-primary">NON</a></div>
		<?php endif ?>
		<table class="table">
			<thead>
				<tr>
					<th>N°</th>
					<th>NOM</th>
					<th>PTRENOM</th>
					<th>GENRE</th>
					<th>NUM TELEPHONE</th>
					<th colspan="2" class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$num = 0;
					foreach ($students as $etudiant) {
						$num = $num + 1;
						?>
						<tr>
							<td><?php echo $num; ?></td>
							<td><?= $etudiant['nom'] ?></td>
							<td><?= $etudiant['prenom'] ?></td>
							<td><?= $etudiant['genre'] ?></td>
							<td><?= $etudiant['numTelephone'] ?></td>
							<td><a href="index.php?modifier=<?= $etudiant['id'] ?>" class="btn btn-primary">Modifier</a></td>
							<td><a href="index.php?confirmer=<?=$etudiant['id'] ?>" class="btn btn-danger">Supprimer</a></td>
						</tr>
						<?php
						
					}

				 ?>
			</tbody>
		</table>
		
	</div>

</body>
</html>