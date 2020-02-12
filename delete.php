<?php include 'conn.php' ?>
<?php
	
	if(isset($_GET["cid"])){
    $Comment_id=$_GET["cid"];
    //$id=$_GET["Comment_ID"];

	

	 $sql = "DELETE FROM Comments WHERE Comment_ID=".$Comment_id;
    if (mysqli_query($con, $sql)){
        header("Location: Teacher.php");
        die();
    }
}


if(isset($_GET["skid"])){
    $skill_id=$_GET["skid"];
    
	
	 $sql = "DELETE FROM Skills WHERE Skill_ID=".$skill_id;
    if (mysqli_query($con, $sql)){
        header("Location: Teacher.php");
        die();
    }
}



if(isset($_GET["scoreid"])){
    $score_id=$_GET["scoreid"];
    
    
     $sql = "DELETE FROM Scores WHERE Score_ID=".$score_id;
    if (mysqli_query($con, $sql)){
        header("Location: Teacher.php");
        die();
    }
}


  ?>