<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
       <div class="modal-body">
        <div class="form-group">
            <label>first Name </lable>
            <input type="text" name="fname" class="form-control" placeholder="Enter  First Name">
        </div>
        <div class="form-group">
            <label>Last Name </lable>
            <input type="text" name="lname" class="form-control" placeholder=" Enter Last Name">
        </div>
        <div class="form-group">
            <label>Email</lable>
            <input type="email" name="email" class="form-control" placeholder="Enter Email">
        </div>
        <div class="form-group">
            <label>Password </lable>
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
        </div>
        <div class="form-group">
            <label>Conform Password </lable>
            <input type="password" name="cpassword" class="form-control" placeholder="Password Again">
        </div>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="container-fluid">

<!--DataTable Examole -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Admin Profile
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                 Add Admin Profile
                </button>
        </h6>
    </div>
    <div class="card-body">

        <?php
        if(isset($_SESSION['success'])&&$_SESSION['success'] !='')
        {
            echo'<h2>'.$_SESSION['success'].'</h2>';
            unset($_SESSION['success']);
        }
        if(isset($_SESSION['status'])&&$_SESSION['status'] !='')
        {
            echo'<h2>'.$_SESSION['status'].'</h2>';
            unset($_SESSION['status']);
        }


        ?>

      <div class="table-responsive">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>POSITION</th>
                        <th>DEPARTMENT</th>
                        <th>AGE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
      </div> 
    </div>
</div>


<!--/.container-fluid -->
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>