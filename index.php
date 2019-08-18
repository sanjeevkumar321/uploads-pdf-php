<?php
//include "dbconnect.php";
$con=mysqli_connect("localhost","root","","dj");
if(isset($_POST["submit"])){
$text=$_POST['text'];
$allow= array('pdf');
$temp = explode(".", $_FILES['pdf_file']['name']);
$extension = end($temp);
$upload_file=$_FILES['pdf_file']['name'];
move_uploaded_file($_FILES['pdf_file']['tmp_name'],"uploads/pdf/" . $_FILES['pdf_file']['name']);
$sql=mysqli_query($con,"INSERT INTO `pdf`(`text`,`pdf_file`)VALUES('$text',' ".$upload_file."')");
if($sql){
	echo "Data Submit Successful";
}
else{
	echo "Data Submit Error!!";
   }
}
?>




<!DOCTYPE html>
<html>
<head>
	<title>
		uplord
	</title>
</head>
<body>
<form method="post"  enctype="multipart/form-data"> 
	<input type="file" name="pdf_file" id="pdf_file" accept="application/pdf" />

	<input type="text" name="text">

	<button id="send" type="submit" name="submit" class="btn btn-success">Submit</button>
</form>
</body>
</html>