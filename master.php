<?php
include('server.php');

	//fetch id
	if(isset($_GET['update'])){
		$id=$_GET['update'];
		$rec=mysqli_query($con,"SELECT * FROM test WHERE sid=$id");
		$record=mysqli_fetch_array($rec);
		$name=$record['name'];
		$adress=$record['adress'];
		$city=$record['city'];
		$id=$record['sid'];


	}
?>

<!doctype html>
<html>

<body>


	<form action="#" method="get">
		<input type="hidden" name="id" value="<?= $id; ?>">
		<label>Name</label>
		<input type="text" name="name" value="<?= $name; ?>" required />
		<label>Address</label>
		<input type="text" name="adress" value="<?= $adress; ?>" required />
		<label>City</label>
		<input type="text" name="city" value="<?= $city; ?>" required />

		<?php if($up == false): ?>
			<input type="submit" value="click" />
		<?php else:?>
			<input type="submit" value="Update" />
		<?php endif;?>
		
	</form>
	<form action="#">
		<table border="2" align="center">
		<thead>
			<tr>
				<th>NAME</th>
				<th>address</th>
				<th>city</th>
				<th>delete</th>
				<th>Update</th>
			</tr>
     	</thead>
     	<tbody>
     		<?php while ($row=mysqli_fetch_array($qry)) {?>
     		<tr>
     			<td><?= $row['name']?></td>
     			<td><?= $row['adress']?></td>
     			<td><?= $row['city']?></td>
     			<td><a href="master.php?update=<?= $row=['id']; ?>">Update</a></td>
     			<td><a href="#">Delete</a></td>
			</tr>
     		<?php}?>


     	</tbody>
     	</table>
	</form>
	
</body>
</html>
