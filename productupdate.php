<?php     session_start();
$loginuser_id=$_SESSION['loginuser_id'];

 $_SESSION['loginuser_id']= $loginuser_id;
  ?>

<?php 

include "config.php";
if(isset($_POST['back'])){


      header('Location:http://localhost/educativeform/view.php');

}
$user_id = $_GET['id']; 
if($loginuser_id=="" ){
 
      $sql= "SELECT * FROM logintableuser WHERE ID='1' ";
      $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result) > 0) {
          
        while($row6 = mysqli_fetch_assoc($result)) {
      
      
          $loginuser_id=$row6["User_ID"];
        
        }
      
      }
      }
//product name
$sql6 = "SELECT * FROM `product` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id' )";

$c = $conn->query($sql6);
if (mysqli_num_rows($c) > 0) {

    while($row6 = mysqli_fetch_assoc($c)) {


        $productname=$row6["Product_Name"];

            
    
    }

  }
    $sql = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
    $sqlcustomerpro = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
    $customerpro = $conn->query($sqlcustomerpro);
    if (mysqli_num_rows($customerpro) > 0) {
        while($row2 = mysqli_fetch_assoc($customerpro)) {
            $proID=$row2["product_ID"];
        }
    
      }
 $result = $conn->query($sql); 


$sqlcount="SELECT count(*) AS a FROM`name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id)";
$counter=mysqli_query($conn, $sqlcount);
$ArrPropertiesID=array();
if (mysqli_num_rows($counter) > 0) {

  while($row1 = mysqli_fetch_assoc($counter)) {
  
  
   $count=$row1["a"];
  
  }
  
  }




  $sqlcount1="SELECT * FROM `name` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE  Customer_Product_ID=$user_id)";
  $counter1=mysqli_query($conn, $sqlcount1);
  
  if (mysqli_num_rows($counter1) > 0) {
  $q=0;
    while($row2 = mysqli_fetch_assoc($counter1)) {
    
    
     $ArrPropertiesID[$q]=$row2["Properties_ID"];
    ++$q;
    }
    
    }




if($count=='3'){

    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
     
  
      } 
  
  }
  




