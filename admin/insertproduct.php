<?php
$host = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "checklist";

$conn = mysqli_connect($host, $username1, $password1, $dbname);


?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>


<link rel="stylesheet" href="../css/bedroom.css">
<link rel="stylesheet" href="../css/font.css">
<link rel="stylesheet" href="../css/navigationbar.css">
<link rel="stylesheet" href="./buttom.css">


    <title>افزودن محصول</title>
   <style>
   	input{
   	    margin: 8px;
   	}
   </style>
   </head>
   
   <nav class="navbar" >
      <!-- LOGO -->
      <div class="logo"><img src="../photo/logo4.png" style="width:35px;margin-left:15px;"></div>
      <div style=" margin-right: 42%;"><a href="./adminprofile.php" ><img src="../photo/person.png"style="width:8%; float:left; padding-right:10px;"></a></div>
      
      <!-- NAVIGATION MENU -->
      <ul class="nav-links">
  
        <!-- USING CHECKBOX HACK -->
        <input type="checkbox" id="checkbox_toggle" />
        <label for="checkbox_toggle" class="hamburger">&#9776;</label>
  
        <!-- NAVIGATION MENUS -->
        <div class="menu">
  
          <li><a href="./aboutus.php">درباره ما</a></li>


          <li><a href="mainpage.php">خانه</a></li>
        </div>
      </ul>
    </nav> 


   <li style="padding-top:100px"></li>
   <form name="FormData" class="form-style-9" action="insertproducts.php" method="post" style=>
   <ul>
   <li>
   <label for="name" style="float: right;margin-top:10px;">نام محصول </label> <input style="direction:rtl;" type="text" name="name" id="name" class="field-style field-split align-right "  />
               <div class="card col-md-8">
									      <div class=" col-md-8">
									        <label for="namep" style="float: right; margin-top:10px;">دسته بندی </label>
									        <div class="">
									          <select  class="field-style field-split align-right"name="namep" style="width: 20%;padding-left:5px;float: right; margin-top:10px;  border-color: #ced4da;">
									            <option value=""style="font-family:'Bnazanin';direction: rtl;">دسته محصول را انتخاب کنید </option>
									            <?php $query=mysqli_query($conn,"SELECT * From `parent group`");
									            while($row=mysqli_fetch_array($query))
									            { 
                                                    ?>
									               <option style="direction: rtl; font-family:'Bnazanin';  font-size:17px;" value="<?php echo $row['Parent_ID'];?>"><?php echo $row['Parent_Name'];?></option>
	                                             <?php
                               
									           }
                                                 ?>
									          </select>
									        </div>
									      </div>
     </div>


     <div class="card col-md-8">
									      <div class=" col-md-8">
									        <label for="nameg" style="float: right; margin-top:10px; padding-left:5px;">گروه</label>
									        <div class="">
									          <select  class="field-style field-split align-right" name="nameg" style="width: 20%; float: right;  margin-top:10px; border-color: #ced4da; padding-right">
									            <option value=""style="direction: rtl;font-family:'Bnazanin';">گروه محصول را انتخاب کنید </option>
									            <?php $query=mysqli_query($conn,"SELECT * From `product group`");
									            while($row=mysqli_fetch_array($query))
									            { 
                                                    ?>
									              <option style="direction: rtl; font-family:'Bnazanin';  font-size:17px;" value="<?php echo $row['Product_Group_ID'];?>"><?php echo $row['Group_Name'];?></option>
	                                              
                                                  
                                                   <?php							             
                                                     }
                                               
                                                 ?>
									          </select>
									        </div>
									      </div>
     </div>
     <br> <br>
<div class="wrapper">
<input type="text" name="input_array_name[]" placeholder="نام ویژگی"class="field-style field-split align-right" style="direction:rtl;"/><br /><br>
</div>

<p style="font-family='Bnazanin';"><button class="add_fields button-8" style="float:right; font-family='Bnazanin';" role="button">افزودن ویژگی</button></p>
<li  style="margin-left:30px;">
                <input type="submit" value="بازگشت" name="back" style="font-family: 'Bnazanin'; font-size:17px; ">
   
            <input type="submit" value="ذخیره" name="update" style="font-family: 'Bnazanin'; font-size:17px; ">

          </li>
               </ul>
            </form>
            </div>

</div>
</form>

<br />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
//Add Input Fields
$(document).ready(function() {
    var max_fields = 30; //Maximum allowed input fields 
    var wrapper    = $(".wrapper"); //Input fields wrapper
    var add_button = $(".add_fields"); //Add button class or ID
	var x = 1; //Initlal input field is set to 1
	
	//When user click on add input button
	$(add_button).click(function(e){
        e.preventDefault();
		//Check maximum allowed input fields
        if(x < max_fields){ 
            x++; //input field increment
			 //add input field
            $(wrapper).append('<div><input type="text" class="field-style field-split align-right" style="direction:rtl;"name="input_array_name[]" placeholder="نام ویژگی" /> <a href="javascript:void(0);"  class="remove_field ">حذف</a><br><br></div>');
        }
    });
	
    //when user click on remove button
    $(wrapper).on("click",".remove_field", function(e){ 
        e.preventDefault();
		$(this).parent('div').remove(); //remove inout field
		x--; //inout field decrement
    })
});
</script>
</body>
</html>

