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
   <a href="editorginfo.php">Profile</a>
      <a href="vacancy.html">Add Vacancy</a>
   <a class="active" href="home1.php">Home</a>
   </div><br>
  <!-- footer -->

  <div class="container my-4">
    <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>PHONE</th>
       
      </tr>
    </thead>
    <tbody>
      <?php
        require("conf.php");
   if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location:home12.php");
      exit;
    }
    $id = $_GET['id'];
        $sql_v = "select * from  job_applide where vac_id = '$id' ";
        $res =mysqli_query($conn,  $sql_v);
               
       
        if(!$res){
          die("Invalid query!");
        }
        while($row = mysqli_fetch_assoc($res)){
          echo "
      <tr>
        <th>$row[user_id]</th>
        <td>$row[name]</td>
        <td>$row[job_title]</td>
        <td>$row[date]</td>
       
        <td>
                  <a class='btn btn-success' href='viewprofile.php?id=$row[user_id]'>View</a>
                  <a class='btn btn-danger' href='delete.php?id=$row[user_id]'>Delete</a>
                </td>
      </tr>
      ";
        }
      }
      ?>
    </tbody>
  </table>
      </div>
  <footer>

    <p>Author: Tewodros Shimels<br>
  <a href="tedygreat@gmail.com">Email Address :tedygreat@gmail.com</a></p>
    
  </footer> 
</body>
</html>