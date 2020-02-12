<?php include 'conn.php' ?>
<?php



$y=$_POST['value'];

	$d= date("Y/m/d");
	//echo $d;

	$con = mysqli_connect("localhost", "root", "", "techdb");
	//query that is extracting username and student id to put into attendance table
	$cquery= "SELECT username, Student_ID FROM Student where '$y'=Student_ID ";
	$cresult=mysqli_query($con, $cquery);
	while($crow = mysqli_fetch_array($cresult)){
		$sid=$crow['Student_ID'];
		$sun=$crow['username'];
		//insert into attendance table if student is present

		$query="SELECT *FROM AttendanceTable WHERE '$d'=Attendancedate and '$sun'=username";
		$result=mysqli_query($con, $query);
		$rowcount=mysqli_num_rows($result);
		if($rowcount==0){
		$sql= "INSERT INTO AttendanceTable (username, Student_ID,Attendancedate) Values('$sun','$sid', '$d');";
		$result=mysqli_query($con, $sql);
		if (!$result)
			  {
			  echo("Error description: " . mysqli_error($con));
			  }
		}
	}
?>






