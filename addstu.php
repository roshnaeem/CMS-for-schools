<?php session_start()

 ?>
<?php include 'conn.php' ?>
<?php	
$se=$_SESSION['Email'];



echo '<br>';
$var[]= $_SESSION['select'];


if(isset($_GET["cid"])){

	

	$val=$_GET['cid'];
	array_push($var, $val);
	$student=$var[1];
	
	//query to check if student is already added by teacher
	$query= "SELECT * FROM TeacherStudent where Student_ID=".$student;
	 $result=mysqli_query($con, $query);
	 $row = mysqli_fetch_array($result);
	 $rowcount=mysqli_num_rows($result);
      if($rowcount>0){
      	echo '<h1>ERROR : Already Added by Teacher '.$row['Email'].' </h1>';
      }

	else{
		
	//add student to teacherstudent table who are added by teacher
	$sql= "INSERT INTO TeacherStudent(Email,Student_ID) values('$se','$student') ";
	
        if (mysqli_query($con, $sql)){
        	header("Location: addstudent.php");
        	
        }
        die();
    }

	
		       
	}	    
		    ?>
		    <!DOCTYPE html>
		    <html>
		    <head>
		    	<title></title>
		    	<style type="text/css">
		    		h1{
							padding-top: 12px;
						  padding-bottom: 12px;
						  text-align: left;
						  
						  background-color: #008080;
						  color: white;
						  padding-left:5%;
						  margin-left:5%;
						}
		    	</style>
		    </head>
		    <body>
		    
		    </body>
		    </html>