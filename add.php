<?php


	include('config/db_connect.php');

$Nume = $Prenume = $Adresa = $IDClasa = $DenClasa = $Media = $DataNElev = $Media = $Telefon = $Sex = '';
	$errors = array('Nume' => '', 'Prenume' => '', 'Adresa' => '', 'IDClasa' => '', 'DenClasa' => '', 'Media' => '', 'Telefon' => '', 'Sex' => '', 'DataNElev' => '');

/*
DenClasa
Media
DataNElev
Telefon
Sex*/

	if(isset($_POST['submit'])){
		
	
		
	if(empty($_POST['Nume'])){
			$errors['Nume'] = 'Este nevoie de nume aici';
		} else{
			$Nume = $_POST['Nume'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $Nume)){
				$errors['Nume'] = 'Numele trebuie să conțină numai litere';
			}
		}


		if(empty($_POST['Prenume'])){
			$errors['Prenume'] = 'Este nevoie de prenume aici';
		} else{
			$Prenume = $_POST['Prenume'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $Prenume)){
				$errors['Prenume'] = 'Prenumele trebuie să conțină numai litere';
			}
		}

		


		// check Adresa
		if(empty($_POST['Adresa'])){
			$errors['Adresa'] = 'Introduceți adresa elevului';
		} else{
			$Adresa = $_POST['Adresa'];
			
		}
//////////

//


		if(empty($_POST['IDClasa'])){
		$errors['IDClasa'] = 'Introduceți ID-ul clasei';
		} else{
			$IDClasa = $_POST['IDClasa'];
			if(!preg_match('/^[a-zA-Z0-9]+$/', $IDClasa)){
				$errors['IDClasa'] = 'ID-ul trebuie să conțină numai litere și cifre';
			}
		}

///



			if(empty($_POST['DenClasa'])){
			$errors['DenClasa'] = 'Este nevoie de denumirea clasei aici';
		} else{
			$DenClasa = $_POST['DenClasa'];
			if(!preg_match('/^[a-zA-Z0-9]+$/', $DenClasa)){
				$errors['DenClasa'] = 'DenClasa trebuie să conțină numai litere și cifre';
			}
		}


	////

		if(empty($_POST['Media'])){
			$errors['Media'] = 'Este nevoie de media elevului';
		} else{
		$Media = $_POST['Media'];
			if(!is_numeric($Media)){
				$errors['Media'] = 'Media trebuie să conțină numai cifre și un punct';
			}
		}


		///////


			if(empty($_POST['Telefon'])){
			$errors['Telefon'] = 'Este nevoie de telefonul elevului';
} else{
			$Telefon = $_POST['Telefon'];
			if(!is_numeric($Telefon)){
				$errors['Telefon'] = 'Telefonul este nevoie să fie format numai din cifre';
		}
		}

////
	if(empty($_POST['DataNElev'])){
			$errors['DataNElev'] = 'Este nevoie de data nașterii elevului';
		} else{
			$DataNElev = $_POST['DataNElev'];
			if(!preg_match('/^[0-9-]+$/', $DataNElev)){
				$errors['DataNElev'] = 'A-ți introdus data nașterii incorect';
			}
		}
		////


	if(empty($_POST['Sex'])){
			$errors['Sex'] = 'Este nevoie de sexul elevului';
		} else{
			$Sex = $_POST['Sex'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $Sex)){
				$errors['Sex'] = 'A-ți introdus sexul elevuli incorect';
			}
		}



		if(array_filter($errors)){

		} else {

			$Nume = mysqli_real_escape_string($conn, $_POST['Nume']);
			$Prenume = mysqli_real_escape_string($conn, $_POST['Prenume']);
			$IDClasa = mysqli_real_escape_string($conn, $_POST['IDClasa']);
			$DenClasa = mysqli_real_escape_string($conn, $_POST['DenClasa']);
			$Adresa = mysqli_real_escape_string($conn, $_POST['Adresa']);
			$Telefon = mysqli_real_escape_string($conn, $_POST['Telefon']);
			$DataNElev = mysqli_real_escape_string($conn, $_POST['DataNElev']);
			$Media = mysqli_real_escape_string($conn, $_POST['Media']);
			$Sex = mysqli_real_escape_string($conn, $_POST['Sex']);
 		
$sql = "INSERT INTO elevi(IDClasa, Nume, Prenume, DenClasa, Media, DataNElev, Adresa, Telefon, Sex) VALUES('$IDClasa', '$Nume', '$Prenume', '$DenClasa', '$Media', '$DataNElev','$Adresa', '$Telefon', '$Sex')";

mysqli_query($conn, $sql);
}
		
}

?> 
<!DOCTYPE html>

<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Adaugă un elev</h4>
		<form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			
			<label>IDClasa :</label>
			<input type="text" name="IDClasa" value="<?php echo htmlspecialchars($IDClasa) ?>">
			<div class="red-text"><?php echo $errors['IDClasa']; ?></div>

			<label>Nume :</label>
			<input type="text" name="Nume" value="<?php echo htmlspecialchars($Nume) ?>">
			<div class="red-text"><?php echo $errors['Nume']; ?></div>

			<label>Prenume :</label>
			<input type="text" name="Prenume" value="<?php echo htmlspecialchars($Prenume) ?>">
			<div class="red-text"><?php echo $errors['Prenume']; ?></div>

			<label>Adresa :</label>
			<input type="text" name="Adresa" value="<?php echo htmlspecialchars($Adresa) ?>">
			<div class="red-text"><?php echo $errors['Adresa']; ?></div>

			<label>Clasa :</label>
			<input type="text" name="DenClasa" value="<?php echo htmlspecialchars($DenClasa) ?>">
			<div class="red-text"><?php echo $errors['DenClasa']; ?></div>

			<label>Media :</label>
			<input type="text" name="Media" value="<?php echo htmlspecialchars($Media) ?>">
			<div class="red-text"><?php echo $errors['Media']; ?></div>

			<label>Data nașterii elevului :</label>
			<input type="text" name="DataNElev" value="<?php echo htmlspecialchars($DataNElev) ?>">
			<div class="red-text"><?php echo $errors['DataNElev']; ?></div>

			<label>Telefon :</label>
			<input type="text" name="Telefon" value="<?php echo htmlspecialchars($Telefon) ?>">
			<div class="red-text"><?php echo $errors['Telefon']; ?></div>

			<label>Sex :</label>
			<input type="text" name="Sex" value="<?php echo htmlspecialchars($Sex) ?>">
			<div class="red-text"><?php echo $errors['Sex']; ?></div>


			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>