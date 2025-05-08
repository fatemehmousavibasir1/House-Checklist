<?php
// database connection code
// $con = mysqli_connect('localhost', 'root', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','checklist');
mysqli_select_db($con,'checklist');
// get the post records
$name = $_POST['name'];
$username = $_POST['username'];
$phone = $_POST['phone'];
$password = $_POST['password'];

// database insert SQL code
$sql = "INSERT INTO 'user' ('User_ID', 'username', 'name', 'phone', 'password','Role_ID') VALUES ('1', '$username', '$name', '$phone', '$password','1')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
}

?>