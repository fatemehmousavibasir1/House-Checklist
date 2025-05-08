<?php  
  session_start() ;
  $loginuser_id=$_SESSION['loginuser_id'];

  $_SESSION['loginuser_id']= $loginuser_id;


  ?>

<?php 

include "config.php"; 
 $_SESSION['loginuser_id']= $loginuser_id;
 if($loginuser_id=="" ){
 
    $sql= "SELECT * FROM logintableuser WHERE ID='1' ";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        
      while($row6 = mysqli_fetch_assoc($result)) {
    
    
        $loginuser_id=$row6["User_ID"];
      
      }
    
    }
    }
if (isset($_GET['id'])) {

    $user_id = $_GET['id'];



     $sqlcustomerpro = "SELECT * FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";
     $customerpro = $conn->query($sqlcustomerpro);
     if (mysqli_num_rows($customerpro) > 0) {
 
         while($row2 = mysqli_fetch_assoc($customerpro)) {
     
     
             $proID=$row2["product_ID"];
             $userID=$row2["User_ID"];
         
         }
     
       }
     $sql1 = "DELETE FROM `value of user product` WHERE `User_ID`='$userID' AND Product_ID=$proID";

     $result1 = $conn->query($sql1);




    $sql2 = "DELETE FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id'";

     $result = $conn->query($sql2);

     if ($result == TRUE) {

            header("Location: http://localhost/educativeform/view.php");
    


    }else{

        echo "Error:" . $sql . "<br>";

    }

} 

?>

