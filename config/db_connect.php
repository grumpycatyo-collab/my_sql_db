<?php 

$conn = mysqli_connect('localhost', 'maxik', 'test1234', 'liceu');

// check connection
if(!$conn){
  echo 'Connection error: ' . mysqli_connect_error();
}

 ?>