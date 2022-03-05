<?php
// MySQLi or PDO
//connection to database
include('config/db_connect.php');
//write query pentru toti elevii
$sql = 'SELECT Nume, Prenume, id, DenClasa FROM elevi ';

//make a query & get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$elevi = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);

//explode function just in case
//print_r(explode(',', $elevi['']));

?>

<!DOCTYPE html>
<html>
  <?php 
  
  include('templates/header.php'); 
  ?>

<h4 class="center grey-text">Elevii:</h4>

<div class="container">
	<div class="row">
		<?php foreach($elevi as $elev): ?>

			<div class="col s4 md6">
				<div class="card z-depth-0 ">
					<div class="class-content center">
						
						<h8> <?php echo htmlspecialchars($elev['Nume']);  ?> </h8>
						<h8> <?php echo htmlspecialchars($elev['Prenume']);  ?> </h8>
						<div> <?php echo htmlspecialchars($elev['DenClasa']); ?></div>
					</div>
					<div class="card-action right-align">
						<a class="regular_mf" href="details.php?id=<?php echo $elev['id'] ?>">Mai multă info.</a>
					</div>
				</div>
			</div>

			<?php endforeach; ?>

			<?php if(count($elevi) >=2): ?>
				<p>În baza de date avem mai mulți de 2 elevi</p>
			<?php  else : ?>
				<p>În baza de date sunt mai puțini de 2 elevi</p>
				<?php endif; ?>
	</div>
</div>

  <?php 
  
  include('templates/footer.php'); 

  ?>


</html> 