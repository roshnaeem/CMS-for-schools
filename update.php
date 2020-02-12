
<?php include 'conn.php' ?><?php	

if(isset($_GET["cid"])){


if(isset($_GET["sid"])){
	//for adding new data
		echo '<form action="add.php">

	<input type="hidden" name="sid" value='.$_GET["sid"].'>
	<input type="hidden" name="cid" value='.$_GET["cid"].'>
	<h1>Comment:</h1> <input type="text" name="c1">
	<button type="submit"  class="signupbtn"> Submit </button>
	</form>';
}
else{
		//for editing current data
echo '<form action="edit.php">
	<input type="hidden" name="cid" value='.$_GET["cid"].'>
	<h1>Comment:</h1> <input type="text" name="c1" value='.$_GET["c1"].'>
	<button type="submit"  class="signupbtn"> Submit </button>
	</form>';

}

}

if(isset($_GET["skid"])){

if(isset($_GET["sid"])){
	//for adding new data
		echo '<form action="add.php">
	<input type="hidden" name="sid" value='.$_GET["sid"].'>
	<input type="hidden" name="skid" value='.$_GET["skid"].'>
	<h1>Skill: </h1> <input type="text" name="sk1">
	<button type="submit"  class="signupbtn"> Submit </button>
	</form>';
}
else{
	//for editing current data
echo '<form action="edit.php">
	<input type="hidden" name="skid" value='.$_GET["skid"].'>
	<h1>Skill: </h1> <input type="text" name="sk1" value='.$_GET["sk1"].'>
	<button type="submit"  class="signupbtn"> Submit </button>
	</form>';
}

}
if(isset($_GET["scoreid"])){

if(isset($_GET["sid"])){
	//for adding new data
		echo '<form action="add.php">
	<input type="hidden" name="sid" value='.$_GET["sid"].'>
	<input type="hidden" name="scoreid" value='.$_GET["scoreid"].'>
	<h1>Score: </h1> <input type="text" name="score1">
	<button type="submit"  class="signupbtn"> Submit </button>
	</form>';
}
else{
	//for editing current data
echo '<form action="edit.php">
	<input type="hidden" name="scoreid" value='.$_GET["scoreid"].'>
	<h1>Score: </h1> <input type="text" name="score1" value='.$_GET["score1"].'>
	<button type="submit"  class="signupbtn"> Submit </button>
	</form>';
}

}






?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		

body{
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
}
* {box-sizing: border-box;}
input[type=text]{
  width: 80%;
  border-radius: 5px;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
.signupbtn {
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
.signupbtn:hover{
	background-color:#008080;
  color: white;
}


	</style>
	</head>
	<body></body></html>