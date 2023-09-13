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

    if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location:crud100/index.php");
      exit;
    }
    $id = $_GET['id'];
          $sql_info = "SELECT * FROM upload WHERE user_id = ' $id'";
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
              <p>you can message to a personal </p>
            </div>
          
          
              <table style="width: 100%;" class="tel">
  

  <?php

  require("conf.php");
    if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location:crud100/index.php");
      exit;
    }
    $id = $_GET['id'];
   


  $sql_info = "select * from user_info where u_id = '$id'";
              $result1 = mysqli_query($conn, $sql_info);
               $row = mysqli_fetch_assoc($result1);

        echo "";

                ?>        

  
      <tr>
     <tr><th>First Name</th><td><?php echo $row['f_name'] ?></td> </tr>
    <tr> <th>Last Name</th>    <td><?php echo $row['l_name'] ?></td> </tr>
    <tr> <th>Birth place</th><td><?php echo $row['b_place'] ?></td>
    <tr><th>Nationality</th><td><?php echo $row['nationality'] ?></td> </tr>
    <tr> <th>Marital status</th>    <td><?php echo $row['m_status'] ?></td> </tr>
    <tr> <th>Current Address</th><td><?php echo $row['c_address'] ?></td>
    <tr><th>Phone number</th><td><?php echo $row['phone'] ?></td> </tr>
    <tr> <th>Email</th>    <td><?php echo $row['email'] ?></td> </tr>
    <tr> <th>Sex</th><td><?php echo $row['sex']?></td>
    <tr> <th>Educational Background</th><td><?php echo $row['e_background'] ?></td>
    <tr> <th>Work Experience</th><td><?php echo $row['w_exprience'] ?></td>
     <tr> <th>you can message to a personal</th><td>
    
     <a  onclick= 'openForm(<?php echo $row['u_id']?>)' > <button>Message</button></a></td>

         
  </tr>

<?php
                ""; 
              }
    
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
        
        <!-- ./add friend -->

        <!-- friends -->
      
        <!-- ./friends 

       <div class="panel panel-default">
          <div class="panel-body">
            
           
          </div>
        </div> -->
      </div>
    </div>
  </main>
  <!-- ./main -->

<div class="form-popup" id="myForm">
  <form action="function.php" class="form-container" method="post">
    <h1>Message</h1>

    
    <input type="hidden" readonly="readonly" value="" id="nameid" name="nid" required>

  
<label for="name"><b>subject</b></label>
    <input type="text" placeholder="Enter subject" value="" name="subject" required>
    <label for="name"><b>message</b></label>
     <textarea id="qualification" name="message" placeholder="Message.."  required></textarea>
     <label for="name"><b>sender</b></label>
    <input type="text" placeholder="sender" value="" name="sender" required>
       <button type="submit" class="btn" name="msubmit">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm(x) {
  document.getElementById("myForm").style.display = "block";
  document.getElementById("nameid").value = parseInt(x);
  


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