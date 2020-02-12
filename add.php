<?php include 'conn.php' ?>
<?php


if(isset($_GET["skid"])){
$newskill=$_GET['sk1'];
$studentid=$_GET['sid'];
//add skill to skills table
$sql= "INSERT INTO Skills(Skill, Student_ID) Values ('$newskill','$studentid') ";

  if (mysqli_query($con, $sql)){
  	//after adding return to teacher page
		        header("Location: Teacher.php");
		        die();
		    }
	
}


if(isset($_GET["scoreid"])){
$newscore=$_GET['score1'];
$studentid=$_GET['sid'];
//add scores to score table
$sql= "INSERT INTO Scores(Score, Student_ID) Values ('$newscore','$studentid') ";

  if (mysqli_query($con, $sql)){
  	//after adding return to teacher page
		        header("Location: Teacher.php");
		        die();
		    }
	
}


if(isset($_GET["cid"])){
$newcomment=$_GET['c1'];
$studentid=$_GET['sid'];
//add comments to comment table
$sql= "INSERT INTO Comments(comment, Student_ID) Values ('$newcomment','$studentid') ";

  if (mysqli_query($con, $sql)){
  	//after adding return to teacher page
		        header("Location: Teacher.php");
		        die();
		    }
	
}



?>