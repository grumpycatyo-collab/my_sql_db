<?php 

	include('config/db_connect.php');

	if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM elevi WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)){
			header('Location: index.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

	} 

	// check GET request id param
	//isset //if the variable is actually set
	if(isset($_GET['id'])){
		
		// escape sql chars ( sort the idelev from unusual char that can be malware)
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM elevi WHERE id = $id";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$elev = mysqli_fetch_assoc($result);
 
		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>

	<div class="container">
		<div class="lastshit">
		<?php if($elev): ?>
		<h4><?php echo $elev['Nume'], ' ',$elev['Prenume'] ; ?></h4>

			<h5>IDClasa:</h5>
			<p><?php echo $elev['IDClasa']; ?></p>

			<h5>Clasa:</h5>
			<p><?php echo $elev['DenClasa']; ?></p>


			<h5>Adresa:</h5>
			<p><?php echo $elev['Adresa']; ?></p>


			<h5>Telefon:</h5>
			<p><?php echo $elev['Telefon']; ?></p>

			<h5>Data nașterii elevului:</h5>
			<p><?php echo $elev['DataNElev']; ?></p>

			<h5>Media elevului:</h5>
			<p><?php echo $elev['Media']; ?></p>

			<h5>Sexul elevului:</h5>
			<p><?php echo $elev['Sex']; ?></p>

			<!-- DELETE FORM -->
			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $elev['id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			</form> 

		<?php else: ?>
			<h5>Nu există așa elev.</h5>
		<?php endif ?>
	</div></div>

	<?php include('templates/footer.php'); ?>
