<?php session_start()
 ?>
 <?php include 'conn.php' ?>
<?php
	function newStudent(){
	global $con;
		$Email=$_POST['email'];
		$Password=$_POST['password'];
		$Password=$_POST['confirmpassword'];
    $UserName=$_POST['username'];
		//query to enter new student data in database
		$query= "INSERT INTO `Student`(Email,Password,username) VALUES ('$Email','$Password','$UserName')";

		if ($_POST["password"] === $_POST["confirmpassword"]) {
			

		$data= mysqli_query($con,$query);
		if($data){


      //query to set session
       $query= "SELECT Student_ID FROM Student where '$Email'= Email" ;
       $result=mysqli_query($con, $query);
       while($row = mysqli_fetch_array($result)){
        //set session so student can see his record only at next page
            $s_id=$row['Student_ID'];
            $_SESSION['Student_ID'] = $s_id;
          }
			     header("location:student.php");
			
		    	}
				else{
					echo "Report Error to developer!";
				}
         }
      	else{
      			echo ' Your password does not match.';
      		}
	}
	function newTeacher(){
	 global $con;
		$Email=$_POST['email'];
		$Password=$_POST['password'];
		$Password=$_POST['confirmpassword'];
		//query to enter new teacher data in database
		$query= "INSERT INTO `Teacher`(Email,Password) VALUES ('$Email','$Password')";

		if ($_POST["password"] === $_POST["confirmpassword"]) {
			
		$con = new mysqli("localhost", "root", "", "techdb");
		

		$data= mysqli_query($con,$query);
		if($data){
      //query to set session
       $query= "SELECT Teacher_ID, Email FROM Teacher where '$Email'= Email" ;
       $result=mysqli_query($con, $query);
       while($row = mysqli_fetch_array($result)){

          //set session so teacher can see only his students at next page
            $t_id=$row['Teacher_ID'];
            $_SESSION['Teacher_ID'] = $t_id;
            $t_e=$row['Email'];
            $_SESSION['Email'] = $t_e;
           
          }

			 header("location:addstudent.php");
			
			}
				else{
					echo "Report Error to developer!";
				}
				 }
	else{
			echo ' Your password does not match.';
		}
	}

	 function signupStudent(){
	 	
	 	global $con;
	 		//query to check email 
	 		$query1= "SELECT * FROM `Student` WHERE  Email='$_POST[email] '";
	 		$query= mysqli_query($con, $query1);


	 		//query to fetch data
	 		if(!$row= mysqli_fetch_array($query,MYSQLI_ASSOC)){
	 			newStudent();
	 		}
	 		else{
	 			echo "Email is already registered";
	 		}
	 	
	 }
	 function signupTeacher(){
	 	
	 	 global $con;
	 
	 		//query to check email 
	 		$query1= "SELECT * FROM `Teacher` WHERE Email='$_POST[email] '";
	 		$query= mysqli_query($con, $query1);


	 		//query to fetch data
	 		if(!$row= mysqli_fetch_array($query,MYSQLI_ASSOC)){
	 			newTeacher();
	 		}
	 		else{
	 			echo "Email is already registered";
	 		}
	 	
	 }
	 if(isset($_POST['submitaction']))
	{
	    signupStudent();
	    
	}
	 if(isset($_POST['submit']))
	{
		 signupTeacher();
	}


	
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>

<style>
* {box-sizing: border-box;
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}	


h2{
	font-size:50px;
	color:#008080;
}
/* Full-width input fields */
input[type=text], input[type=password],input[type=email] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */

button {
 background-color: white;
  color: black;
  border: 2px solid #008080;
  font-size: 20px;
  padding: 14px 20px;
  margin: 8px 0;
  
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  background-color:#008080;
  color: white;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
 
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
 background-color: white;
  color: black;
  border: 2px solid #008080;
  float: left;
  width: 50%;
}

 .signupbtn:hover{
   background-color:#008080;
  color: white;
}
 .cancelbtn:hover{
   background-color:#008080;
  color: white;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>
<center>
<h2> Signup</h2>
<?php include 'conn.php' ?>

<button class="this"onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up as Student</button>

<button  class="this" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Sign Up as Teacher</button>
<!-- separate form for student -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="signup.php" method="post">
    <div class="container">
    	<h1>Student Form</h1>
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>Student Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>
      <label for="username"><b>Student user name</b></label>
      <input type="text" placeholder="Enter User Name" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <label for="psw-repeat"><b>Confirm Password</b></label>
      <input type="password" placeholder="Confirm Password"  name="confirmpassword" required>
      
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" name="submitaction" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>

<!-- separate form for teacher -->
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="signup.php" method="post">
    <div class="container">
    	<h1>Teacher Form</h1>
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>Teacher Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <label for="psw-repeat"><b>Confirm Password</b></label>
      <input type="password" placeholder="Confirm Password"  name="confirmpassword" required>
      
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" name="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>
</center>
<script>
// Get the modal
var modal = document.getElementById('id01');
var modal2 = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal || event.target == modal2) {
    modal.style.display = "none";
  }
}
</script>



</body>
</html>