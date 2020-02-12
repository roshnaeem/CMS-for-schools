<?php session_start()
 ?>
 <?php include 'conn.php' ?>
<?php

	
	
	$teche=$_SESSION['Email'];
	
	
	//link to go to attendance page
	 echo '<a href="attendancepage.php" class="att" >Attendance page</a><br><br>';

	$sql="SELECT Student_ID from TeacherStudent where '$teche' =Email";
	$res=mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($res)){
		$r= $row['Student_ID'];
		
	

		//select students that are added by teacher 
	$query="SELECT * FROM Student where '$r'= Student_ID";
	

	$result=mysqli_query($con, $query);
	$rows= mysqli_num_rows($result);
	
	
	
	while($row = mysqli_fetch_array($result)){
		$sid=$row['Student_ID'];
		
		echo '<table border="1" >';
		//row 1
		echo '<tr><td ><img src="https://image.flaticon.com/icons/png/512/306/306473.png" style="width:60%; height:20%;"></td><td colspan="3" ><h1>'.$row['Email'].'</h1></td>';
			//row 2
		echo '</tr><tr><th colspan="2">Comments</th><th>Skill</th><th>Score</th>';

		//echo $Attendance;
		//query for comments
		$cquery= "SELECT comment, Comment_ID FROM Comments where '$sid'=Student_ID ";
		$cresult=mysqli_query($con, $cquery);
		//row 3
		echo '<tr><td colspan="2">';
		while($crow = mysqli_fetch_array($cresult)){
			$c1=$crow['comment'];
			
			echo '<i class="fa fa-comment" style="font-size:15px;color:black; padding-right:2%"></i>'.$crow['comment'].'<a href="Delete.php?cid='.$crow['Comment_ID'].'"><i class="fa fa-trash-o" style="font-size:24px;color:#008080;float:right; padding-left:1%"></a></i>'."\t".
				'<a href="update.php?cid='.$crow['Comment_ID'].'&c1='.$c1.'"><i class="fa fa-edit" style="font-size:24px; color:#008080; float:right;"></a></i><br>';
		}

			echo '</td><td>';
			//query for skills
		$skquery= "SELECT Skill, Skill_ID FROM Skills where '$sid'=Student_ID ";
		$skresult=mysqli_query($con, $skquery);
		while($skrow = mysqli_fetch_array($skresult)){
			$sk1=$skrow['Skill'];
			echo $skrow['Skill'].'<a href="Delete.php?skid='.$skrow['Skill_ID'].'"><i class="fa fa-trash-o" style="font-size:24px;color:#008080;float:right; padding-left:1%"></a></i>'."\t".
			'<a href="update.php?skid='.$skrow['Skill_ID'].'&sk1='.$sk1.'"><i class="fa fa-edit" style="font-size:24px; color:#008080; float:right;"></a></i><br>';
		}
			echo '</td><td>';
			//query for scores
		$scorequery= "SELECT Score, Score_ID FROM Scores where '$sid'=Student_ID ";
		$scoreresult=mysqli_query($con, $scorequery);
		while($scorerow = mysqli_fetch_array($scoreresult)){
			$score1=$scorerow['Score'];
			echo $scorerow['Score'].'<a href="Delete.php?scoreid='.$scorerow['Score_ID'].'"><i class="fa fa-trash-o" style="font-size:24px;color:#008080;float:right; padding-left:1%"></a></i>'."\t".
			'<a href="update.php?scoreid='.$scorerow['Score_ID'].'&score1='.$score1.'"><i class="fa fa-edit" style="font-size:24px; color:#008080; float:right;"></a></i><br>';
		}
		//row 4
		echo '</td></tr><tr>
			<td colspan="2">

			 <a href="update.php?cid='.$crow['Comment_ID'].'&sid='.$sid.'"><i class="fa fa-plus-square" style="font-size:24px; color:#008080;"></a></i></td>
			<td>

		    <a href="update.php?skid='.$skrow['Skill_ID'].'&sid='.$sid.'"><i class="fa fa-plus-square" style="font-size:24px; color:#008080;"></a></i></td>
		    <td>
		    
		    <a href="update.php?scoreid='.$scorerow['Score_ID'].'&sid='.$sid.'">
		    <i class="fa fa-plus-square" style=" color:#008080;font-size:24px"></a></i></td></tr><br>';
		echo '</table>';

	}
}

echo '<br><br><a href="login.php" class="att" >Back</a><br><br>';


 ?>
<!DOCTYPE html>
<html>
<head>
<title>Teacher</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">

		
body{
	
}
* {box-sizing: border-box;}

img.avatar {
  width: 40%;
  border-radius: 50%;
}
table{
	 font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width:80%;
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

td{
	width:25%;
}

tr:hover {background-color: #ddd;}

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
	<form>
		<table border="1">
	

		</table>
		
	</form>



	
</body></html>