  <?php

        session_start();
        require("conf.php");
         $un = $_SESSION['user_name'];
        $sql_id = "select user_id from user where u_name ='$un' ";
              $result = mysqli_query($conn, $sql_id);
               $row = mysqli_fetch_assoc($result);
                $_SESSION['id'] = $row["user_id"];
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
   <a href="#about">About</a>
   <a href="logout.php">Logout</a>
  
   <a class="active" href="home.php">Home</a>
   </div>
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
  $sql_info = "SELECT * FROM job_applide WHERE user_id = '$_SESSION[id]'";
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
  
        <!-- ./post form -->

        <!-- feed -->
        <div>
          <!-- post -->
          <div class="panel panel-default">
            <div class="panel-body">
              <p>you can edit your personal information </p>
            </div>
          
          
              <table style="width: 100%;" class="tel">
  

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
     <tr> <th>you can edit your personal information</th><td><a  href='editinfo.php' ><button>Edit</button></a></td>
  </tr>
 ";
 ?>

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
                  
          <form action="login.php" method="post"  enctype="multipart/form-data">
          <label for="choosefile">Upload cv a file :</label>
          <input type="file" id="choosefile" name="choosefile"required><br>
          <label for="choosefile1">Upload experence file :</label>
          <input type="file" id="choosefile1" name="choosefile1" required><br>
          <label for="choosefile2">Upload recommendation  file :</label>
          <input type="file" id="choosefile2" name="choosefile2" required><br>
          <label for="choosefile3">Upload other file :</label>
          <input type="file" id="choosefile3" name="choosefile3" required><br>
           <input type="submit" name="btn_img1" >
            </form>
          </div>
        </div>
        <!-- ./add friend -->

        <!-- friends -->
      
        <!-- ./friends -->

       <div class="panel panel-default">
          <div class="panel-body">
            
                  <h4> documents </h4>
 <table>


   <tr>
    <th>cv</th>
    <th>reco</th>
    <th>expe</th>
    <th>other</th>
    
  </tr>

            <?php
          require("conf.php");
          $sql_info = "SELECT * FROM upload WHERE user_id = '$_SESSION[id]'";
           $result1 = mysqli_query($conn, $sql_info);
            while($fetch = mysqli_fetch_assoc($result1))
            {
                echo "";

                ?>

                <tr>
                    
                    <!--<td><img src="./image/<?php echo $fetch['image'] ?>" width=100px alt=""></td> -->
                    <td><a href ="asset/file/<?php echo $fetch['cv'] ?>"><?php echo $fetch['cv'] ?></a></td>
                    <td><a href ="asset/file/<?php echo $fetch['recommendation'] ?>"><?php echo $fetch['recommendation'] ?></a></td>
                    <td><a href ="asset/file/<?php echo $fetch['expereince'] ?>"><?php echo $fetch['expereince'] ?></a></td>
                    
                    <td><a href ="asset/file/<?php echo $fetch['other'] ?>"><?php echo $fetch['other'] ?></a></td>
                </tr>



                <?php
                "";
            } 
            ?>


</table>
          </div>
        </div>
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