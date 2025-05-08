<pre><?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
$username = $_POST['usernamel'];
$password = $_POST['passwordl'];

$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";


$con = mysqli_connect($host, $username1, $password1, $dbname);

$sql= "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
$result = mysqli_query($con,$sql);
$check = mysqli_fetch_array($result);
$sql1= "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
$result1 = mysqli_query($con,$sql);
if(isset($check)){
    if ($result1->num_rows > 0) {
       
        while($row2 = $result1->fetch_assoc()) {
    
    
           $roleid=$row2["Role_ID"];
           $loginuser=$row2["User_ID"];
        }
    
      }
      session_start() ;
      $_SESSION['loginuser_id']= $loginuser;


if($roleid=="1"){
    header("Location: http://localhost/educativeform/homepageLogin.php?id=" .  $loginuser);
    
$sql= "UPDATE logintableuser SET User_ID='$loginuser' WHERE ID = '1'";
mysqli_query($con,$sql);
}
if($roleid=="2"){
    header("Location: http://localhost/educativeform/store/mainpage.php?id=" .  $loginuser);
        
$sql= "UPDATE logintablestore SET User_ID='$loginuser' WHERE ID = '1'";
mysqli_query($con,$sql);
}
if($roleid=="3"){
    header("Location: http://localhost/educativeform/admin/mainpage.php?id=" .  $loginuser);
        
$sql= "UPDATE logintableadmin SET User_ID='$loginuser' WHERE ID = '1'";
mysqli_query($con,$sql);
}



}else{
echo 'failure';
}
}
?>