<?php session_start()
 ?>
<?php include 'conn.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">
	table{
		width:80%;
		margin-left:10%;
		 font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
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
th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #008080;
  color: white;
  padding-left:5%;
}
	
</style>
<body>
<div><br><br></div>

</body>
</html>


<?php
$techid=$_SESSION['Teacher_ID'];
$se=$_SESSION['Email'];
//array to store students who are present
$array= array();
//session array so they can send to next page
$_SESSION['select']=array();

//query to display students
$query="SELECT * FROM Student";
$result=mysqli_query($con, $query);
?>
<form >
	<?php

	echo '<table border="1">';
	echo '<tr><th > ADD STUDENTS TO YOUR LIST</tr>';


while($row = mysqli_fetch_array($result)){

	//printing student names to add by teachers
	echo '<tr><td><a href="addstu.php?cid='.$row['Student_ID'].'"><i class="fa fa-plus-square" style="font-size:24px; color: #008080; padding-right:10px; padding-left:3px;"></a></i>'.$row['username'].'</td></tr>';
	

}
echo '</table>';
	//go back to teacher page
	echo '<br><a href="Teacher.php" class="att">DONE</a>';


?>


