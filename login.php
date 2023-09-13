
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
                  if ($row["status"] == "0" && $row["user_type"] == "individual" ){
                     $_SESSION['user_name'] = $_POST["user_name"];


                   echo '<script>
                    alert("add ur personal info");
                    window.location="user_info.html";
                </script>';

                 
              
                  }   
                  if($row["status"] == "1" && $row["user_type"] == "individual"){
                     $_SESSION['user_name'] = $_POST["user_name"];

                       header("Location: home.php");
               
                       
                  }
                  if ($row["status"] == "0" && $row["user_type"] == "company" ){
                     $_SESSION['user_name'] = $_POST["user_name"];


                   echo '<script>
                    alert("add ur personal info");
                    window.location="organisation.html";
                </script>';

                 
              
                  }   
                  if($row["status"] == "1" && $row["user_type"] == "company"){
                     $_SESSION['user_name'] = $_POST["user_name"];

                       header("Location: home1.php");
               
                       
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

          <?php
          $un = $_SESSION['user_name'];
           $sql_id = "select user_id from user where u_name ='$un' ";
              $result = mysqli_query($conn, $sql_id);
               $row = mysqli_fetch_assoc($result);
        require("conf.php");
       
      if(isset($_POST['btn_img1']))
      {
        

         $filename = $_FILES["choosefile"]["name"];
          $filename1 = $_FILES["choosefile1"]["name"];
          $filename2 = $_FILES["choosefile2"]["name"];
          $filename3 = $_FILES["choosefile3"]["name"];
         $folder = "asset/file/".$filename;
         $folder1 = "asset/file/".$filename1;
         $folder2 = "asset/file/".$filename2;
         $folder3 = "asset/file/".$filename3;
         $tempfile = $_FILES["choosefile"]["tmp_name"];
         $tempfile1 = $_FILES["choosefile1"]["tmp_name"];
         $tempfile2 = $_FILES["choosefile2"]["tmp_name"];
         $tempfile3 = $_FILES["choosefile3"]["tmp_name"];

           $duplication = mysqli_query($conn, "select * from upload where user_id = '$row[user_id]'");    
            if (mysqli_num_rows($duplication) > 0){
              $sql_update = "UPDATE upload SET  cv = '$filename', recommendation = '$filename1', expereince ='$filename2', other = '$filename3'";
                  

        if($filename == "" && $filename1 == "" && $filename2 == "" && $filename3 == "")
        {
            echo '<script>
                    alert("Blank not Allowed");
                    window.location="individual.php";
                  </script>';
           
        }else{
           mysqli_query($conn, $sql_update);

            move_uploaded_file($tempfile, $folder);
            move_uploaded_file($tempfile1, $folder1);
            move_uploaded_file($tempfile2, $folder2);
            move_uploaded_file($tempfile3, $folder3);
            echo '<script>
                    alert("File uploaded");
                    window.location="individual.php";
                  </script>';
           
        }






                }else{

        $sql = "INSERT INTO upload VALUES('', '$row[user_id]','$filename', '$filename1', '$filename2','$filename3')";

              if($filename == "" && $filename1 == "" && $filename2 == "" && $filename3 == "")
        {
            echo '<script>
                    alert("Blank not Allowed");
                    window.location="individual.php";
                  </script>';
           
        }else{
            $result = mysqli_query($conn, $sql);
            move_uploaded_file($tempfile, $folder);
             move_uploaded_file($tempfile1, $folder1);
            move_uploaded_file($tempfile2, $folder2);
            move_uploaded_file($tempfile3, $folder3);
            echo '<script>
                    alert("File uploaded");
                    window.location="individual.php";
                  </script>';
           
        }
}
        
      }

        
        ?>



        <?php
          //session_start();
          require("conf.php");
          
          if(isset($_POST["apply"])) {
           $vac_id = $_POST["nid"];
           $name = $_POST["name"];


           $sql_vac = "select * from vacancy where vac_id ='$vac_id' ";
           $resu = mysqli_query($conn, $sql_vac);
           $row1 = mysqli_fetch_assoc($resu);
         
          $org_id =$row1['org_id'];
          $title = $row1['job_title'];


           $un = $_SESSION['user_name'];
           $sql_id = "select user_id from user where u_name ='$un' ";
              $result = mysqli_query($conn, $sql_id);
               $row = mysqli_fetch_assoc($result);
            $use_id = $row['user_id'];
         
          $duplicat = mysqli_query($conn, "select * from job_applide where  user_id = '$use_id' AND vac_id = '$vac_id' ");    
            if (mysqli_num_rows($duplicat) > 0){
          echo '<script>
                    alert("vacancy alrady exist");
                    window.location="home.php";
                </script>';
            } 
            else {
            
               $sql_insert =  "INSERT INTO job_applide VALUES('', '$org_id', '$use_id', '$vac_id ', '$name', '$title', now())";

              $insert = mysqli_query($conn, $sql_insert);
                echo '<script>
                    alert("Record added successfully");
                    window.location="home.php";
                  </script>';
          
            }         
              
                     }
                   ?>

     