<?php include 'conn.php' ?>
<?php	

	//query to select students
	$query="SELECT * FROM Student";
	$result=mysqli_query($con, $query);
	$count=1;
	
	//loop will run the number of students in student table times
	while($row = mysqli_fetch_array($result)){
		$sid=$row['Student_ID'];
		$sun=$row['username'];
		
		echo '<table border="1" >';
		//printing student available to mark them absent or present
		echo '<tr><td>'.$count.'</td><td colspan="2" >'.$row['username'].'</td><td><input  type="checkbox" name="attreg" value='.$row['Student_ID'].' />
		<td>'.$row['Student_ID'].'</td>';
		
		echo '</td></tr><br>';
		echo '</table>';
		$count++;
	}


	?>

	
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style type="text/css">

		

* {box-sizing: border-box;}
table{
	width:80%;
}
td{
	width:20%;
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
                $.post("attendancee.php", {'value':x},function(data, status){
   
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
