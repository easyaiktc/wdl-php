<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include 'css/style.php' ?>
  <?php include 'link/link.php' ?>


  <title>Sign in & Sign up Form</title>
  </head>
  <body>
      <!--  Login  Logic COde Here -->
      <?php
        include 'dbconfig.php';
        if(isset($_POST['submit'])){

          $email = $_POST['email'];
          $password =$_POST['password'];

          $email_search = "select * from registration where email='$email'";
          $query =mysqli_query($con,$email_search);
          $email_count =mysqli_num_rows($query);


        if($email_count){
          $email_pass =mysqli_fetch_assoc($query);

          $db_pass =$email_pass['password'];
          $_SESSION['fname']= $email_pass['fname'];
          $pass_decode =password_verify($password,$db_pass);
          
          if($pass_decode){
              ?>
                  <script>
                   alert("Login Successfull");
                      location.replace("../index.html");
                  </script>
              <?php
          }else{
              ?>
                  <script>
                   alert("Incorrect password");
      
                  </script>
              <?php
          }

        }else{
          ?>
             <script>
                 alert("Invalid Email id");
      
              </script>
            <?php
        }

     }
  ?>
    <!-- signup logic code here -->
    <?php
      include 'dbconfig.php';

      if (isset($_POST['submit1'])){

        $fname = mysqli_real_escape_string($con, $_POST['fname']);
        $phone =mysqli_real_escape_string($con, $_POST['cnumber']);
        $email =mysqli_real_escape_string($con, $_POST['email']);
        $password =mysqli_real_escape_string($con, $_POST['password']);
        $cpassword =mysqli_real_escape_string($con, $_POST['cpassword']);
        
        $pass =password_hash($password,PASSWORD_BCRYPT);
        $cpass= password_hash($cpassword,PASSWORD_BCRYPT);

        $emailquery = "select * from registration where email='$email'";
        $query =mysqli_query($con,$emailquery);

        $emailCount = mysqli_num_rows($query);
        
        if($emailCount>0){
          ?>
                      <script>
                       alert("Email already exits");
              
                      </script>
                  <?php
          

      }else{
        if($password === $cpassword){
          $insertquery = "insert into registration (fname, phone, email, password, c_password)
          values('$fname','$phone','$email','$pass','$cpass')";
          
          $iquery =mysqli_query($con,$insertquery);

          if($iquery){
            ?>
                        <script>
                         //alert("Connection Successful");
                         alert("registration Successful")
                
                        </script>
                    <?php
                
                } else{
                    ?>
                        <script>
                            alert("NO Connection")
                    
                        </script>
                    <?php
                }



            }else{
                ?>
                        <script>
                            alert("Password are not Matching")
                    
                        </script>
                <?php
            }
        }
       } 
       
      //Logic Code Ends Here
  ?>


    <div class="container">
      
      <div class="forms-container">
        <div class="signin-signup">
          <!-- Login Form Code Here -->
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST"class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" placeholder="Email" name="email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" />
            </div>
            <input type="submit" value="Login"  name= "submit" class="btn solid" />
          </form>
          <!--Login Code END Here -->

          <!-- Signup Code Here -->
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Full Name"  name="fname"/>
            </div>
            <div class="input-field">
              <i class="fas fa-phone"></i>
              <input type="text" placeholder="Contact Number" name="cnumber" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name=password />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Re-Password" name=cpassword />
            </div>
            <input type="submit" class="btn" name="submit1" value="Sign up" />
          </form>
          <!-- Signup Code End Here -->
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Let's join us for an awsesome journey!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Already Registered ?</h3>
            <p>
              Go ahead , Login and start learning!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script>

        const sign_in_btn = document.querySelector("#sign-in-btn");
        const sign_up_btn = document.querySelector("#sign-up-btn");
        const container = document.querySelector(".container");

        sign_up_btn.addEventListener("click", () => {
          container.classList.add("sign-up-mode");
        });

        sign_in_btn.addEventListener("click", () => {
          container.classList.remove("sign-up-mode");
        });


    </script>
  </body>
</html>
