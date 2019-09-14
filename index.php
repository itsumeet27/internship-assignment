<?php 
  session_start();
  require_once 'core/init.php';
  include 'includes/header.php'; 
?>

<?php 
  $sql = "SELECT * FROM internships WHERE deleted=0";
  $internships = $db->query($sql);
?>
<main>
  <h3 class="text-center p-3">List of Internships</h3>
  <div class="container-fluid row">
    <!-- List of Internships -->
    <?php while($internship = mysqli_fetch_assoc($internships)): ?>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h2 class="p-2 text-center card-title"><?=$internship['nameOfCompany'];?></h2>
        </div>
        <div class="card-body">
          <h4 class="p-2 h4-responsive float-left"><?=$internship['category'];?></h4>
          <h5 class="p-2 h5-responsive float-right"><b>Location: </b><?=$internship['location'];?></h5>
          <table class="table table-bordered">
            <thead>
              <th>Duration</th>
              <th>Stipend</th>
              <th>Posted On</th>
              <th>Apply By</th>
              <th>Available Positions</th>
            </thead>
            <tbody>
              <tr>
                <td><?=$internship['duration'];?> months</td>
                <td>&#8377; <?=$internship['stipend'];?></td>
                <td><?=$internship['postedOn'];?></td>
                <td><?=$internship['applyBy'];?></td>
                <td><?=$internship['positions'];?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <a href="internship.php?internship=<?=$internship['id'];?>" class="btn btn-success btn-black waves-effect z-depth-0">View Details</a>
        </div>
      </div>
    </div>
    <?php endwhile;?>
  </div>
  <br>
</main>
<?php include 'includes/footer.php'; ?>