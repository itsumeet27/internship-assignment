<!DOCTYPE html>

<?php 
  include('db.php'); 

  if(isset($_POST['search'])){
    $name = htmlspecialchars($_POST['search']);
    $sql = "SELECT * FROM invoice WHERE `name` LIKE '%$name%'";
    $rows = $db->query($sql);
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
  <div class="container table-responsive">
    <div class="row">
        <div class="col-md-4 text-left">
            <button class="btn btn-md btn-success" data-target="#centralModalSm" data-toggle="modal">ADD TASK</button>
        </diV>
        <div class="col-md-4 text-center">
            <form class="form text-center" action="search.php" method="post" class="form-group">
            <input type="text" placeholder="Search" name="search" class="form-control">
            </form>
        </div>
        <div class="col-md-4 text-right">
            <button class="btn btn-md btn-default" onclick="print()">PRINT</button>
        </div>
    </div>
    <?php if(mysqli_num_rows($rows) < 1): ?>
    <h3 class="text-center text-danger p-2">Nothing found</h3>
    <a href="index.php" class="btn btn-md btn-warning">Back</a>
    <?php else: ?>
    <table class="table table-hover">
      <thead>
        <th>No.</th>
        <th>Task</th>
      </thead>
      <tbody>
        <tr>
          <?php while($row = $rows->fetch_assoc()): ?>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td>
              <a class="btn btn-md btn-primary" href="update.php?id=<?php echo $row['id'];?>">EDIT</a>
            </td>
            <td>
              <a class="btn btn-md btn-danger" href="delete.php?id=<?php echo $row['id'];?>">DELETE</a>
            </td>
        </tr>
          
        <?php endwhile; ?>
      </tbody>
    </table>
    <?php endif; ?>
  </div>

  <!-- Central Modal Small -->
<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Add you new task</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Material form login -->
      <div class="card">
        <div class="row">
          <div class="col-md-6">
          <div class="card-body px-lg-5 pt-0">

      <!-- Form -->
      <form class="text-center" style="color: #757575;" action="add.php" method="post">

        <!-- Task Name -->
        <div class="md-form">
          <input type="text" id="task" name="task" class="form-control" required>
          <label for="materialLoginFormEmail">Task Name</label>
        </div>

        <!-- Sign in button -->
        <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="send">Submit</button>


      </form>
      <!-- Form -->

      </div>
    </div>
  </div>  

</div>
<!-- Material form login -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">CLOSE</button>
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