 <?php
        session_start();

         require("conf.php");
   
        $un = $_SESSION['user_name'];
        $sql_id = "select user_id from user where u_name ='$un' ";
              $result = mysqli_query($conn, $sql_id);
               $rowid = mysqli_fetch_assoc($result);
                $usid = $rowid['user_id']
    ?>

<?php
        
          require("conf.php");
          
          if(isset($_POST["osubmit"])) {

            $un = $_SESSION['user_name'];
            $o_name = $_POST["name"];
            $o_type = $_POST["org_type"];
            $location = $_POST["location"];
            $phone = $_POST["phone"];
            $po_box = $_POST["po_box"];
            $email = $_POST["emaile"];
            $website = $_POST["website"];     
            

            $sql_id = "select user_id from user where u_name ='$un' ";
              $result = mysqli_query($conn, $sql_id);
               $row = mysqli_fetch_assoc($result);
         


            $sql_update = "UPDATE user SET status = '1' WHERE u_name = '$un'";
            mysqli_query($conn, $sql_update);
            $sql_insert =  "INSERT INTO company VALUES('', ' $row[user_id]', '$o_name', '$o_type', '$location', '$phone', '$po_box', '$email', '$website')";
              mysqli_query($conn, $sql_insert);
              echo '<script>
                    alert("successfully");
                    window.location="login.html";
                  </script>';
                 
          }
        ?>

<?php
if(isset($_POST["VSubmit"])) {
              require("conf.php");

       

                $search11 = "SELECT org_id FROM company WHERE user_id = '$usid'";
              $res =mysqli_query($conn, $search11);
              $id_org = mysqli_fetch_assoc($res);
              $id = $id_org['org_id'];

            $orgname = $_POST["orgname"];
            $job_title = $_POST["job_title"];
            $location = $_POST["place"];
            $salary = $_POST["salary"];
            $emp_type = $_POST["emp_type"];
            $Start_Date = $_POST["Start_Date"];
            $Closed_Date = $_POST["Closed_Date"];     
            $experience = $_POST["experience"];
            $qualification = $_POST["qualification"];
            $Description = $_POST["Description"];
            $c_address = $_POST["c_address"];
            $sql_ins = "INSERT INTO vacancy VALUES( '', '$id', '$orgname', '$job_title', ' $location', '$salary', '$emp_type', '$Start_Date', '$Closed_Date', '$experience', '$qualification', '$Description', '$c_address')";
            $resul = mysqli_query($conn, $sql_ins);
            


            echo '<script>
                    alert("successfully");
                    window.location="home1.php";
                  </script>';
           }


     ?>


     <?php
if(isset($_POST["msubmit"])) {
              require("conf.php");

       
            $id = $_POST["nid"];
            $subject = $_POST["subject"];
            $message = $_POST["message"];
            $sender= $_POST["sender"];
            
            $sql_ins = "INSERT INTO message VALUES( '', '$id', '$subject', '$message', '$sender')";
            $resul = mysqli_query($conn, $sql_ins);
            


            echo '<script>
                    alert("Send");
                    window.location="home1.php";
                  </script>';
           }


     ?>