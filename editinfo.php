  <?php

        session_start();
        require("conf.php");
         $un = $_SESSION['user_name'];
        $sql_id = "select user_id from user where u_name ='$un' ";
              $result = mysqli_query($conn, $sql_id);
               $row = mysqli_fetch_assoc($result);
                $_SESSION['id'] = $row["user_id"];
    ?>

    <?php

    require("conf.php");

    $info_id = "";
    $fname = "";
    $lname = "";
    $bplace = "";
    $nationality = "";
    $mstatus = "";
    $caddress = "";
    $phone = "";     
    $email = "";
    $sex = "";
    $education = "";
    $work = "";
     if($_SERVER["REQUEST_METHOD"]=='GET'){
    
      $sql_info1 = "select * from user_info where u_id='$_SESSION[id]'";
      $result2 = mysqli_query($conn, $sql_info1);
      $row = mysqli_fetch_assoc($result2);
     
    $info_id =$row["info_id"];
    $fname = $row["f_name"];
    $lname = $row["l_name"];
    $bplace = $row["b_place"];
    $nationality = $row["nationality"];
    $mstatus = $row["m_status"];
    $caddress = $row["c_address"];
    $phone = $row["phone"];     
    $email = $row["email"];
    $sex = $row["sex"];
    $education = $row["e_background"];
    $work = $row["w_exprience"];

}

?>
<?php     if(isset($_POST["ursubmit"])) {
             $info_id = $_POST["id"];
           $fname = $_POST["firstname"];
            $lname = $_POST["lastname"];
            $bplace = $_POST["birthplace"];
            $nationality = $_POST["nationality"];
            $mstatus = $_POST["Mstatus"];
            $caddress = $_POST["currentaddress"];
            $phone = $_POST["phone"];     
            $email = $_POST["email"];
            $sex = $_POST["sex"];
            $education = $_POST["education"];
            $work = $_POST["work"];

            $sql_update = "UPDATE user_info SET f_name ='$fname',l_name ='$lname', b_place ='$bplace',nationality ='$nationality', m_status='$mstatus',c_address='$caddress',phone='$phone',email='$email',sex='$sex',e_background='$education',w_exprience='$work' WHERE info_id = '$info_id'";
              mysqli_query($conn, $sql_update);
              echo
                "<script> alert ('wrong password'); </script>";
} ?>
<!DOCTYPE html>
<html>
<head>
  <title>Find Jobs in Ethiopia</title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
   <link rel="stylesheet" type="text/css" href="css/tb.css">
    <link rel="stylesheet" type="text/css" href="css/mainu.css">
      <link rel="stylesheet" type="text/css" href="css/form1.css">
      

</head>
<body>
  <!-- nav -->
    <div class="topnav">
   <a href="#about">About</a>
   <a href="#contact">Contact</a>
   <a href="profile.php">Profile</a>
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
          
          <div class="container1">
  <form action="" method="post">
    <div class="row">
    <div class="col-25">
      <label for="fname">ID</label>
    </div>
    <div class="col-75">
      <input type="text" readonly="readonly" id="id" name="id" value="<?php echo $info_id; ?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">First Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="firstname" value="<?php echo $fname; ?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Last Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="lastname" value="<?php echo $lname; ?>">
    </div>
  </div>
    <div class="row">
    <div class="col-25">
      <label for="Bplace">Birth place</label>
    </div>
    <div class="col-75">
      <input type="text" id="Bplace" name="birthplace" value="<?php echo $bplace; ?>">
    </div>
  </div>
    <div class="row">
    <div class="col-25">
      <label for="Nationality">Nationality</label>
    </div>
    <div class="col-75">
      <input type="text" id="Nationality" name="nationality" value="<?php echo $nationality; ?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="Mstatus">Marital Status</label>
    </div>
    <div class="col-75">
      <select id="Mstatus" name="Mstatus" value="<?php echo $mstatus ?>">
        <option value="" >--Select Marital Status--</option>
        <option value="married">married</option>
        <option value="unmarried">unmarried</option>
      </select>
    </div>
  </div>
    <div class="row">
    <div class="col-25">
      <label for="Caddress">Current Address</label>
    </div>
    <div class="col-75">
      <input type="text" id="Caddress" name="currentaddress" value="<?php echo $caddress; ?>">
    </div>
  </div>
    <div class="row">
    <div class="col-25">
      <label for="Pnumber">Phone number </label>
    </div>
    <div class="col-75">
      <input type="text" id="Pnumber" name="phone" value="<?php echo $phone; ?>">
    </div>
  </div>
    <div class="row">
    <div class="col-25">
      <label for="email">Email</label>
    </div>
    <div class="col-75">
      <input type="text" id="email" name="email" value="<?php echo $email; ?>">
    </div>
  </div>
   <div class="row">
    <div class="col-25">
      <label for="Sex">Sex</label>
    </div>
    <div class="col-75">
      <select id="sex" name="sex" value="<?php echo $sex; ?>">
        <option value="" >--Select Sex--</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        
      </select>
    </div>
  </div>
     
     
  <div class="row">
    <div class="col-25">
      <label for="education">Educational Background</label>
    </div>
    <div class="col-75">
      <textarea id="education" name="education" value="" style="height:100px"><?php echo $education; ?></textarea>
    </div>
  </div>
    <div class="row">
    <div class="col-25">
      <label for="work">Work Experience</label>
    </div>
    <div class="col-75">
      <textarea id="work" name="work" value="" style="height:100px"><?php echo $work; ?></textarea>
    </div>
  </div>
  <br>
  <div class="row">
    <input type="submit" value="Submit" name="ursubmit" id="ursubmit">
  </div>
  </form>
</div>  
            
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