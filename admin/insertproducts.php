<?php

 $host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

$name = $_POST['name'];
$nameg = $_POST['nameg'];
$namep = $_POST['namep'];

$i=0;
$array_values="";
if (isset($_POST["input_array_name"]) && is_array($_POST["input_array_name"])){ 
	$input_array_name = array_filter($_POST["input_array_name"]); 
    foreach($input_array_name as $field_value){
        $array_values .= $field_value."<br />";
        $arrpr[$i]=$field_value;
    ++$i;
    }
}
echo $namep;
$s=0;

if (isset($_POST["update"])){

    $sql2="SELECT max(Product_ID) AS a FROM product";
$result=mysqli_query($con, $sql2);
if ($result->num_rows > 0) {        
    while ($row = $result->fetch_assoc()) {
        $idproduct = $row['a'];
 
    } }

$sqlinsertprop="INSERT INTO `product` VALUES ($idproduct+1,'$name',$nameg)";
mysqli_query($con, $sqlinsertprop);
$sql2="SELECT max(Product_ID) AS a FROM product";
$result=mysqli_query($con, $sql2);
if ($result->num_rows > 0) {        
    while ($row = $result->fetch_assoc()) {
        $idproduct = $row['a'];
 
    } }


$sql2="SELECT max(properties_ID) AS a FROM properties";
$results=mysqli_query($con, $sql2);
if ($results->num_rows > 0) {        
    while ($row2 = $results->fetch_assoc()) {
        $idpropertis = $row2['a'];
 
    } }


while($s<$i){

 $sqlinsertname="INSERT INTO `properties` VALUES ('','$arrpr[$s]')";   
 mysqli_query($con, $sqlinsertname);
 ++$s;

}

$d=0;
++$idpropertis;

while ($d<$i) {        
    $sql3="INSERT INTO `name` VALUES ('', $idproduct, '$idpropertis')";
    $resultsql2=mysqli_query($con, $sql3);
 ++$d;
 ++$idpropertis;
}


}
header("Location: http://localhost/educativeform/admin/product.php");

