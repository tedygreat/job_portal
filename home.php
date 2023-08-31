  <?php
        session_start();
    ?>
<!DOCTYPE html>
<html>
<head>
  <title>Find Jobs in Ethiopia</title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
   <link rel="stylesheet" type="text/css" href="css/tb.css">

</head>
<body>
  <!-- nav -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
   
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.php">Home</a></li>
        <li><a href="individual.php">Profile</a></li>
        <li><a href="#">Logout</a></li>
      </ul>
    </div>
  </nav>
  <!-- ./nav -->

  <!-- main -->
  <main class="container">
    <div class="row">
      <div class="col-md-3">
        <!-- profile brief -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>Welcome to Job Portal </h4>
            <p>            <?php
              
              
              if((isset($_SESSION['user_name']))&&($_SESSION['user_name']!="")){
                echo " HELLO  ".$_SESSION['user_name'];
              }
              
           
            ?>
            </p>
          </div>
        </div>
        <!-- ./profile brief -->

        <!-- friend requests -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>Applyed Jobes</h4>
          <table>
  <tr>
    <th>Vacancy Number</th>
    <th>Job Title</th>
    <th>Applyed Date</th>
    
  </tr>
   <?php

  require("conf.php");
   $un = $_SESSION['user_name'];
    $sql_id = "select user_id from user where u_name ='$un' ";
              $result = mysqli_query($conn, $sql_id);
               $row = mysqli_fetch_assoc($result);


  $sql_info = "SELECT * FROM job_applide WHERE user_id = '$row[user_id]'";
              $result1 = mysqli_query($conn, $sql_info);
              if(!$result1){
          die("Invalid query!");
        }
        while($row1 = mysqli_fetch_assoc($result1))
        {

  echo "
  <tr>
    <td>$row1[vac_id]</td>
    <td>$row1[job_title]</td>
    <td>$row1[date]</td>
    
  </tr>
   ";


            
     }
 ?>
</table>
          </div>
        </div>
        <!-- ./friend requests -->
      </div>
      <div class="col-md-6">
        <!-- post form -->
        <form method="post" action="">
          <div class="input-group">
            <input class="form-control" type="text" name="content" placeholder="Make a post...">
            <span class="input-group-btn">
              <button class="btn btn-success" type="submit" name="post">Post</button>
            </span>
          </div>
        </form><hr>
        <!-- ./post form -->

        <!-- feed -->
        <div>
          <!-- post -->
          <div class="panel panel-default">
            <div class="panel-body">
              <p>Hello people! This is my first FaceClone post. Hurray!!!</p>
            </div>
            <div class="panel-footer">
              <span>posted 2017-5-27 20:45:01 by nicholaskajoh</span> 
              <span class="pull-right"><a class="text-danger" href="#">[delete]</a></span>
            </div>
          
              <table style="width: 100%;">
  <?php

  require("conf.php");
   


  $sql_info = "SELECT * FROM vacancy";
              $result = mysqli_query($conn, $sql_info);
              if(!$result){
          die("Invalid query!");
        }
        while($row = mysqli_fetch_assoc($result))
        {

  echo "
  
      <tr>
     <tr><th>Vacancy Number</th><td>$row[vac_id]</td> </tr>
    <tr> <th>Organisation Name</th>    <td>$row[org_name]</td> </tr>
    <tr> <th>Job Title</th><td>$row[job_title]</td>
    <tr><th>Place of Work</th><td>$row[place]</td> </tr>
    <tr> <th>Salary</th>    <td>$row[salary]</td> </tr>
    <tr> <th>Employment Type</th><td>$row[emp_type]</td>
    <tr><th>Registration Start Date</th><td>$row[start_date]</td> </tr>
    <tr> <th>Registration Closed Date</th>    <td>$row[end_date]</td> </tr>
    <tr> <th>Experience</th><td>$row[experience]</td>
    <tr> <th>Qualification</th><td>$row[qualification]</td>
    <tr> <th>Description</th><td>$row[description]</td>
     <tr> <th>Contact Address</th><td>$row[contact_address]</td>
     <tr> <th>Apply here</th><td><a href = 'document.getElementById('myForm').style.display = 'block'' onclick= 'openForm()' >Apply</a></td>
     <tr> <th>----------Tanks----------</th><td>----------Tanks-----------</td>
  </tr>
 
 ";


            
     }
        
 ?>


</table>
<h4>do you want to edit your persenal information ?</h4>
            
          </div>

          <!-- ./post -->
        </div>
        <div style="margin: 70px;"> </div>
        <!-- ./feed -->
      </div>
      <div class="col-md-3">
      <!-- add friend -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>add friend</h4>
            <ul>
              <li>
                <a href="#">alberte</a> 
                <a href="#">[add]</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- ./add friend -->

        <!-- friends -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>friends</h4>
            <ul>
              <li>
                <a href="#">peterpan</a> 
                <a class="text-danger" href="#">[unfriend]</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- ./friends -->
      </div>
    </div>
  </main>
  <!-- ./main -->
<?php
if(isset($_POST["submit"])) {
         
      $un = $_SESSION['user_name'];
      $sql_id = "select user_id from user where u_name ='$un' ";
      $result3 = mysqli_query($conn, $sql_id);
      $row1 = mysqli_fetch_assoc($result3);

      }
?>

<div class="form-popup" id="myForm">
  <form action="#" class="form-container">
    <h1>Apply</h1>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Your Name" value="" name="name" required>

  

    <button type="submit" class="btn" name="submit">Apply</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
  <!-- footer -->
  <footer>

    <p>Author: Tewodros Shimels<br>
  <a href="tedygreat@gmail.com">Email Address :tedygreat@gmail.com</a></p>
    
  </footer> 
</body>
</html>