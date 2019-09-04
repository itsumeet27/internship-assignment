<!DOCTYPE html>
<?php 
	session_start();
	include 'includes/functions.php';
?>
<?php
  $email = $_SESSION['email'];
  $sql = "SELECT * FROM employer WHERE email = '$email'";
    $result = $db->query($sql);
    while ($row_pro = mysqli_fetch_array($result)) {
          $emp_id = $row_pro['id'];
          $emp_name = $row_pro['nameOfCompany'];
          $emp_about = $row_pro['aboutCompany'];
          $emp_email = $row_pro['email'];
          $emp_address1 = $row_pro['address1'];
          $emp_address2 = $row_pro['address2'];
          $emp_city = $row_pro['city'];
          $emp_state = $row_pro['state'];
          $emp_zipcode = $row_pro['zipcode'];
          $emp_phone = $row_pro['phone'];
          $emp_country = $row_pro['country'];
    }
?>

<?php 
	if(!isset($_SESSION['email'])){
      echo "<script>window.open('login.php','_self')</script>";
    }else{
        echo "<script>window.open('','_self')</script>";
    }
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Internship Backend</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../css/mdb.min.css" rel="stylesheet">
  <!-- Your emptom styles (optional) -->
  <link href="../css/style.css" rel="stylesheet">  
</head>
<body>

<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
  <a class="navbar-brand" href="index.php"><?=$emp_name;?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="myaccount.php?edit_account">Edit Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="myaccount.php?change_password">Change Password</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="myaccount.php?delete_account">Delete Account</a>
      </li>
    </ul>
  </div>
</nav>

  <?php 
      if (!isset($_GET['edit_account'])) {
        if(!isset($_GET['change_password'])){
          if(!isset($_GET['delete_account'])){
            echo 
            "<div class='card'>
                <div class='card-header'>
                  <h3 class='h3-responsive p-2'>Hello $emp_name</h3>
                </div>
                <div class='card-body table-responsive'>
                  <table class='table table-striped table-condensed' style='display: table'>
                    
                    <tr>
                      <th><b>Company Name: </b></th>
                      <td>$emp_name</td>
                    </tr>
                    <tr>
                      <th><b>About Company: </b></th>
                      <td>$emp_about</td>
                    </tr>
                    <tr>
                      <th><b>Phone: </b></th>
                      <td>$emp_phone</td>
                    </tr>
                    <tr>
                      <th><b>Email: </b></th>
                      <td>$emp_email</td>
                    </tr>
                    <tr>
                      <th><b>Address: </b></th>
                      <td>$emp_address1,  $emp_address2</td>
                    </tr>
                    <tr>
                      <th><b>City: </b></th>
                      <td>$emp_city</td>
                    </tr>
                    <tr>
                      <th><b>State: </b></th>
                      <td>$emp_state</td>
                    </tr>
                    <tr>
                      <th><b>Zipcode: </b></th>
                      <td>$emp_zipcode</td>
                    </tr>
                  </table>
                </div>
              </div>
            ";
          }
        }
      }
  ?>
  <?php
    if(isset($_GET['edit_account'])){
      include 'details/edit_account.php';
    }
    if(isset($_GET['change_password'])){
      include 'details/change_password.php';
    }
    if(isset($_GET['delete_account'])){
      include 'details/delete_account.php';
    }
  ?>

</body>
</html>