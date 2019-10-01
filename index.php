<?php 
  session_start();
  require_once 'core/init.php';
  include 'includes/header.php'; 
?>

<?php 
  $sql = "SELECT * FROM internships WHERE deleted=0";
  $internships = $db->query($sql);
  while($internship_filter = mysqli_fetch_assoc($internships)){
    $category = $internship_filter['category'];
    $location = $internship_filter['location'];
    $nameOfCompany = $internship_filter['nameOfCompany'];
    $duration = $internship_filter['duration'];
  }
?>
<main>
  <h2 class="text-center p-3">List of Internships</h2>
  <div class="container-fluid row">
    <div class="col-md-3">
      <h4 class="text-justify p-2">Filters</h4>
      <form action="" method="post">

        <h5 class="text-justify p-2">Location</h5>
        <input type="radio" name="location" value="<?=$location;?>">

        <button type="submit" name="search" class="btn btn-default">Search</button>

      </form>



      <?php 
        if(isset($_POST['location']) && !empty($_POST['location'])){
          if ($_POST['location'] == ''){
            $sql .= " ORDER BY price ASC";
            $products = $db->query($sql);
          }  
        }
      ?>
    </div>
    <div class="col-md-9">
      <!-- List of Internships -->
      <?php while($internship = mysqli_fetch_assoc($internships)): ?>
      <div class="">
        <div class="card">
          <div class="card-header">
            <h3 class="p-2 text-center card-title"><?=$internship['nameOfCompany'];?></h3>
          </div>
          <div class="card-body table-responsive">
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
        <br>
      </div>
      <?php endwhile;?>
    </div>    
  </div>
</main>
<?php include 'includes/footer.php'; ?>