<?php session_start()
 ?>
 <?php include 'conn.php' ?>
<?php

if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];
	$login=$_SERVER['HTTP_REFERER'];

	//Student login
	
  //query to check if student exsits in data or not
	$query="SELECT * FROM Student  WHERE Email=\"$email\" and Password=\"$password\" ";
	
	$result=mysqli_query($con, $query);
	$rows= mysqli_num_rows($result);
	
	if($rows!=0){
     //select email for creating session
       $query1s= "SELECT Student_ID, Email FROM Student where '$email'= Email" ;
       $result1s=mysqli_query($con, $query1s);
       while($row1s = mysqli_fetch_array($result1s)){
        //session so student can see his data only
            $s_id=$row1s['Student_ID'];
            $_SESSION['Student_ID'] = $s_id;
                  }
           header("location:student.php");
	        }
	else{
		//Teacher login
    //query to check if teacher exsits in data or not
      	$query1="SELECT * FROM Teacher  WHERE Email=\"$email\" and Password=\"$password\" ";
      	$resultTeacher=mysqli_query($con, $query1);
      	$rowsTeacher= mysqli_num_rows($resultTeacher);
     
	
	if($rowsTeacher!=0){
    //select email for creating session

		    $queryt= "SELECT Email, Teacher_ID FROM Teacher where '$email'= Email" ;
       $resultt=mysqli_query($con, $queryt);
       while($rowt = mysqli_fetch_array($resultt)){
      
        //session so teacher can see his students only
            $t_id=$rowt['Teacher_ID'];
            $_SESSION['Teacher_ID'] = $t_id;
            $t_e=$rowt['Email'];
            $_SESSION['Email'] = $t_e;
           
                     }
		       header("location:Teacher.php");
      	       }
    else{
        		echo "You are not signed up or your password is incorrect";
        }
  }

	

}

 ?>
<!DOCTYPE html>
<html>
<head>
<title>login</title>
<style type="text/css">
		

* {box-sizing: border-box;}
/* Full-width input fields */
input[type=email], input[type=password] {
  width: 60%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: white;
  color: black;
  border: 2px solid #008080;
  padding: 14px 20px;
  margin: 8px 0;
 
  cursor: pointer;
  width: 60%;
}
button:hover {
  background-color:#008080;
  color: white;
}

.container {
  padding: 16px;
}
img.avatar {
  width: 20%;

  border-radius: 50%;
}
/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}
/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  width: 80%; /* Could be more or less, depending on screen size */
}
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

	</style>
</head>
<body>
<center>
	<form class="modal-content animate" action="login.php" method="post">
    <div class="imgcontainer">
      
      <img src="https://image.flaticon.com/icons/png/512/306/306473.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Email</b></label><br>
      <input type="email" placeholder="Enter Email" name="email" required><br>

      <label for="psw"><b>Password</b></label><br>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit" name="submit">Login</button>
     
    </div>

   
    </div>
  </form>
</center>
</body>
</html>