<?php
 session_start();
   include('dbconfig.php');
 
 if(isset($_POST['registerbtn']))
 {
     $fname=$_POST['fname'];
     $lname=$_POST['lname'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     $cpassword=$_POST['cpassword'];
     
     if($password === $cpassword)
     {
        $query ="insert into adminregister (fname,Lname,email,password ,cpassword) VALUES('$fname','$lname','$email','$password','$cpassword)";
        $query_run= mysqli_query($connection,$query);
        if($query_run)
        {
          $_SESSION['success']="Admin Profile Added";
          header('location:register.php');
        }
        else
        {
            $_SESSION['status']="Admin profile Not Added";
            header("location:register.php");
        } 
    }
    else
    {
        $_SESSION['status']="Password and Conform Password Does Not Match";
            header("location:register.php");


    }

 }



?>