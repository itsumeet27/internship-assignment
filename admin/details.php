<?php 
  session_start();
  require_once '../core/init.php';
  include('includes/header.php');
?>

<?php 
  if(!isset($_SESSION['email'])){
      echo "<script>window.open('login.php','_self')</script>";
    }else{
?>
<?php 
  if(isset($_GET['internship'])){
    $id = sanitize((int)$_GET['internship']);
    $sql = "SELECT * FROM internships WHERE id = '$id'";
    $sqlResult = $db->query($sql);
    $internshipCount = mysqli_num_rows($sqlResult);
    if($internshipCount > 0){
      while ($row = mysqli_fetch_array($sqlResult)) {
        $category = $row['category'];
        $nameOfCompany = $row['nameOfCompany'];
        $postedOn = $row['postedOn'];
        $applyBy = $row['applyBy'];
        $aboutCompany = $row['aboutCompany'];
        $aboutInternship = $row['aboutInternship'];
        $location = $row['location'];
        $perks = $row['perks'];
        $duration = $row['duration'];
        $stipend = $row['stipend'];
        $positions = $row['positions'];
        $whoCanApply = $row['whoCanApply'];
      }
    }else{
      echo "Internship does not exist";
      exit();
    }
  }
  else{
    echo "Data is missing, please select the internship";
    exit();
  }
?>

<div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h2 class="p-2 text-center card-title"><?=$category;?> Internship in <?=$location;?> at <?=$nameOfCompany;?></h2>
      </div>
      <div class="card-body">
        <h4 class="p-2 h4-responsive float-left"><?=$category;?></h4>
        <h5 class="p-2 h5-responsive float-right"><b>Location: </b><?=$location;?></h5>
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
              <td><?=$duration;?> months</td>
              <td>&#8377; <?=$stipend;?></td>
              <td><?=$postedOn;?></td>
              <td><?=$applyBy;?></td>
              <td><?=$positions;?></td>
            </tr>
          </tbody>
        </table>
        <div class="text-justify py-2">
          <div class="aboutCompany">
            <h4 class="h4-responsive">About Company</h4>
            <p class="py-2"><?=$aboutCompany;?></p>
          </div>
          <div class="aboutInternship">
            <h4 class="h4-responsive">About Internship</h4>
            <p class="py-2"><?=nl2br($aboutInternship);?></p>
          </div>
          <div class="positions">
            <h4 class="h4-responsive">No. of positions available</h4>
            <p class="py-2"><?=$positions;?></p>
          </div>
          <div class="whoCanApply">
            <h4 class="h4-responsive">Who can apply</h4>
            <p class="py-2"><?=nl2br($whoCanApply);?></p>
          </div>
          <div class="perks">
            <h4 class="h4-responsive">Perks of the internship</h4>
            <p class="py-2"><?=$perks;?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include 'includes/footer.php';?>

<?php } ?>