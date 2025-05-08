<?php
   $host = "localhost";
   $username1 = "root";
   $password1 = "";
   $dbname = "checklist";


   $con = mysqli_connect($host, $username1, $password1, $dbname);

   // to ensure that the connection is made
   if (!$con)
   {
       die("Connection failed!" . mysqli_connect_error());
   }
     
?>