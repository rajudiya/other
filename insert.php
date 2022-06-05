<?php
include_once("conn.php");
$nm = $_POST['fname'];
$lnm = $_POST['lname'];
$city = $_POST['city'];
$email = $_POST['email'];
$photo = $_FILES['photo']['name'];
$r = getdate();
$s = $r[0];
$c = $s.$photo;
if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
	move_uploaded_file($_FILES['photo']['tmp_name'],"img/".$c);
}

$sql = "SELECT id from other";
$result = mysqli_query($conn,$sql) or die('SQL Query Failed');
if (mysqli_num_rows($result) == 0) {
		mysqli_query($conn,"ALTER TABLE other AUTO_INCREMENT = 1");
		
}
	$con ="INSERT INTO other(id,fname,lname,city,email,photo) VALUES (null,'$nm', '$lnm','$city','$email','$c')";
	if (mysqli_query($conn, $con)) {
		echo "data inserted succesfully";
		header("location:form.php");
	} else {
		echo "not inserted";
	}

?>

<?php
header("location:index.html");
?>