<?php include 'conn.php' ?>
<?php



$y=$_POST['value'];

	$d= date("Y/m/d");


	
	//if student is marked present and then absent, then data will be deleted from attendance table
	$cquery= "DELETE  FROM AttendanceTable where '$y'=Student_ID and '$d'= Attendancedate ";
	$cresult=mysqli_query($con, $cquery);
	
		if (!$cresult)
  {
  echo("Error description: " . mysqli_error($con));
  }

	
?>






