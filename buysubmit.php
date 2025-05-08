<?php       $loginuser_id = $_GET['id'];
  session_start() ;
  $loginuser_id=$_SESSION['loginuser_id'];

  $_SESSION['loginuser_id']= $loginuser_id;
          ?>
<?php
include "config.php";
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
if (isset($_GET['id'])) {


    $sql6 = "SELECT * FROM `product` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE `Customer_Product_ID`=$user_id )";
    
    $c = $conn->query($sql6);
    if (mysqli_num_rows($c) > 0) {
    
        while($row6 = mysqli_fetch_assoc($c)) {
    
    
            $productname=$row6["Product_Name"];
        
        }
    
      }
  
  
  
  
  }
  if(isset($_POST['back'])){
    header('Location: http://localhost/educativeform/view.php');


  }
    if (isset($_POST['update'])) {
        $Price = $_POST['Price'];
        $Warranty_code = $_POST['Warranty_code'];
        $Store_ID = $_POST['Store_ID'];
        $Dates = $_POST['Dates'];
        $Addressu = $_POST['Addressu'];

       $sql = "UPDATE `list of customer product` SET Warranty_code='$Warranty_code',Price='$Price',Store_ID='$Store_ID',Dates='$Dates',Addressu='$Addressu' WHERE Customer_Product_ID='$user_id'";
 $result = $conn->query($sql); 
        if ($result == TRUE) {
            header('Location: http://localhost/educativeform/view.php');
        }else{
            echo "Error:" . $sql . "<br>" ;
        }
    } 
    ?>