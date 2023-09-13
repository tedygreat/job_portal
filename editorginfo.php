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
            $org_id ="";
            $o_name = "";
            $o_type = "";
            $location = "";
            $phone = "";
            $po_box = "";
            $email = "";
            $website = "";  
            

    
      $sql_info1 = "select * from company where user_id='$_SESSION[id]'";
      $result2 = mysqli_query($conn, $sql_info1);
      $row = mysqli_fetch_assoc($result2);
     
    $org_id =$row["org_id"];
    $o_name = $row["o_name"];
    $o_type = $row["o_type"];
    $location = $row["location"];
    $phone = $row["phone"];
    $po_box = $row["po_box"];
    $email = $row["email"];
    $website = $row["website"];     
    

?>
<?php     if(isset($_POST["ursubmit"])) {
              $un = $_SESSION['user_name'];
            $o_name = $_POST["name"];
            $o_type = $_POST["org_type"];
            $location = $_POST["location"];
            $phone = $_POST["phone"];
            $po_box = $_POST["po_box"];
            $email = $_POST["emaile"];
            $website = $_POST["website"];     
            

            $sql_update = "UPDATE company SET o_name ='$o_name',o_type ='$o_type', location ='$location',phone ='$phone', po_box='$po_box',email='$email ', website='$website' WHERE org_id = ' $org_id'";
              mysqli_query($conn, $sql_update);
              echo '<script>
                    alert(" info Updated");
                    window.location="home1.php";
                </script>';
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
      <a href="logout.php">Logout</a>
   <a href="#about">About</a>

   
   <a class="active" href="home1.php">Home</a>
   </div>
  <!-- ./nav -->

  <!-- main -->
  <main class="container"><br>
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
    <th>Applied person</th>
    
  </tr>
   <?php

  require("conf.php");
   $sql_q = "SELECT * FROM company WHERE user_id = '$_SESSION[id]'";
   $result11 = mysqli_query($conn, $sql_q);
             $row11 = mysqli_fetch_assoc($result11);
             $org_id = $row11['org_id'];

  $sql_info = "SELECT * FROM  vacancy WHERE org_id = '$org_id'";
              $result1 = mysqli_query($conn, $sql_info);
            
            



              if(!$result1){
          die("Invalid query!");
        }
        while($row1 = mysqli_fetch_assoc($result1))
        {
            $vac_id = $row1['vac_id'];
           $sql1 = "SELECT COUNT(app_id) AS count FROM job_applide WHERE org_id = '$org_id' AND vac_id = '$vac_id'";
              $result = mysqli_query($conn, $sql1);
             $row = mysqli_fetch_assoc($result);
               $count = $row['count'];

  echo "
  <tr>
    <td>$row1[vac_id]</td>
    <td>$row1[job_title]</td>
    <td>$row[count]</td>
    
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
      <input type="text" readonly="readonly" id="id" name="id" value="<?php echo  $org_id; ?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">Organisation Name</label>
    </div>
    <div class="col-75">
    <input type="text" id="name" name="name" value="<?php echo $o_name; ?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Organisation Type</label>
    </div>
    <div class="col-75">
      <input type="text" id="org_type" name="org_type" value="<?php echo $o_type; ?>">
    </div>
  </div>
      <div class="row">
    <div class="col-25">
      <label for="location">Main office location</label>
    </div>
    <div class="col-75">
      <input type="text" id="location" name="location" value="<?php echo $location; ?>">
    </div>
  </div>
    <div class="row">
    <div class="col-25">
      <label for="phone">Office Phone Number</label>
    </div>
    <div class="col-75">
      <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>">
    </div>
  </div>
    <div class="row">
    <div class="col-25">
      <label for="Bplace">PO Boxe</label>
    </div>
    <div class="col-75">
      <input type="text" id="po_box" name="po_box" value="<?php echo $po_box; ?>">
    </div>
  </div>
    <div class="row">
    <div class="col-25">
      <label for="Nationality">Email Address</label>
    </div>
    <div class="col-75">
      <input type="text" id="emaile" name="emaile"value="<?php echo $email; ?>">
    </div>
  </div>

    <div class="row">
    <div class="col-25">
      <label for="Caddress">Website</label>
    </div>
    <div class="col-75">
      <input type="text" id="website" name="website" value="<?php echo $website; ?>">
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
 
        <!-- ./add friend -->

        <!-- friends -->
      
        <!-- ./friends -->

     
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