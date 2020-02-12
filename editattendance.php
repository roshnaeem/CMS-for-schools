<?php session_start()
 ?>
 <?php include 'conn.php' ?>
 <?php
 	//present date
	$date= date("Y/m/d");
	echo "<h1>Date: $date</h1>";
	$teche=$_SESSION['Email'];
	
	echo "<h2>Students Present are following. Press x sign to unmark them</h2>";
	//select students of loggin in teacher
	$sql="SELECT Student_ID from TeacherStudent where '$teche' =Email";
	$res=mysqli_query($con, $sql);



		echo '<table border="1" >';
		echo '<tr><th>Student username</th><th >Date </th> <th colspan="2">Mark Attendance</th></tr>';
	while($row = mysqli_fetch_array($res)){

		$r= $row['Student_ID'];
		if(isset($_GET["d"])){
			//echo $_GET["d"];
			if($_GET["d"]==$date){
			
	//query to select data of students from attendance table of present date so teacher can edit it
	$sql="SELECT * FROM `AttendanceTable` WHERE '$date'= Attendancedate and '$r'=Student_ID";
	$result=mysqli_query($con,$sql);
	
	while($row=mysqli_fetch_array($result)){
			echo '<tr><td>'.$row['username'].'</td><td>'.$row['Attendancedate'].'</td><td>Unmark &nbsp &nbsp &nbsp<a href="unmark.php?cd='.$_GET["d"].'&s1='.$r.'"><i class="fa fa-remove" style="font-size:24px; color: #008080;"></i></a></td></tr>';
					}
				}
			}


		}
	echo '</table>';

	echo '<br><br><a href="attendancepage.php" class="att" >Back</a>';







?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		
* {box-sizing: border-box;}

table{
	 font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width:80%;
  margin-left:5%;
}
h1{
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  width:40%;
  background-color: #008080;
  color: white;
  padding-left:5%;
  margin-left:5%;
}
h2{
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	padding-top: 5px;
  padding-bottom: 5px;
  text-align: left;
 
  background-color: #008080;
  color: white;
  padding-left:2%;
  margin-left:5%;
}
 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #008080;
  color: white;
  padding-left:5%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

a.att:link, a:visited {
  background-color: white;
  color: black;
  border: 2px solid #008080;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  float:right;
  margin-right: 20%;
}

a.att:hover, a:active {
  background-color:#008080;
  color: white;
}
	</style>
</head>
<body>


</body>
</html>