<?php

$name="";
$adress="";
$city="";
$id="";
$up=false;
$con=mysqli_connect("localhost","rohan","rohan14","rohan") or die("can not connect") ;

if(isset($_POST['click'])){
	$name=$_POST['name'];
	$adress=$_POST['adress'];
	$city=$_POST['city'];
	mysqli_query($con,"INSERT INTO test(sid,name,adress,city) VALUES (NULL,'$name','$adress','$city')") or die("query can not perform");
	header('location:master.php');

}

if(isset($_POST['Update'])){
	$name=$_POST['name'];
	$adress=$_POST['adress'];
	$city=$_POST['city'];
	$id=$_POST['sid'];
	mysqli_query($con,"INSERT INTO test(sid,name,adress,city) VALUES (NULL,'$name','$adress','$city')") or die("query can not perform");
	header('location:master.php');

}

$qry=mysqli_query($con,"SELECT * FROM test");




?>
