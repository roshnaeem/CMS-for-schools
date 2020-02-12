<?php include 'conn.php' ?>
<?php


	if(isset($_GET["cid"])){
		$comment1=$_GET['c1'];
		//query to replace new comments
		$sql= "UPDATE Comments SET comment='$comment1' WHERE Comment_ID =".$_REQUEST['cid'] ;
		
	
		    if (mysqli_query($con, $sql)){
		    	//after adding return to teacher page
		        header("Location: Teacher.php");
		        die();
		    }
		}


	if(isset($_GET["skid"])){
		$skill1=$_GET['sk1'];
		//query to replace new skills
		$sql= "UPDATE Skills SET skill='$skill1' WHERE Skill_ID =".$_REQUEST['skid'] ;
	
		    if (mysqli_query($con, $sql)){
		    	//after adding return to teacher page
		        header("Location: Teacher.php");
		        die();
		    }
		}


	if(isset($_GET["scoreid"])){
		$score1=$_GET['score1'];
		//query to replace new scores 
		$sql= "UPDATE Scores SET score='$score1' WHERE Score_ID =".$_REQUEST['scoreid'] ;
	
		    if (mysqli_query($con, $sql)){
		    	//after adding return to teacher page
		        header("Location: Teacher.php");
		        die();
		    }
		}
	



			?>