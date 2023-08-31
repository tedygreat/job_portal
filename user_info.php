<?php
    session_start();
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
    
      $un = $_SESSION['user_name'];
      $sql_id = "select user_id from user where u_name ='$un' ";
      $result3 = mysqli_query($conn, $sql_id);
      $row1 = mysqli_fetch_assoc($result3);

      $sql_info1 = "select * from user_info where u_id='$row1[user_id]'";
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
<html lang="en">
<head> 
  <title>JOB PORTAL</title>
   <link rel="stylesheet" type="text/css" href="css/forms.css">
  <link rel="stylesheet" type="text/css" href="css/mainu.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">

</head>
<body>
  <header>
   <div class="topnav">
   <a href="#about">About</a>
   <a href="#contact">Contact</a>
   <a href="#news">News</a>
   <a class="active" href="home.php">Home</a>
   </div>
  </header>

<h2>Personal Information Details</h2>
<?php
  echo $_SESSION['user_name']
  
?>
          
        
<p> write your personal details correctly every employer look your personal detail every field is required  </p>

<div class="container">
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
      <textarea id="education" name="education" value="<?php echo $education; ?>" style="height:100px"></textarea>
    </div>
  </div>
    <div class="row">
    <div class="col-25">
      <label for="work">Work Experience</label>
    </div>
    <div class="col-75">
      <textarea id="work" name="work" value="<?php echo $work; ?>" style="height:100px"></textarea>
    </div>
  </div>
  <br>
  <div class="row">
    <input type="submit" value="Submit" name="ursubmit" id="ursubmit">
  </div>
  </form>
</div>  

 <footer>
  <p>Author: Tewodros Shimels<br>
  <a href="tedygreat@gmail.com">Email Address :tedygreat@gmail.com</a></p>
 </footer> 
</body>