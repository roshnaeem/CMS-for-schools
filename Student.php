<?php session_start()
 ?>

<!DOCTYPE html>
<html>
<head>
	
<title>Student</title>
<style type="text/css">
table{

	margin-left:10%;
	 font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
}
h1{
	margin-left:10%;
}
 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #008080;
  color: white;
  padding-left:5%;
}
* {box-sizing: border-box;}

th,td{
	
  text-align: left;
  font-size:20px;
	padding: 10px;
	width:25%;
}
tr:hover {background-color: #ddd;}

img.avatar {
  width: 20%;
  border-radius: 50%;
  margin-left:10%;
}
span{
	padding-right: :2%;
}
a.att:link, a:visited {
  background-color: white;
  color: black;
  border: 2px solid #008080;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin-right:20%;
  float:right;
}

a.att:hover, a:active {
  background-color:#008080;
  color: white;
}



</style>
</head>
<body>

	<div><br></div>
<?php include 'conn.php' ?>
	<?php

	$var = $_SESSION['Student_ID'];


	//select data of student who is logged in 
	$sql="SELECT Email FROM Student WHERE Student_ID =".$var;
	$result=mysqli_query($con, $sql);
	

	while($row = mysqli_fetch_array($result)){
		echo '<img  src="https://image.flaticon.com/icons/png/512/306/306473.png"  class="avatar"></td><td colspan="3" ><h1>'.$row['Email'].'</h1><br>';
	}
	echo '<table border="1">';
	//The basic data of students added by teacher
	echo '<tr><th> SKILLS </th><th colspan="2"> COMMENTS </th><th> SCORES </th></tr>';
	echo '<tr><td>';

	//query to select skills of student
	$sql="SELECT Skill FROM Skills WHERE Student_ID =".$var;
	$result=mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($result)){
		echo "<span>".$row['Skill']."</span><br>";
	}
	echo '</td><td colspan="2">';

	//query to select comments about student
	$sql="SELECT Comment FROM Comments WHERE Student_ID =".$var;
	$result=mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($result)){
		echo "<span>".$row['Comment']."</span><br>";
	}
	echo '</td><td>';

	//query to select scores of student
	$sql="SELECT Score FROM Scores WHERE Student_ID =".$var;
	$result=mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($result)){
		echo "<span>".$row['Score']."</span><br>";
	}
	
	echo '</td></tr></table>';
	echo '<br><a href="login.php" class="att" >Back</a><br><br>';
 ?>
	
</body></html>
