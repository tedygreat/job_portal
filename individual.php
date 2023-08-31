 <?php
  session_start();
    $un = $_SESSION['user_name'];
  ?>
<!DOCTYPE html>
<html lang="en">
<head> 
  <title>JOB PORTAL</title>
   <link rel="stylesheet" type="text/css" href="css/common.css">
  
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/mainu.css">
     <link rel="stylesheet" type="text/css" href="css/tb.css">
</head>
<body>
  <header>
   <div class="topnav">
   <a href="#about">About</a>
   <a href="#contact">Contact</a>
   <a href="user_info.html">Detail</a>
   <a class="active" href="home.php">Home</a>
   </div>
  </header>
  
  <h2>HTML Table</h2>

<table>
  <?php

  require("conf.php");
   
  $sql_id = "select * from user where u_name ='$un' ";
              $result = mysqli_query($conn, $sql_id);
               $row1 = mysqli_fetch_assoc($result);

  $sql_info = "select * from user_info where u_id = '$row1[user_id]'";
              $result1 = mysqli_query($conn, $sql_info);
               $row = mysqli_fetch_assoc($result1);

               

  echo "
  
      <tr>
     <tr><th>First Name</th><td>$row[f_name]</td> </tr>
    <tr> <th>Last Name</th>    <td>$row[l_name]</td> </tr>
    <tr> <th>Birth place</th><td>$row[b_place]</td>
    <tr><th>Nationality</th><td>$row[nationality]</td> </tr>
    <tr> <th>Marital status</th>    <td>$row[m_status]</td> </tr>
    <tr> <th>Current Address</th><td>$row[c_address]</td>
    <tr><th>Phone number</th><td>$row[phone]</td> </tr>
    <tr> <th>Email</th>    <td>$row[email]</td> </tr>
    <tr> <th>Sex</th><td>$row[sex]</td>
    <tr> <th>Educational Background</th><td>$row[e_background]</td>
    <tr> <th>Work Experience</th><td>$row[w_exprience]</td>
     <tr> <th>Work Experience</th><td><a  href='user_info.php' >Edit</a></td>
  </tr>
 ";
 ?>

</table>
<h4>do you want to edit your persenal information ?</h4>
  <button ><a  href='' style="color: #FFFFFF; text-decoration: none; ">Edit</a></button>
  
  <footer>

  <p>Author: Tewodros Shimels<br>
  <a href="tedygreat@gmail.com">Email Address :tedygreat@gmail.com</a></p>
    
  </footer> 
</body>