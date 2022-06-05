<?php

include_once("conn.php");
	$id = $_REQUEST['id'];
	$fname=$_REQUEST['fname'];
	$lname=$_REQUEST['lname'];
	$city=$_REQUEST['city'];
	$email=$_REQUEST['email'];
	$photo = $_FILES['photo']['name'];
$r = getdate();
$s = $r[0];
$c = $s.$photo;
if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
	move_uploaded_file($_FILES['photo']['tmp_name'],"img/".$c);
}
	$sql = "UPDATE other SET fname='$fname',lname='$lname',city='$city', email='$email',photo='$c' WHERE id=$id";
	if (mysqli_query($conn,$sql)) {
		echo "Data Updated";
		header("Location: select.php");
	}else {
		 echo mysql_error();
	}

?>