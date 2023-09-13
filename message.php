 <?php
        session_start();
        require("conf.php");
   
        $un = $_SESSION['user_name'];
        $sql_id = "select user_id from user where u_name ='$un' ";
              $result = mysqli_query($conn, $sql_id);
               $rowid = mysqli_fetch_assoc($result);
                $usid = $rowid['user_id'];
    ?>
<!DOCTYPE html>
<html>
<head>
  <title>Find Jobs in Ethiopia</title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
   <link rel="stylesheet" type="text/css" href="css/tb.css">
<link rel="stylesheet" type="text/css" href="css/mainu.css">
</head>
<body>
  <!-- nav -->
 <div class="topnav">
  <a href="logout.php">Logout</a>
   <a href="#about">About</a>
   <a href="profile.php">Profile</a>
   <a class="active" href="home.php">Home</a>
   </div><br>
       
     
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
        <form method="post" action="" >
          <div class="input-group">
            <input class="form-control" type="text" name="content" placeholder="search by job title..."required>
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
              <p>all letest message!!!</p>
            </div>
           <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>SUBJECT</th>
        <th>MESSAGE</th>
        <th>SENDER</th>
        <th>ACTIONS</th>
        
        
      </tr>
    </thead>
    <tbody>
      <?php
        require("conf.php");
        $sql = "SELECT * FROM message where user_id = '$usid'  ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=mysqli_fetch_assoc($result)){
          echo "
      <tr>
        <th>$row[id]</th>
        <td>$row[subject]</td>
        <td>$row[message]</td>
        <td>$row[sender]</td>
       
        <td>
                  
                  <a class='btn btn-danger' href='delete.php?id=$row[id]'>Delete</a>
                </td>
      </tr>
      ";
        }
      ?>
    </tbody>
  </table>
         
            
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




  <!-- footer -->
  <footer>

    <p>Author: Tewodros Shimels<br>
  <a href="tedygreat@gmail.com">Email Address :tedygreat@gmail.com</a></p>
    
  </footer> 
</body>
</html>