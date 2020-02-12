<?php session_start()
 ?>
 <?php include 'conn.php' ?>
 <?php
 		
 		if(isset($_GET["s1"])){

		if(isset($_GET["cd"])){
			
			$date= $_GET["cd"];
			$sid= $_GET["s1"];

			$sql= "DELETE FROM `AttendanceTable` Where '$sid'=Student_ID and '$date'=Attendancedate";
			if(mysqli_query($con, $sql)){
				echo "<h1>Unmarked</h1>";
				
			}
			else{
				echo("Error description: " . mysqli_error($con));
			}

			}}
			echo '<br><br><a href="editattendance.php?d='.$date.'" class="att" >Back</a>';

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 		
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