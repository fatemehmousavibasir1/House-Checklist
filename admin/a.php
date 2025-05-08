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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bedroom.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/navigationbar.css">


    <title>Home Page</title>
   <style>
   	input{
   	    margin: 8px;
   	}
   </style>
   </head>

<body>

   <li style="padding-top:100px"></li>

<form class="form-style-9" action="updategroups.php" method="post" style=>
   <ul>
   <li>
               <label for="name" style="float: right;">نام محصول </label> <input type="text" name="name" id="name" class="field-style field-split align-right "  />
               <div class="card col-md-8">
									      <div class=" col-md-8">
									        <label for="namep" style="float: right;">دسته بندی </label>
									        <div class="">
									          <select name="namep" style="width: 20%; padding: 0.375rem 0.75rem; float: right;   border-color: #ced4da;">
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
									        <label for="nameg" style="float: right;">گروه</label>
									        <div class="">
									          <select name="nameg" style="width: 20%; padding: 0.375rem 0.75rem; float: right;   border-color: #ced4da;">
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
     <li>
            <input type="submit" value="ذخیره" id="submit"name="submit" />
            </li> 
               </ul>
            </form>
            </div>

</div>
	<div id='input-cont'>
        <!--Input container-->
    </div>
    
    <button onclick='addInput()'>افزودن+</button>
    <span id="demo"></span>
    
    <?php

   


  ?>  <script>
        const container = document.getElementById('input-cont');
        
        // Call addInput() function on button click
        function addInput(){
            const x = new Array()
            let input = document.createElement('input');
            input.placeholder = 'نام ویژگی';
            input. id = "propname";
            input. name = "propname";
            container.appendChild(input);
            x.push(document.getElementById("propname").value);
           document.getElementById("demo").innerHTML = x;

           
        }
    </script>
  
  
