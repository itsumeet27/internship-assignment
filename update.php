<!DOCTYPE html>

<?php 
  include('db.php'); 
  $id = (int)$_GET['id'];
  $sql = "SELECT * FROM task WHERE id = '$id'";
  $rows = $db->query($sql);
  $row = $rows->fetch_assoc();
  if(isset($_POST['send'])){
    $task = htmlspecialchars($_POST['task']);
    $sqlUpdate = "UPDATE task SET `name` = '$task' WHERE `id` = '$id'";
    $db->query($sqlUpdate);
    header('location: index.php');
  }  
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <h2 class="text-center p-3 h2-responsive">CRUD To-Do Application</h2>
  
    <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form class="text-center" style="color: #757575;" method="post">
            <div class="md-form">
                <input type="text" id="task" name="task" class="form-control" value="<?php echo $row['name']; ?>" required>
                <label for="materialLoginFormEmail">Task Name</label>
            </div>
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="send">Submit</button>
        </form>
    </div>
    <div class="col-md-4"></div>
      <!-- Form -->
        
    </div>
      <!-- Form -->
<!-- Material form login -->
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
