
<?php 
include "config.php";






if (isset($_GET['id'])) {
    $user_id = $_GET['id']; 
    $sql = "SELECT * FROM `list of customer product` WHERE Customer_Product_ID='$user_id'";
    $result = $conn->query($sql); 
    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $Price = $row['Price'];
            $Warranty_code = $row['Warranty_code'];
            $Store_ID = $row['Store_ID'];
            $Dates  = $row['Dates'];
            $Addressu = $row['Addressu'];

        } 
    ?>
        <link rel="stylesheet" href="./css/navigationbar.css">
      <link rel="stylesheet" href="./css/bedroom.css">
    <link rel="stylesheet" href="./css/font.css"> 
    <title>خریداری شده  </title>
    <link rel="stylesheet"
          href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
   hr{
      height: 2px;
      background-color: #bfbeb9;
      border: none;
      width: 1150px;
      margin-left: 120px;
  }
  .collapsible {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 1280px;
    height: 150px;
    border: none;
    outline: none;
    font-size: 15px;
  margin-top: 20px;
  margin-left: 35px;
  margin-right: 25px;
  font-family: "Bnazanin";
  font-size: 40px;
  text-align: right;
  padding-right: 210px;
  font-weight: 700;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  background-image: url
  }
  
  /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
  .active, .collapsible:hover {
    background-color: #ccc;
  
  }
  .search input[type=text]{
    width:300px;
    height:25px;
    border-radius:25px;
    border: none;
    padding-right: 10px;
    font-family: "Bnazanin";
 }
     
 .search{
    float:right;
    margin:1px;
    
 }
     
 .search button{
    background-color: transparent;
    color: #f2f2f2;
    float: right;
    padding: 2px 4px;
    font-size: 13px;
    border: none;
    cursor: pointer;
 }
  
  </style>
<body>
<?php    
   $loginuser_id = $_GET['id'];
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
          ?>

<?php
if (isset($_GET['id'])) {
  $user_id = $_GET['id'];


  $sql6 = "SELECT * FROM `product` WHERE Product_ID=(SELECT product_ID FROM `list of customer product` WHERE `Customer_Product_ID`='$user_id' )";
  
  $c = $conn->query($sql6);
  if (mysqli_num_rows($c) > 0) {
  
      while($row6 = mysqli_fetch_assoc($c)) {
  
  
          $productname=$row6["Product_Name"];
      
      }
  
    }




}

?>

<nav class="navbar" id="topNav">
    <!-- LOGO -->
    <a href="homepageLogin.php?id="<?php echo $loginuser_id ?>"><div class="logo"><img src="./photo/logo4.png" style="width:35px;margin-left:15px;"></div></a>
    <div class="loginimg"><a href="profile.php"><img src="./photo/person.png"style="width:5%; margin-right:25px;"></a></div>
    <div class="search">
      <form action="search.php" method="GET">
          <input type="text"
                 placeholder="جستجو"dir="rtl"
                 id="search"
                 name="search"   >
          <button>
              <i class="fa fa-search"
                 style="font-size: 18px;">
              </i>
          </button>
      </form>
  </div>
    <!-- NAVIGATION MENU -->
    <ul class="nav-links">

      <!-- USING CHECKBOX HACK -->
      <input type="checkbox" id="checkbox_toggle" />
      <label for="checkbox_toggle" class="hamburger">&#9776;</label>

      <!-- NAVIGATION MENUS -->
      <div class="menu">

        <li><a href="about.php">درباره ما</a></li>

        <li><a href="userstore.php">فروش</a></li>
        <li class="services">
          <a href="./homepageLogin.php?id="<?php echo $loginuser_id ?>">دسته بندی کالا</a>

          <!-- DROPDOWN MENU -->
          
          <ul class="dropdown" >
            <?php
          $sql="SELECT  * FROM `parent group`";
$rs=mysqli_query($conn, $sql);
if (mysqli_num_rows($rs) > 0) {

    while($row2 = mysqli_fetch_assoc($rs)) {
        $counter=$row2["Parent_ID"];
       $name =$row2["Parent_Name"];?>
            <li><a href="list.php?id=<?php echo $counter;?>"style="font-size: 17px;"><?php echo $name;?></a></li>
   
   <?php }
}?>       
          
          
          
          
          </ul>

        </li>

        <li><a href="./homepageLogin.php?id="<?php echo $loginuser_id ?>">خانه</a></li>
      </div>
    </ul>
  </nav> 




    <form action="buysubmit.php?id=<?php echo $user_id;?>" method="post" class="form-style-9" style="margin-top:50px;" >
          <fieldset>
          <legend style="float:right; font-size:30px; font-weight:700;margin-right:20px;"><?php    echo $productname;       ?></legend><br><br>
          <ul>
                <li>
                <label for="f0"  style="float: right;direction:rtl;">قیمت</label>
            <input type="text" style="direction:rtl;" name="Price" id="Price"  class="field-style field-split align-right " value="<?php echo $Price; ?>" />
            
             <label for="f1"  style="float: right;">گارانتی</label>
            <input type="text" style="direction:rtl;" name="Warranty_code" id="Warranty_code" class="field-style field-split align-right " value="<?php echo $Warranty_code; ?>" />
           
       
 
            <div class="card col-md-8">
									      <div class=" col-md-8">
									        <label for="f2" style="float: right;">نام فروشگاه </label>
									        <div class="">
									          <select name="Store_ID" style="width: 20%; padding: 0.375rem 0.75rem; float: right;   border-color: #ced4da;">
									            <option value=""style="direction: rtl;">نام فروشگاه  را انتخاب کنید </option>
									            <?php $query=mysqli_query($conn,"SELECT * From `store`");
									            while($row=mysqli_fetch_array($query))
									            { 
                                if($Store_ID== $row['Store_ID']){ ?>
                                  <option style="direction: rtl; font-family:'Bnazanin';  font-size:17px;"selected value="<?php echo $row['Store_ID'];?>"><?php echo $row['Title'];?></option>
                                    <?php							             
                                      }
                                      else{
									              ?>
                      
									              <option style="direction:rtl; font-family='Bnazanin'; font-size:15px;"value="<?php echo $row['Store_ID'];?>"><?php echo $row['Title'];?></option>
									              <?php }
									            } ?>
									          </select>
									        </div>
									      </div>
                                            </div>

           
            
            
            
            
            
            
            
            
            
            
            
            <label for="f3"  style="float: right;">تاریخ</label>
            <input type="date" name="Dates" id= "Dates"class="field-style field-split align-right " value="<?php echo $Dates; ?>"/>
            
    </li>
    <li>
    <label for="f4"  style="float: right;">آدرس</label>
            <input type="text" style="direction:rtl;" name="Addressu" class="field-style field-full align-right " value="<?php echo $Addressu; ?>"/>
         
    </li>
    <li  style="margin-left:30px;">
                <input type="submit" value="بازگشت" name="back" style="font-family: 'Bnazanin'; font-size:17px; ">
   
            <input type="submit" value="ذخیره" name="update" style="font-family: 'Bnazanin'; font-size:17px; ">

          </li>
        </ul>

          </fieldset>
        </form> 
        </body>
        </html> 
    <?php
    } else{ 
        header('Location: view.php');
    } 
}
?> 