if($count=='4'){
 
  
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
   
  
      } 
    
}
if($count=='5'){
 


  
  
  
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
      } 


}
if($count=='6'){
 

 
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);

  
  
  
  
  
  
  
  
  
  
  
  
  
  
   
  
      } 
  
}
if($count=='7'){
  
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);

  
  
  
  
  
  
  
  
  
  
  
  
  
   
  
      } 
  

}
if($count=='8'){
  
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
   
  
      } 



}
if($count=='9'){
  
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 

  
  
  
  
  
   
  
      } 
  

}
if($count=='10'){ 
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
 
  
  
  
  
  
  
  
   
  
      }
}
if($count=='11'){
  

    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  

  
  
  
  
  
  
  
  
   
  
      } 
  
}
if($count=='12'){

    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);



  
  
  
  
  
  
  
  
   
  
      } 

}
if($count=='13'){
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


     
  
  
  
  
  
   
  
      } 

   

}
if($count=='14'){

if (isset($_POST['update'])) {
   
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


        $valuep13 = $_POST['f13'];
        $sqlU13 = "  UPDATE `value of user product` SET `valuep`='$valuep13' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[13] ";
       $conn->query($sqlU13);

  
  
  
  
  
  
  
  
  
   
  
      } 

}
if($count=='15'){

    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


        $valuep13 = $_POST['f13'];
        $sqlU13 = "  UPDATE `value of user product` SET `valuep`='$valuep13' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[13] ";
       $conn->query($sqlU13);

        $valuep14 = $_POST['f14'];
        $sqlU14 = "  UPDATE `value of user product` SET `valuep`='$valuep14' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[14] ";
       $conn->query($sqlU14);


  
  
  
  
  
  
  
  
   
  
      } 

}
if($count=='16'){
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


        $valuep13 = $_POST['f13'];
        $sqlU13 = "  UPDATE `value of user product` SET `valuep`='$valuep13' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[13] ";
       $conn->query($sqlU13);

        $valuep14 = $_POST['f14'];
        $sqlU14 = "  UPDATE `value of user product` SET `valuep`='$valuep14' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[14] ";
       $conn->query($sqlU14);

        $valuep15 = $_POST['f15'];
        $sqlU15 = "  UPDATE `value of user product` SET `valuep`='$valuep15' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[15] ";
       $conn->query($sqlU15);

 

  
  
  
  
  
  
  
  
  
  
   
  
      } 

}
if($count=='17'){


  
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


        $valuep13 = $_POST['f13'];
        $sqlU13 = "  UPDATE `value of user product` SET `valuep`='$valuep13' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[13] ";
       $conn->query($sqlU13);

        $valuep14 = $_POST['f14'];
        $sqlU14 = "  UPDATE `value of user product` SET `valuep`='$valuep14' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[14] ";
       $conn->query($sqlU14);

        $valuep15 = $_POST['f15'];
        $sqlU15 = "  UPDATE `value of user product` SET `valuep`='$valuep15' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[15] ";
       $conn->query($sqlU15);

        $valuep16 = $_POST['f16'];
        $sqlU16 = "  UPDATE `value of user product` SET `valuep`='$valuep16' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[16]";
       $conn->query($sqlU16);


  
  
  
  
  
  
  
  
  
  
   
  
      } 
  

}
if($count=='18'){ 
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


        $valuep13 = $_POST['f13'];
        $sqlU13 = "  UPDATE `value of user product` SET `valuep`='$valuep13' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[13] ";
       $conn->query($sqlU13);

        $valuep14 = $_POST['f14'];
        $sqlU14 = "  UPDATE `value of user product` SET `valuep`='$valuep14' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[14] ";
       $conn->query($sqlU14);

        $valuep15 = $_POST['f15'];
        $sqlU15 = "  UPDATE `value of user product` SET `valuep`='$valuep15' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[15] ";
       $conn->query($sqlU15);

        $valuep16 = $_POST['f16'];
        $sqlU16 = "  UPDATE `value of user product` SET `valuep`='$valuep16' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[16]";
       $conn->query($sqlU16);

        $valuep17 = $_POST['f17'];
        $sqlU17 = "  UPDATE `value of user product` SET `valuep`='$valuep17' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[17] ";
       $conn->query($sqlU7);

  
  
  
  
  
  
  
  
   
  
      } 
  

}
if($count=='19'){

  
  
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


        $valuep13 = $_POST['f13'];
        $sqlU13 = "  UPDATE `value of user product` SET `valuep`='$valuep13' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[13] ";
       $conn->query($sqlU13);

        $valuep14 = $_POST['f14'];
        $sqlU14 = "  UPDATE `value of user product` SET `valuep`='$valuep14' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[14] ";
       $conn->query($sqlU14);

        $valuep15 = $_POST['f15'];
        $sqlU15 = "  UPDATE `value of user product` SET `valuep`='$valuep15' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[15] ";
       $conn->query($sqlU15);

        $valuep16 = $_POST['f16'];
        $sqlU16 = "  UPDATE `value of user product` SET `valuep`='$valuep16' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[16]";
       $conn->query($sqlU16);

        $valuep17 = $_POST['f17'];
        $sqlU17 = "  UPDATE `value of user product` SET `valuep`='$valuep17' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[17] ";
       $conn->query($sqlU7);

       $valuep18 = $_POST['f18'];
       $sqlU18 = "  UPDATE `value of user product` SET `valuep`='$valuep18' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[18] ";
      $conn->query($sqlU18);

  
  
  
  
  
  
  
  
  
  
  
  
   
  
      } 
  

}
if($count=='20'){
 
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


        $valuep13 = $_POST['f13'];
        $sqlU13 = "  UPDATE `value of user product` SET `valuep`='$valuep13' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[13] ";
       $conn->query($sqlU13);

        $valuep14 = $_POST['f14'];
        $sqlU14 = "  UPDATE `value of user product` SET `valuep`='$valuep14' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[14] ";
       $conn->query($sqlU14);

        $valuep15 = $_POST['f15'];
        $sqlU15 = "  UPDATE `value of user product` SET `valuep`='$valuep15' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[15] ";
       $conn->query($sqlU15);

        $valuep16 = $_POST['f16'];
        $sqlU16 = "  UPDATE `value of user product` SET `valuep`='$valuep16' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[16]";
       $conn->query($sqlU16);

        $valuep17 = $_POST['f17'];
        $sqlU17 = "  UPDATE `value of user product` SET `valuep`='$valuep17' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[17] ";
       $conn->query($sqlU7);

       $valuep18 = $_POST['f18'];
       $sqlU18 = "  UPDATE `value of user product` SET `valuep`='$valuep18' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[18] ";
      $conn->query($sqlU18);

       $valuep19 = $_POST['f19'];
       $sqlU19 = "  UPDATE `value of user product` SET `valuep`='$valuep19' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[19]";
      $conn->query($sqlU19);


  
  
  
  
  
  
  
  
  
  
   
  
      } 
  

}
if($count=='21'){
  
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


        $valuep13 = $_POST['f13'];
        $sqlU13 = "  UPDATE `value of user product` SET `valuep`='$valuep13' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[13] ";
       $conn->query($sqlU13);

        $valuep14 = $_POST['f14'];
        $sqlU14 = "  UPDATE `value of user product` SET `valuep`='$valuep14' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[14] ";
       $conn->query($sqlU14);

        $valuep15 = $_POST['f15'];
        $sqlU15 = "  UPDATE `value of user product` SET `valuep`='$valuep15' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[15] ";
       $conn->query($sqlU15);

        $valuep16 = $_POST['f16'];
        $sqlU16 = "  UPDATE `value of user product` SET `valuep`='$valuep16' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[16]";
       $conn->query($sqlU16);

        $valuep17 = $_POST['f17'];
        $sqlU17 = "  UPDATE `value of user product` SET `valuep`='$valuep17' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[17] ";
       $conn->query($sqlU7);

       $valuep18 = $_POST['f18'];
       $sqlU18 = "  UPDATE `value of user product` SET `valuep`='$valuep18' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[18] ";
      $conn->query($sqlU18);

       $valuep19 = $_POST['f19'];
       $sqlU19 = "  UPDATE `value of user product` SET `valuep`='$valuep19' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[19]";
      $conn->query($sqlU19);

       $valuep20 = $_POST['f20'];
       $sqlU20 = "  UPDATE `value of user product` SET `valuep`='$valuep20' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[20] ";
      $conn->query($sqlU20);

    

  
  
  
  
  
  
  
  
  
  
  
  
  
   
  
      } 

}
if($count=='22'){
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


        $valuep13 = $_POST['f13'];
        $sqlU13 = "  UPDATE `value of user product` SET `valuep`='$valuep13' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[13] ";
       $conn->query($sqlU13);

        $valuep14 = $_POST['f14'];
        $sqlU14 = "  UPDATE `value of user product` SET `valuep`='$valuep14' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[14] ";
       $conn->query($sqlU14);

        $valuep15 = $_POST['f15'];
        $sqlU15 = "  UPDATE `value of user product` SET `valuep`='$valuep15' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[15] ";
       $conn->query($sqlU15);

        $valuep16 = $_POST['f16'];
        $sqlU16 = "  UPDATE `value of user product` SET `valuep`='$valuep16' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[16]";
       $conn->query($sqlU16);

        $valuep17 = $_POST['f17'];
        $sqlU17 = "  UPDATE `value of user product` SET `valuep`='$valuep17' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[17] ";
       $conn->query($sqlU7);

       $valuep18 = $_POST['f18'];
       $sqlU18 = "  UPDATE `value of user product` SET `valuep`='$valuep18' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[18] ";
      $conn->query($sqlU18);

       $valuep19 = $_POST['f19'];
       $sqlU19 = "  UPDATE `value of user product` SET `valuep`='$valuep19' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[19]";
      $conn->query($sqlU19);

       $valuep20 = $_POST['f20'];
       $sqlU20 = "  UPDATE `value of user product` SET `valuep`='$valuep20' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[20] ";
      $conn->query($sqlU20);

    
      $valuep21 = $_POST['f21'];
      $sqlU21 = "  UPDATE `value of user product` SET `valuep`='$valuep21' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[21] ";
      $conn->query($sqlU21);

  
  
  
  
  
  
  
  
  
  
  
   
  
      } 

}
if($count=='23'){

  
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


        $valuep13 = $_POST['f13'];
        $sqlU13 = "  UPDATE `value of user product` SET `valuep`='$valuep13' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[13] ";
       $conn->query($sqlU13);

        $valuep14 = $_POST['f14'];
        $sqlU14 = "  UPDATE `value of user product` SET `valuep`='$valuep14' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[14] ";
       $conn->query($sqlU14);

        $valuep15 = $_POST['f15'];
        $sqlU15 = "  UPDATE `value of user product` SET `valuep`='$valuep15' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[15] ";
       $conn->query($sqlU15);

        $valuep16 = $_POST['f16'];
        $sqlU16 = "  UPDATE `value of user product` SET `valuep`='$valuep16' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[16]";
       $conn->query($sqlU16);

        $valuep17 = $_POST['f17'];
        $sqlU17 = "  UPDATE `value of user product` SET `valuep`='$valuep17' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[17] ";
       $conn->query($sqlU7);

       $valuep18 = $_POST['f18'];
       $sqlU18 = "  UPDATE `value of user product` SET `valuep`='$valuep18' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[18] ";
      $conn->query($sqlU18);

       $valuep19 = $_POST['f19'];
       $sqlU19 = "  UPDATE `value of user product` SET `valuep`='$valuep19' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[19]";
      $conn->query($sqlU19);

       $valuep20 = $_POST['f20'];
       $sqlU20 = "  UPDATE `value of user product` SET `valuep`='$valuep20' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[20] ";
      $conn->query($sqlU20);

    
      $valuep21 = $_POST['f21'];
      $sqlU21 = "  UPDATE `value of user product` SET `valuep`='$valuep21' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[21] ";
      $conn->query($sqlU21);

      $valuep22 = $_POST['f22'];
      $sqlU22 = "  UPDATE `value of user product` SET `valuep`='$valuep22' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[22] ";
     $conn->query($sqlU22);


  
  
  
  
  
  
  
  
  
   
  
      } 

}
if($count=='24'){

    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


        $valuep13 = $_POST['f13'];
        $sqlU13 = "  UPDATE `value of user product` SET `valuep`='$valuep13' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[13] ";
       $conn->query($sqlU13);

        $valuep14 = $_POST['f14'];
        $sqlU14 = "  UPDATE `value of user product` SET `valuep`='$valuep14' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[14] ";
       $conn->query($sqlU14);

        $valuep15 = $_POST['f15'];
        $sqlU15 = "  UPDATE `value of user product` SET `valuep`='$valuep15' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[15] ";
       $conn->query($sqlU15);

        $valuep16 = $_POST['f16'];
        $sqlU16 = "  UPDATE `value of user product` SET `valuep`='$valuep16' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[16]";
       $conn->query($sqlU16);

        $valuep17 = $_POST['f17'];
        $sqlU17 = "  UPDATE `value of user product` SET `valuep`='$valuep17' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[17] ";
       $conn->query($sqlU7);

       $valuep18 = $_POST['f18'];
       $sqlU18 = "  UPDATE `value of user product` SET `valuep`='$valuep18' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[18] ";
      $conn->query($sqlU18);

       $valuep19 = $_POST['f19'];
       $sqlU19 = "  UPDATE `value of user product` SET `valuep`='$valuep19' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[19]";
      $conn->query($sqlU19);

       $valuep20 = $_POST['f20'];
       $sqlU20 = "  UPDATE `value of user product` SET `valuep`='$valuep20' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[20] ";
      $conn->query($sqlU20);

    
      $valuep21 = $_POST['f21'];
      $sqlU21 = "  UPDATE `value of user product` SET `valuep`='$valuep21' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[21] ";
      $conn->query($sqlU21);

      $valuep22 = $_POST['f22'];
      $sqlU22 = "  UPDATE `value of user product` SET `valuep`='$valuep22' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[22] ";
     $conn->query($sqlU22);


      $valuep23 = $_POST['f23'];
      $sqlU23 = "  UPDATE `value of user product` SET `valuep`='$valuep23' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[23] ";
     $conn->query($sqlU23);


  
  
  
  
  
  
  
  
  
  
  
   
  
      } 

}
if($count=='25'){
  
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


        $valuep13 = $_POST['f13'];
        $sqlU13 = "  UPDATE `value of user product` SET `valuep`='$valuep13' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[13] ";
       $conn->query($sqlU13);

        $valuep14 = $_POST['f14'];
        $sqlU14 = "  UPDATE `value of user product` SET `valuep`='$valuep14' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[14] ";
       $conn->query($sqlU14);

        $valuep15 = $_POST['f15'];
        $sqlU15 = "  UPDATE `value of user product` SET `valuep`='$valuep15' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[15] ";
       $conn->query($sqlU15);

        $valuep16 = $_POST['f16'];
        $sqlU16 = "  UPDATE `value of user product` SET `valuep`='$valuep16' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[16]";
       $conn->query($sqlU16);

        $valuep17 = $_POST['f17'];
        $sqlU17 = "  UPDATE `value of user product` SET `valuep`='$valuep17' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[17] ";
       $conn->query($sqlU7);

       $valuep18 = $_POST['f18'];
       $sqlU18 = "  UPDATE `value of user product` SET `valuep`='$valuep18' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[18] ";
      $conn->query($sqlU18);

       $valuep19 = $_POST['f19'];
       $sqlU19 = "  UPDATE `value of user product` SET `valuep`='$valuep19' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[19]";
      $conn->query($sqlU19);

       $valuep20 = $_POST['f20'];
       $sqlU20 = "  UPDATE `value of user product` SET `valuep`='$valuep20' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[20] ";
      $conn->query($sqlU20);

    
      $valuep21 = $_POST['f21'];
      $sqlU21 = "  UPDATE `value of user product` SET `valuep`='$valuep21' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[21] ";
      $conn->query($sqlU21);

      $valuep22 = $_POST['f22'];
      $sqlU22 = "  UPDATE `value of user product` SET `valuep`='$valuep22' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[22] ";
     $conn->query($sqlU22);


      $valuep23 = $_POST['f23'];
      $sqlU23 = "  UPDATE `value of user product` SET `valuep`='$valuep23' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[23] ";
     $conn->query($sqlU23);

      $valuep24 = $_POST['f24'];
      $sqlU24 = "  UPDATE `value of user product` SET `valuep`='$valuep24' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[24] ";
     $conn->query($sqlU24);

  
  
  
  
  
  
  
  
  
  
  
   
  
      } 

}
if($count=='26'){
 
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


        $valuep13 = $_POST['f13'];
        $sqlU13 = "  UPDATE `value of user product` SET `valuep`='$valuep13' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[13] ";
       $conn->query($sqlU13);

        $valuep14 = $_POST['f14'];
        $sqlU14 = "  UPDATE `value of user product` SET `valuep`='$valuep14' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[14] ";
       $conn->query($sqlU14);

        $valuep15 = $_POST['f15'];
        $sqlU15 = "  UPDATE `value of user product` SET `valuep`='$valuep15' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[15] ";
       $conn->query($sqlU15);

        $valuep16 = $_POST['f16'];
        $sqlU16 = "  UPDATE `value of user product` SET `valuep`='$valuep16' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[16]";
       $conn->query($sqlU16);

        $valuep17 = $_POST['f17'];
        $sqlU17 = "  UPDATE `value of user product` SET `valuep`='$valuep17' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[17] ";
       $conn->query($sqlU7);

       $valuep18 = $_POST['f18'];
       $sqlU18 = "  UPDATE `value of user product` SET `valuep`='$valuep18' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[18] ";
      $conn->query($sqlU18);

       $valuep19 = $_POST['f19'];
       $sqlU19 = "  UPDATE `value of user product` SET `valuep`='$valuep19' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[19]";
      $conn->query($sqlU19);

       $valuep20 = $_POST['f20'];
       $sqlU20 = "  UPDATE `value of user product` SET `valuep`='$valuep20' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[20] ";
      $conn->query($sqlU20);

    
      $valuep21 = $_POST['f21'];
      $sqlU21 = "  UPDATE `value of user product` SET `valuep`='$valuep21' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[21] ";
      $conn->query($sqlU21);

      $valuep22 = $_POST['f22'];
      $sqlU22 = "  UPDATE `value of user product` SET `valuep`='$valuep22' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[22] ";
     $conn->query($sqlU22);


      $valuep23 = $_POST['f23'];
      $sqlU23 = "  UPDATE `value of user product` SET `valuep`='$valuep23' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[23] ";
     $conn->query($sqlU23);

      $valuep24 = $_POST['f24'];
      $sqlU24 = "  UPDATE `value of user product` SET `valuep`='$valuep24' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[24] ";
     $conn->query($sqlU24);

      $valuep25 = $_POST['f25'];
      $sqlU25 = "  UPDATE `value of user product` SET `valuep`='$valuep25' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[25] ";
     $conn->query($sqlU25);

  
  
  
  
  
  
  
  
  
  
  
  
   
  
      } 
}
if($count=='27'){
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


        $valuep13 = $_POST['f13'];
        $sqlU13 = "  UPDATE `value of user product` SET `valuep`='$valuep13' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[13] ";
       $conn->query($sqlU13);

        $valuep14 = $_POST['f14'];
        $sqlU14 = "  UPDATE `value of user product` SET `valuep`='$valuep14' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[14] ";
       $conn->query($sqlU14);

        $valuep15 = $_POST['f15'];
        $sqlU15 = "  UPDATE `value of user product` SET `valuep`='$valuep15' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[15] ";
       $conn->query($sqlU15);

        $valuep16 = $_POST['f16'];
        $sqlU16 = "  UPDATE `value of user product` SET `valuep`='$valuep16' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[16]";
       $conn->query($sqlU16);

        $valuep17 = $_POST['f17'];
        $sqlU17 = "  UPDATE `value of user product` SET `valuep`='$valuep17' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[17] ";
       $conn->query($sqlU7);

       $valuep18 = $_POST['f18'];
       $sqlU18 = "  UPDATE `value of user product` SET `valuep`='$valuep18' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[18] ";
      $conn->query($sqlU18);

       $valuep19 = $_POST['f19'];
       $sqlU19 = "  UPDATE `value of user product` SET `valuep`='$valuep19' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[19]";
      $conn->query($sqlU19);

       $valuep20 = $_POST['f20'];
       $sqlU20 = "  UPDATE `value of user product` SET `valuep`='$valuep20' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[20] ";
      $conn->query($sqlU20);

    
      $valuep21 = $_POST['f21'];
      $sqlU21 = "  UPDATE `value of user product` SET `valuep`='$valuep21' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[21] ";
      $conn->query($sqlU21);

      $valuep22 = $_POST['f22'];
      $sqlU22 = "  UPDATE `value of user product` SET `valuep`='$valuep22' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[22] ";
     $conn->query($sqlU22);


      $valuep23 = $_POST['f23'];
      $sqlU23 = "  UPDATE `value of user product` SET `valuep`='$valuep23' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[23] ";
     $conn->query($sqlU23);

      $valuep24 = $_POST['f24'];
      $sqlU24 = "  UPDATE `value of user product` SET `valuep`='$valuep24' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[24] ";
     $conn->query($sqlU24);

      $valuep25 = $_POST['f25'];
      $sqlU25 = "  UPDATE `value of user product` SET `valuep`='$valuep25' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[25] ";
     $conn->query($sqlU25);

      $valuep26 = $_POST['f26'];
      $sqlU26 = "  UPDATE `value of user product` SET `valuep`='$valuep26' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[26]";
     $conn->query($sqlU26);

  
  
  
  
  
  
  
  
  
   
  
      } 

}
if($count=='28'){

  
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


        $valuep13 = $_POST['f13'];
        $sqlU13 = "  UPDATE `value of user product` SET `valuep`='$valuep13' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[13] ";
       $conn->query($sqlU13);

        $valuep14 = $_POST['f14'];
        $sqlU14 = "  UPDATE `value of user product` SET `valuep`='$valuep14' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[14] ";
       $conn->query($sqlU14);

        $valuep15 = $_POST['f15'];
        $sqlU15 = "  UPDATE `value of user product` SET `valuep`='$valuep15' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[15] ";
       $conn->query($sqlU15);

        $valuep16 = $_POST['f16'];
        $sqlU16 = "  UPDATE `value of user product` SET `valuep`='$valuep16' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[16]";
       $conn->query($sqlU16);

        $valuep17 = $_POST['f17'];
        $sqlU17 = "  UPDATE `value of user product` SET `valuep`='$valuep17' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[17] ";
       $conn->query($sqlU7);

       $valuep18 = $_POST['f18'];
       $sqlU18 = "  UPDATE `value of user product` SET `valuep`='$valuep18' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[18] ";
      $conn->query($sqlU18);

       $valuep19 = $_POST['f19'];
       $sqlU19 = "  UPDATE `value of user product` SET `valuep`='$valuep19' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[19]";
      $conn->query($sqlU19);

       $valuep20 = $_POST['f20'];
       $sqlU20 = "  UPDATE `value of user product` SET `valuep`='$valuep20' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[20] ";
      $conn->query($sqlU20);

    
      $valuep21 = $_POST['f21'];
      $sqlU21 = "  UPDATE `value of user product` SET `valuep`='$valuep21' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[21] ";
      $conn->query($sqlU21);

      $valuep22 = $_POST['f22'];
      $sqlU22 = "  UPDATE `value of user product` SET `valuep`='$valuep22' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[22] ";
     $conn->query($sqlU22);


      $valuep23 = $_POST['f23'];
      $sqlU23 = "  UPDATE `value of user product` SET `valuep`='$valuep23' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[23] ";
     $conn->query($sqlU23);

      $valuep24 = $_POST['f24'];
      $sqlU24 = "  UPDATE `value of user product` SET `valuep`='$valuep24' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[24] ";
     $conn->query($sqlU24);

      $valuep25 = $_POST['f25'];
      $sqlU25 = "  UPDATE `value of user product` SET `valuep`='$valuep25' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[25] ";
     $conn->query($sqlU25);

      $valuep26 = $_POST['f26'];
      $sqlU26 = "  UPDATE `value of user product` SET `valuep`='$valuep26' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[26]";
     $conn->query($sqlU26);

      $valuep27 = $_POST['f27'];
      $sqlU27 = "  UPDATE `value of user product` SET `valuep`='$valuep27' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[27] ";
     $conn->query($sqlU27);

  
  
  
  
  
  
  
  
  
  
  
  
  
   
  
      } 

}
if($count=='29'){

    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


        $valuep13 = $_POST['f13'];
        $sqlU13 = "  UPDATE `value of user product` SET `valuep`='$valuep13' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[13] ";
       $conn->query($sqlU13);

        $valuep14 = $_POST['f14'];
        $sqlU14 = "  UPDATE `value of user product` SET `valuep`='$valuep14' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[14] ";
       $conn->query($sqlU14);

        $valuep15 = $_POST['f15'];
        $sqlU15 = "  UPDATE `value of user product` SET `valuep`='$valuep15' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[15] ";
       $conn->query($sqlU15);

        $valuep16 = $_POST['f16'];
        $sqlU16 = "  UPDATE `value of user product` SET `valuep`='$valuep16' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[16]";
       $conn->query($sqlU16);

        $valuep17 = $_POST['f17'];
        $sqlU17 = "  UPDATE `value of user product` SET `valuep`='$valuep17' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[17] ";
       $conn->query($sqlU7);

       $valuep18 = $_POST['f18'];
       $sqlU18 = "  UPDATE `value of user product` SET `valuep`='$valuep18' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[18] ";
      $conn->query($sqlU18);

       $valuep19 = $_POST['f19'];
       $sqlU19 = "  UPDATE `value of user product` SET `valuep`='$valuep19' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[19]";
      $conn->query($sqlU19);

       $valuep20 = $_POST['f20'];
       $sqlU20 = "  UPDATE `value of user product` SET `valuep`='$valuep20' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[20] ";
      $conn->query($sqlU20);

    
      $valuep21 = $_POST['f21'];
      $sqlU21 = "  UPDATE `value of user product` SET `valuep`='$valuep21' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[21] ";
      $conn->query($sqlU21);

      $valuep22 = $_POST['f22'];
      $sqlU22 = "  UPDATE `value of user product` SET `valuep`='$valuep22' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[22] ";
     $conn->query($sqlU22);


      $valuep23 = $_POST['f23'];
      $sqlU23 = "  UPDATE `value of user product` SET `valuep`='$valuep23' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[23] ";
     $conn->query($sqlU23);

      $valuep24 = $_POST['f24'];
      $sqlU24 = "  UPDATE `value of user product` SET `valuep`='$valuep24' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[24] ";
     $conn->query($sqlU24);

      $valuep25 = $_POST['f25'];
      $sqlU25 = "  UPDATE `value of user product` SET `valuep`='$valuep25' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[25] ";
     $conn->query($sqlU25);

      $valuep26 = $_POST['f26'];
      $sqlU26 = "  UPDATE `value of user product` SET `valuep`='$valuep26' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[26]";
     $conn->query($sqlU26);

      $valuep27 = $_POST['f27'];
      $sqlU27 = "  UPDATE `value of user product` SET `valuep`='$valuep27' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[27] ";
     $conn->query($sqlU27);

     $valuep28 = $_POST['f28'];
     $sqlU28 = "  UPDATE `value of user product` SET `valuep`='$valuep28' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[28] ";
    $conn->query($sqlU28);

  
  
  
  
  
  
  
  
  
  
  
  
  
   
  
      } 

}
if($count=='30'){

  
  
  
  
    if (isset($_POST['update'])) {
  
          $valuep0 = $_POST['f0'];
          $sqlU0 = "  UPDATE `value of user product` SET `valuep`='$valuep0' WHERE User_ID='$loginuser_id' AND Product_ID=$proID AND Name_ID=$ArrPropertiesID[0]";
          $rs5=mysqli_query($conn, $sqlU0);
  
          $valuep1 = $_POST['f1'];
          $sqlU1 = "  UPDATE `value of user product` SET `valuep`='$valuep1' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[1] ";
          $conn->query($sqlU1);
  
          $valuep2 = $_POST['f2'];
          $sqlU2 = "  UPDATE `value of user product` SET `valuep`='$valuep2' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[2] ";
         $conn->query($sqlU2);
  
  
          $valuep3 = $_POST['f3'];
          $sqlU3 = "  UPDATE `value of user product` SET `valuep`='$valuep3' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[3] ";
         $conn->query($sqlU3);
  
          $valuep4 = $_POST['f4'];
          $sqlU4 = "  UPDATE `value of user product` SET `valuep`='$valuep4' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[4] ";
         $conn->query($sqlU4);
  
          $valuep5 = $_POST['f5'];
          $sqlU5 = "  UPDATE `value of user product` SET `valuep`='$valuep5' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[5] ";
         $conn->query($sqlU5);
  
          $valuep6 = $_POST['f6'];
          $sqlU6 = "  UPDATE `value of user product` SET `valuep`='$valuep6' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[6]";
         $conn->query($sqlU6);
  
          $valuep7 = $_POST['f7'];
          $sqlU7 = "  UPDATE `value of user product` SET `valuep`='$valuep7' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[7] ";
         $conn->query($sqlU7);
  
         $valuep8 = $_POST['f8'];
         $sqlU8 = "  UPDATE `value of user product` SET `valuep`='$valuep8' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[8] ";
        $conn->query($sqlU8);
 
         $valuep9 = $_POST['f9'];
         $sqlU9 = "  UPDATE `value of user product` SET `valuep`='$valuep9' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[9]";
        $conn->query($sqlU9);
 
         $valuep10 = $_POST['f10'];
         $sqlU10 = "  UPDATE `value of user product` SET `valuep`='$valuep10' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[10] ";
        $conn->query($sqlU10);
 
  
        $valuep11 = $_POST['f11'];
        $sqlU11 = "  UPDATE `value of user product` SET `valuep`='$valuep11' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[11] ";
        $conn->query($sqlU11);

        $valuep12 = $_POST['f12'];
        $sqlU12 = "  UPDATE `value of user product` SET `valuep`='$valuep12' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[12] ";
       $conn->query($sqlU12);


        $valuep13 = $_POST['f13'];
        $sqlU13 = "  UPDATE `value of user product` SET `valuep`='$valuep13' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[13] ";
       $conn->query($sqlU13);

        $valuep14 = $_POST['f14'];
        $sqlU14 = "  UPDATE `value of user product` SET `valuep`='$valuep14' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[14] ";
       $conn->query($sqlU14);

        $valuep15 = $_POST['f15'];
        $sqlU15 = "  UPDATE `value of user product` SET `valuep`='$valuep15' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[15] ";
       $conn->query($sqlU15);

        $valuep16 = $_POST['f16'];
        $sqlU16 = "  UPDATE `value of user product` SET `valuep`='$valuep16' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[16]";
       $conn->query($sqlU16);

        $valuep17 = $_POST['f17'];
        $sqlU17 = "  UPDATE `value of user product` SET `valuep`='$valuep17' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[17] ";
       $conn->query($sqlU7);

       $valuep18 = $_POST['f18'];
       $sqlU18 = "  UPDATE `value of user product` SET `valuep`='$valuep18' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[18] ";
      $conn->query($sqlU18);

       $valuep19 = $_POST['f19'];
       $sqlU19 = "  UPDATE `value of user product` SET `valuep`='$valuep19' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[19]";
      $conn->query($sqlU19);

       $valuep20 = $_POST['f20'];
       $sqlU20 = "  UPDATE `value of user product` SET `valuep`='$valuep20' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[20] ";
      $conn->query($sqlU20);

    
      $valuep21 = $_POST['f21'];
      $sqlU21 = "  UPDATE `value of user product` SET `valuep`='$valuep21' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[21] ";
      $conn->query($sqlU21);

      $valuep22 = $_POST['f22'];
      $sqlU22 = "  UPDATE `value of user product` SET `valuep`='$valuep22' WHERE `User_ID`='$loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[22] ";
     $conn->query($sqlU22);


      $valuep23 = $_POST['f23'];
      $sqlU23 = "  UPDATE `value of user product` SET `valuep`='$valuep23' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[23] ";
     $conn->query($sqlU23);

      $valuep24 = $_POST['f24'];
      $sqlU24 = "  UPDATE `value of user product` SET `valuep`='$valuep24' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[24] ";
     $conn->query($sqlU24);

      $valuep25 = $_POST['f25'];
      $sqlU25 = "  UPDATE `value of user product` SET `valuep`='$valuep25' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[25] ";
     $conn->query($sqlU25);

      $valuep26 = $_POST['f26'];
      $sqlU26 = "  UPDATE `value of user product` SET `valuep`='$valuep26' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[26]";
     $conn->query($sqlU26);

      $valuep27 = $_POST['f27'];
      $sqlU27 = "  UPDATE `value of user product` SET `valuep`='$valuep27' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[27] ";
     $conn->query($sqlU27);

     $valuep28 = $_POST['f28'];
     $sqlU28 = "  UPDATE `value of user product` SET `valuep`='$valuep28' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[28] ";
    $conn->query($sqlU28);

     $valuep29 = $_POST['f29'];
     $sqlU29 = "  UPDATE `value of user product` SET `valuep`='$valuep29' WHERE `User_ID`=' $loginuser_id' AND Product_ID=$proID and Name_ID=$ArrPropertiesID[29]";
    $conn->query($sqlU29);




  
  
  
  
  
  
  
  
  
  
  
  
  
  
   
  
      } 

}

$numbers=$_POST['field40'];
$explain=$_POST['field42'];
$essential=$_POST['field41'];
$sqlU2 = "  UPDATE `list of customer product` SET `numbers`='$numbers',`explain`='$explain',essential='$essential' WHERE `Customer_Product_ID`='$user_id'";
$conn->query($sqlU2);

header('Location: http://localhost/educativeform/view.php');
?> 