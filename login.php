
  <?php
          session_start();
          require("conf.php");
          
          if(isset($_POST["submit"])) {

            $uname = $_POST["user_name"];
            $pass = $_POST["password"];
              $sql_login = "select * from user where u_name ='$uname' AND password = '$pass'";
              $result = mysqli_query($conn, $sql_login);
              $row = mysqli_fetch_assoc($result);
             
              if(mysqli_num_rows($result) > 0){ 
                if($pass == $row["password"]){
                  if ($row["status"] == "0"){
                     $_SESSION['user_name'] = $_POST["user_name"];

                   echo '<script>
                    alert("add ur personal info");
                    window.location="user_info.html";
                </script>';

                 
              
                  }   
                  if($row["status"] == "1"){
                     $_SESSION['user_name'] = $_POST["user_name"];

                       header("Location: home.php");
               
                       
                  }
                   
              }
              else {
                echo
                "<script> alert ('wrong password'); </script>";
              
               
              }
            
          }
          else{
                 echo
                "<script> alert ('not register '); </script>";
          }
        }
  ?>


         <?php
          //session_start();
          require("conf.php");
          
          if(isset($_POST["submit1"])) {
          $name = $_POST["user_name1"];
          $password = $_POST["password1"];
          $cpassword = $_POST["cpassword1"];
          $company = $_POST["user_type"];  
          $duplication = mysqli_query($conn, "select * from user where u_name = '$name'");    
            if (mysqli_num_rows($duplication) > 0){
          echo '<script>
                    alert("user name alrady exist");
                    window.location="signup.html";
                </script>';
            } 
            else {
              if ($password == $cpassword ) {
               $sql_insert =  "INSERT INTO user VALUES('', '$name', '$password', '$company', '')";

              $insert = mysqli_query($conn, $sql_insert);
                echo '<script>
                    alert("Record added successfully");
                    window.location="login.html";
                  </script>';
                
                      
              }
              else{
                echo '<script>
                    alert("password does not match");
                    window.location="signup.html";
                  </script>';



                 
              }
            }         
              
                     }
                   ?>

          <?php
          session_start();
          require("conf.php");
          
          if(isset($_POST["ursubmit"])) {

            $un = $_SESSION['user_name'];
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
            $sql_id = "select user_id from user where u_name ='$un' ";
              $result = mysqli_query($conn, $sql_id);
               $row = mysqli_fetch_assoc($result);
         

            $sql_update = "UPDATE user SET status = '1' WHERE u_name = '$un'";
            mysqli_query($conn, $sql_update);
            $sql_insert =  "INSERT INTO user_info VALUES('', ' $row[user_id]', '$fname', '$lname', '$bplace', '$nationality', '$mstatus', '$caddress', '$phone', '$email', '$sex', '$education', '$work')";
              mysqli_query($conn, $sql_insert);
                 
          }
        ?>