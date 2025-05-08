<?php    include "config.php";
    session_start();
        $loginuser_id=$_SESSION['loginuser_id'];
        
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
  
    
        $productid = $_GET['id'];   
        
    
        $sql1="SELECT * FROM `parent group` WHERE Parent_ID= (SELECT Parent_ID FROM `product group` where Product_Group_ID=(select Product_Group_ID FROM product where Product_ID='$productid'))";

        $rs2=mysqli_query($conn, $sql1);
        if ($rs2->num_rows > 0) {
       
           while($row2 = $rs2->fetch_assoc()) {
       
       
              $parentid=$row2["Parent_ID"];
        
           }
       
         }
            
        






        $sql1= "SELECT count(*) AS a FROM `name` WHERE Product_ID= '$productid'";
        $count = $conn->query($sql1);
        if (mysqli_num_rows($count) > 0) {

          while($row1 = mysqli_fetch_assoc($count)) {
          
          
           $countingprosuct=$row1["a"];
          
          }
          
          }
 $sql1="SELECT Properties_ID as new FROM name WHERE Product_ID =$productid ";

  $arr=array();      


          if($countingprosuct=='1'){
 
            $arr[0] = $_POST['field1'];
         



            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('',$loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
                     


          }
          if($countingprosuct=='2'){
    
              $arr[0] = $_POST['field1'];
         
      
              $arr[1] = $_POST['field2'];

  
  
  
              $field40 = $_POST['field40'];
              $field41 = $_POST['field41'];
              $field42 = $_POST['field42'];
  
              
              $rs1 = mysqli_query($conn, $sql1);
  
    
              if (mysqli_num_rows($rs1) > 0) {
                $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
                mysqli_query($conn, $sql6);              
                  $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
              $rsinsert = mysqli_query($conn, $sql4);
              $i=0;
                  while($row = mysqli_fetch_assoc($rs1)) {
                      $a=$row["new"];
            
                    $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                    $rsdel = mysqli_query($conn, $sqldel);
                      $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                    mysqli_query($conn,$sqlp);
            
                      ++$i;
                  }
                }
                $arr = array();
                       
  
  
          }
          if($countingprosuct=='3'){

          }
          if($countingprosuct=='4'){
            $arr[0] = $_POST['field1'];
       
    
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];





            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
                     



  
          }
          if($countingprosuct=='5'){
            $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
         
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];




            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
                     


          }
          if($countingprosuct=='6'){
            $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    

          }
          if($countingprosuct=='7'){
            $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];

            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    

          }
          if($countingprosuct=='8'){
            $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];

            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    

          }
          if($countingprosuct=='9'){
            $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];

            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    

          }
          if($countingprosuct=='10'){
            $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];

            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    

          }
          if($countingprosuct=='11'){
            $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];

            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    

          }
          if($countingprosuct=='12'){
            $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];

            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    

          }
          if($countingprosuct=='13'){
            $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];

            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    

          }
          if($countingprosuct=='14'){
            $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];
            $arr[13] = $_POST['field14'];

            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    

          }
          if($countingprosuct=='15'){
            $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];
            $arr[13] = $_POST['field14'];
            $arr[14] = $_POST['field15'];

            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    
          }
          if($countingprosuct=='16'){
                      $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];
            $arr[13] = $_POST['field14'];
            $arr[14] = $_POST['field15'];
            $arr[15] = $_POST['field16'];


            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    
          }
          if($countingprosuct=='17'){
                      $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];
            $arr[13] = $_POST['field14'];
            $arr[14] = $_POST['field15'];
            $arr[15] = $_POST['field16'];
            $arr[16] = $_POST['field17'];


            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    
          }
          if($countingprosuct=='18'){
                      $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];
            $arr[13] = $_POST['field14'];
            $arr[14] = $_POST['field15'];
            $arr[15] = $_POST['field16'];
            $arr[16] = $_POST['field17'];
            $arr[17] = $_POST['field18'];
        


            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    
          }
          if($countingprosuct=='19'){
                      $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];
            $arr[13] = $_POST['field14'];
            $arr[14] = $_POST['field15'];
            $arr[15] = $_POST['field16'];
            $arr[16] = $_POST['field17'];
            $arr[17] = $_POST['field18'];
            $arr[18] = $_POST['field19'];


            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    
          }
          if($countingprosuct=='20'){
                      $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];
            $arr[13] = $_POST['field14'];
            $arr[14] = $_POST['field15'];
            $arr[15] = $_POST['field16'];
            $arr[16] = $_POST['field17'];
            $arr[17] = $_POST['field18'];
            $arr[18] = $_POST['field19'];
            $arr[19] = $_POST['field20'];
    

            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    
          }
          if($countingprosuct=='21'){
                      $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];
            $arr[13] = $_POST['field14'];
            $arr[14] = $_POST['field15'];
            $arr[15] = $_POST['field16'];
            $arr[16] = $_POST['field17'];
            $arr[17] = $_POST['field18'];
            $arr[18] = $_POST['field19'];
            $arr[19] = $_POST['field20'];
            $arr[20] = $_POST['field21'];


            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    
          }
          if($countingprosuct=='22'){
                      $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];
            $arr[13] = $_POST['field14'];
            $arr[14] = $_POST['field15'];
            $arr[15] = $_POST['field16'];
            $arr[16] = $_POST['field17'];
            $arr[17] = $_POST['field18'];
            $arr[18] = $_POST['field19'];
            $arr[19] = $_POST['field20'];
            $arr[20] = $_POST['field21'];
            $arr[21] = $_POST['field22'];
      


            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    
          }
          if($countingprosuct=='23'){
                      $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];
            $arr[13] = $_POST['field14'];
            $arr[14] = $_POST['field15'];
            $arr[15] = $_POST['field16'];
            $arr[16] = $_POST['field17'];
            $arr[17] = $_POST['field18'];
            $arr[18] = $_POST['field19'];
            $arr[19] = $_POST['field20'];
            $arr[20] = $_POST['field21'];
            $arr[21] = $_POST['field22'];
            $arr[22] = $_POST['field23'];


            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    
          }
          if($countingprosuct=='24'){
                      $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];
            $arr[13] = $_POST['field14'];
            $arr[14] = $_POST['field15'];
            $arr[15] = $_POST['field16'];
            $arr[16] = $_POST['field17'];
            $arr[17] = $_POST['field18'];
            $arr[18] = $_POST['field19'];
            $arr[19] = $_POST['field20'];
            $arr[20] = $_POST['field21'];
            $arr[21] = $_POST['field22'];
            $arr[22] = $_POST['field23'];
            $arr[23] = $_POST['field24'];


            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    
          }
          if($countingprosuct=='25'){
                      $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];
            $arr[13] = $_POST['field14'];
            $arr[14] = $_POST['field15'];
            $arr[15] = $_POST['field16'];
            $arr[16] = $_POST['field17'];
            $arr[17] = $_POST['field18'];
            $arr[18] = $_POST['field19'];
            $arr[19] = $_POST['field20'];
            $arr[20] = $_POST['field21'];
            $arr[21] = $_POST['field22'];
            $arr[22] = $_POST['field23'];
            $arr[23] = $_POST['field24'];
            $arr[24] = $_POST['field25'];


            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    
          }
          if($countingprosuct=='26'){
                      $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];
            $arr[13] = $_POST['field14'];
            $arr[14] = $_POST['field15'];
            $arr[15] = $_POST['field16'];
            $arr[16] = $_POST['field17'];
            $arr[17] = $_POST['field18'];
            $arr[18] = $_POST['field19'];
            $arr[19] = $_POST['field20'];
            $arr[20] = $_POST['field21'];
            $arr[21] = $_POST['field22'];
            $arr[22] = $_POST['field23'];
            $arr[23] = $_POST['field24'];
            $arr[24] = $_POST['field25'];
            $arr[25] = $_POST['field26'];


            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    
          }
          if($countingprosuct=='27'){
                      $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];
            $arr[13] = $_POST['field14'];
            $arr[14] = $_POST['field15'];
            $arr[15] = $_POST['field16'];
            $arr[16] = $_POST['field17'];
            $arr[17] = $_POST['field18'];
            $arr[18] = $_POST['field19'];
            $arr[19] = $_POST['field20'];
            $arr[20] = $_POST['field21'];
            $arr[21] = $_POST['field22'];
            $arr[22] = $_POST['field23'];
            $arr[23] = $_POST['field24'];
            $arr[24] = $_POST['field25'];
            $arr[25] = $_POST['field26'];
            $arr[26] = $_POST['field27'];



            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    
          }
          if($countingprosuct=='28'){
                      $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];
            $arr[13] = $_POST['field14'];
            $arr[14] = $_POST['field15'];
            $arr[15] = $_POST['field16'];
            $arr[16] = $_POST['field17'];
            $arr[17] = $_POST['field18'];
            $arr[18] = $_POST['field19'];
            $arr[19] = $_POST['field20'];
            $arr[20] = $_POST['field21'];
            $arr[21] = $_POST['field22'];
            $arr[22] = $_POST['field23'];
            $arr[23] = $_POST['field24'];
            $arr[24] = $_POST['field25'];
            $arr[25] = $_POST['field26'];
            $arr[26] = $_POST['field27'];
            $arr[27] = $_POST['field28'];


            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    
          }
          if($countingprosuct=='29'){
                      $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];
            $arr[13] = $_POST['field14'];
            $arr[14] = $_POST['field15'];
            $arr[15] = $_POST['field16'];
            $arr[16] = $_POST['field17'];
            $arr[17] = $_POST['field18'];
            $arr[18] = $_POST['field19'];
            $arr[19] = $_POST['field20'];
            $arr[20] = $_POST['field21'];
            $arr[21] = $_POST['field22'];
            $arr[22] = $_POST['field23'];
            $arr[23] = $_POST['field24'];
            $arr[24] = $_POST['field25'];
            $arr[25] = $_POST['field26'];
            $arr[26] = $_POST['field27'];
            $arr[27] = $_POST['field28'];
            $arr[28] = $_POST['field29'];

            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where `value of user product`.Product_ID=$productid and `value of user product`.User_ID=$loginuser_id and`value of user product`.Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
    
          }
          if($countingprosuct=='30'){
            $arr[0] = $_POST['field1'];
            $arr[1] = $_POST['field2'];
            $arr[2] = $_POST['field3'];
            $arr[3] = $_POST['field4'];
            $arr[4] = $_POST['field5'];
            $arr[5] = $_POST['field6'];
            $arr[6] = $_POST['field7'];
            $arr[7] = $_POST['field8'];
            $arr[8] = $_POST['field9'];
            $arr[9] = $_POST['field10'];
            $arr[10] = $_POST['field11'];
            $arr[11] = $_POST['field12'];
            $arr[12] = $_POST['field13'];
            $arr[13] = $_POST['field14'];
            $arr[14] = $_POST['field15'];
            $arr[15] = $_POST['field16'];
            $arr[16] = $_POST['field17'];
            $arr[17] = $_POST['field18'];
            $arr[18] = $_POST['field19'];
            $arr[19] = $_POST['field20'];
            $arr[20] = $_POST['field21'];
            $arr[21] = $_POST['field22'];
            $arr[22] = $_POST['field23'];
            $arr[23] = $_POST['field24'];
            $arr[24] = $_POST['field25'];
            $arr[25] = $_POST['field26'];
            $arr[26] = $_POST['field27'];
            $arr[27] = $_POST['field28'];
            $arr[28] = $_POST['field29'];
            $arr[29] = $_POST['field30'];
           


            $field40 = $_POST['field40'];
            $field41 = $_POST['field41'];
            $field42 = $_POST['field42'];

            
            $rs1 = mysqli_query($conn, $sql1);

  
            if (mysqli_num_rows($rs1) > 0) {
              $sql6="DELETE FROM  `list of customer product` where product_ID=$productid and User_ID=$loginuser_id";
              mysqli_query($conn, $sql6);              
       
                $sql4="INSERT INTO `list of customer product` VALUES('',$loginuser_id,$productid,'$field40','$field41','$field42',NULL,NULL,NULL,NULL,NULL)";
            $rsinsert = mysqli_query($conn, $sql4);
            $i=0;
                while($row = mysqli_fetch_assoc($rs1)) {
                    $a=$row["new"];
          
                  $sqldel="DELETE FROM `value of user product` where Product_ID=$productid and User_ID=$loginuser_id and Name_ID=$a";
                  $rsdel = mysqli_query($conn, $sqldel);
                    $sqlp="INSERT Into `value of user product`(ID,User_ID, Product_ID, Name_ID, valuep) VALUES ('', $loginuser_id,$productid,$a,'$arr[$i]')";
                  mysqli_query($conn,$sqlp);
          
                    ++$i;
                }
              }
              $arr = array();
                     

          }







              header("Location: http://localhost/educativeform/list.php?id=" .  $parentid);
      
  



?>
 