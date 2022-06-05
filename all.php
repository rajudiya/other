<?php
/**
 * Connection with database
 */
$conn = mysqli_connect("localhost", "rohan", "rohan14", "rohan") or die("Connection fail");
if (isset($_GET['uId'])) {
	$id=$_GET['uId'];
	$sql = "SELECT * FROM first WHERE id=$id";
	$result1 = mysqli_query($conn,$sql);
	$row1 = $result1->fetch_assoc();
}
if(isset($_GET['dId']))
{
	$id=$_GET['dId'];
	mysqli_query($conn,"DELETE FROM first WHERE id=$id");
	header('location:all.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form</title>
	<script type="text/javascript" src="1jquery.js"></script>
	</script>
<script>
$(document).ready(function(){
  $("#submit").click(function(){
    $("form").hide();
  });
  $("#update").click(function(){
    $("form").show();
  });
});
</script>
</head>
<body>
	<form action="" method="post" id="form" >
	<input type="hidden" name="id" value="<?= $row1['id']?>"/>
	First Name<input type="text" name="fnm" value="<?= $row1['fname']?>"  required /><br>
	Last Name<input type="text" name="lnm" value="<?= $row1['lname']?>" required /><br />
	Email<input type="email" name="email" value="<?= $row1['email']?>" required /><br />
	Photo<input type="file" name="photo"/><br />
	<input type="submit" value="submit" onclick="hide()" id="submit" name="Submit" />
	<input type="button" value="update" id="update" name="Update" />
	 <input type="button" value="Go back!" onclick="history.back()"/>
	</form>
</body>
</html>

<table border="1" cellpadding="0" cellspacing="0">
		<tr>
			<th>Id</th>
			<th>Fname</th>
			<th>Lname</th>
			<th>Email</th>
			<th>Photo</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
<?php
/**
 * @var $sql Fatch all data in the table
 * @return Table Data
 */ 

$sql = "SELECT * FROM first";
$result = mysqli_query($conn,$sql);
$no=1;
while($row = $result->fetch_assoc()) { ?>
      <tr>
      	<td><?= $no ?></td>
      	<td><?= $row['fname'] ?></td>
      	<td><?= $row['lname'] ?></td>
      	<td><?= $row['email'] ?></td>
      	<td><img src="img/<?= $row['photo'] ?>" height=50 weight=50 ></td>
      	<td><a href="all.php?uId=<?php echo $row['id']?>">Edit</a></td>
      	<td><a href="all.php?dId=<?php echo $row['id']?>">Delete</a></td>
      </tr>    
<?php $no++; } ?>
<?php
/**
 * Insert Value in Database With chaking database is not empty 
 * @return null
 */
if (!isset($_POST)) {
	header("Location: all.php");
die();
}
echo $nm = $_POST['fnm'];
echo $lnm = $_POST['lnm'];
echo $email = $_POST['email'];
echo $photo = $_FILES['photo']['name'];
die();
$r = getdate();
$s = $r[0];
$c = $s.$photo;
/*$extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
	$imgnewfile=md5($imgfile).time().$extension;
	move_uploaded_file($_FILES["profilepic"]["tmp_name"],"profilepics/".$imgnewfile);
*/
if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
	move_uploaded_file($_FILES['photo']['tmp_name'],"img/".$c);
}
$sql1 = "SELECT id from first";
$result = mysqli_query($conn,$sql1) or die('SQL Query Failed');
if (mysqli_num_rows($result) == 0) {
	mysqli_query($conn,"ALTER TABLE first AUTO_INCREMENT = 1");	
	}
	$select = mysqli_query($conn, "SELECT * FROM first WHERE email = '".$_POST['email']."'");
	if(mysqli_num_rows($select)) {
	    exit($email.'<= This email address is already used!'.'<br />');
	}
	if (empty($nm) || empty($lnm) || empty($email)) {
		exit();
	}

	$con ="INSERT INTO first(id,fname,lname,email,photo) VALUES (null,'$nm', '$lnm','$email','$c')";
	if (mysqli_query($conn, $con)) { 
		header("Location: all.php");
		die();
		}
?>

</table>

<?php
if (isset($_REQUEST['Update'])) {
	$id = $_REQUEST['id'];
	$fname=$_REQUEST['nm'];
	$lname=$_REQUEST['lnm'];
	$email=$_REQUEST['email'];
	$sql = "UPDATE first SET fname='$fname',lname='$lname', email='$email' WHERE id=$id";
	if (mysqli_query($conn,$sql)) {
		echo "Data Updated";
		header("Location: all.php");
	}else {
		 echo mysql_error();
	}
}


?>

