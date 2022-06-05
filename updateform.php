<?php
	include_once("conn.php");

if (isset($_REQUEST['editid'])) {
$update = $_REQUEST['editid'];
$sql = "SELECT * FROM other WHERE id=$update";
$result = mysqli_query($conn,$sql) or die("Query failed");
$row = mysqli_fetch_array($result);
} 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form</title>
</head>
<body>
	<form action="update.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $row['id']?>" /><br>
	first name<input type="text" name="fname" value="<?= $row['fname']?>" /><br>
	last name<input type="text" name="lname" value="<?= $row['lname']?>"/><br />
	City<input type="text" name="city" value="<?= $row['city']?>"/><br />
	Email<input type="email" name="email" value="<?= $row['email']?>"/><br />
	Photo<input type="file" name="photo"/><br />
	<button value="submit" name="submit">update</button>
	</form>
</body>
</html>