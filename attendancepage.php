<?php session_start()
 ?>
 <?php include 'conn.php' ?>
<?php
	
	
	$count=1;
	$d= date("Y/m/d");
	echo "<h1>Date: $d</h1>";
	$teche=$_SESSION['Email'];
	

	$sql="SELECT Student_ID from TeacherStudent where '$teche' =Email";
	$res=mysqli_query($con, $sql);



		echo '<table border="1" >';
		echo '<tr><th>Serial No</th><th colspan="2">Student username </th> <th>Mark Attendance</th></tr>';
	while($row = mysqli_fetch_array($res)){

		$r= $row['Student_ID'];
		
	

		//select students that are added by teacher 
	$query="SELECT * FROM Student where '$r'= Student_ID";
	

	$result=mysqli_query($con, $query);
	$rows= mysqli_num_rows($result);	
	
	
	
	//loop will run the number oftimes equal to the number students in student table 
	while($row = mysqli_fetch_array($result)){
		$sid=$row['Student_ID'];
		$sun=$row['username'];
		
		
		//printing student available to mark them absent or present
		echo '<tr><td style="width:10%;">'.$count.'</td><td colspan="2" style="width:40%;" >'.$row['username'].'</td><td style="width:10%;"><input  type="checkbox" name="attreg" value='.$row['Student_ID'].' /><i class="fa fa-check-circle" style="font-size:24px; display:none;"></i>';
		
		echo '</td></tr><br>';
		
		$count++;
		
	}

}
	echo '</table>';
 echo '<br><br><a href="Teacher.php" class="att" >Back</a>';
  echo '<br><br><br><a href="editattendance.php?d='.$d.'" class="att"  >Edit attendance</a>';


	?>

	
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style type="text/css">

		

* {box-sizing: border-box;}

table{
	 font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width:80%;
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
	

	<script type="text/javascript">
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
            	//extracting student value whose checkbox is checked
                var x= $(this).val();

                //student id to send to attendance page
                $.post("attendanceyes.php", {'value':x},function(data, status){
   
  });

            }
            else if($(this).prop("checked") == false){
            	//extracting student value whose checkbox is checked
                 var x= $(this).val();
                 //student id to send to absent page
                $.post("attendancenot.php", {'value':x},function(data, status){
  
  });
            }
        });
    });
</script>

	

</body>
</html>
