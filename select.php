<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>select</title>
</head>
<body>
	<table border="1" cellpadding="0" cellspacing="0" align="center">
		<tr>
			<th>ID</th>
			<th>Fname</th>
			<th>Lname</th>
			<th>City</th>
			<th>Email</th>
			<th>Photo</th>
			<th>Delete</th>
			<th>Edit</th>
		</tr>
<?php
include_once("conn.php");

$sql = "SELECT * FROM other";
$result = mysqli_query($conn,$sql);
//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$no=1;
while($row = $result->fetch_assoc()) 
        { ?>
       <tr>
       	<td><?= $no?></td>
       <td><?= $row['fname'] ?></td>
       <td><?= $row['lname'] ?></td>
       <td><?= $row['city'] ?></td>
       <td><?= $row['email'] ?></td>
       <td><img src="img/<?= $row['photo'] ?>" height=50 weight=50 ></td>
       <td><a href='select.php?deleteid=<?= $row['id']?>'>Delete</a></td>
       <td><a href='updateform.php?editid=<?= $row['id']?>'>Edit</a></td>
       </tr>
          
     <?php $no++;  } ?>
        
</table>

</body>
</html>


<?php
if(isset($_REQUEST['deleteid'])) {
$delete = $_REQUEST['deleteid'];
$sql = "DELETE FROM other WHERE id=$delete";
$result = mysqli_query($conn,$sql) or die("Query failed");
header("location:select.php");
}