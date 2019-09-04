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
  <main>
    <h3 class="text-center p-3">Internship(s) Posted by Companies</h3>
    <?php
      if(isset($_GET['delete'])){
        $id = sanitize($_GET['delete']);
        $db->query("UPDATE internships SET deleted = 1 WHERE id = '$id'");
        header('Location: internships.php');
      }

      if(isset($_GET['add']) || isset($_GET['edit'])){
        $parentQuery = $db->query("SELECT * FROM internships");
        $category = ((isset($_POST['category']) && $_POST['category'] != '')?sanitize($_POST['category']):'');
        $postedOn = ((isset($_POST['postedOn']) && $_POST['postedOn'] != '')?sanitize($_POST['postedOn']):'');
        $applyBy = ((isset($_POST['applyBy']) && $_POST['applyBy'] != '')?sanitize($_POST['applyBy']):'');
        $nameOfCompany = ((isset($_POST['nameOfCompany']) && $_POST['nameOfCompany'] != '')?sanitize($_POST['nameOfCompany']):'');
        $aboutCompany = ((isset($_POST['aboutCompany']) && $_POST['aboutCompany'] != '')?sanitize($_POST['aboutCompany']):'');        
        $aboutInternship = ((isset($_POST['aboutInternship']) && $_POST['aboutInternship'] != '')?sanitize($_POST['aboutInternship']):'');
        $location = ((isset($_POST['location']) && $_POST['location'] != '')?sanitize($_POST['location']):'');    
        $perks = ((isset($_POST['perks']) && $_POST['perks'] != '')?sanitize($_POST['perks']):'');
        $duration = ((isset($_POST['duration']) && $_POST['duration'] != '')?sanitize($_POST['duration']):'');
        $stipend = ((isset($_POST['stipend']) && $_POST['stipend'] != '')?sanitize($_POST['stipend']):'');
        $positions = ((isset($_POST['positions']) && $_POST['positions'] != '')?sanitize($_POST['positions']):'');
        $whoCanApply = ((isset($_POST['whoCanApply']) && $_POST['whoCanApply'] != '')?sanitize($_POST['whoCanApply']):'');

        if(isset($_GET['edit'])){
          $edit_id = (int)$_GET['edit'];
          $internshipResults = $db->query("SELECT * FROM internships WHERE id = '$edit_id'");
          $internship = mysqli_fetch_assoc($internshipResults);
          $category = ((isset($_POST['category']) && $_POST['category'] != '')?sanitize($_POST['category']):$internship['category']);
          $postedOn = ((isset($_POST['postedOn']) && $_POST['postedOn'] != '')?sanitize($_POST['postedOn']):$internship['postedOn']);
          $applyBy = ((isset($_POST['applyBy']) && $_POST['applyBy'] != '')?sanitize($_POST['applyBy']):$internship['applyBy']);
          $nameOfCompany = ((isset($_POST['nameOfCompany']) && $_POST['nameOfCompany'] != '')?sanitize($_POST['nameOfCompany']):$internship['nameOfCompany']);
          $aboutCompany = ((isset($_POST['aboutCompany']) && $_POST['aboutCompany'] != '')?sanitize($_POST['aboutCompany']):$internship['aboutCompany']);          
          $aboutInternship = ((isset($_POST['aboutInternship']) && $_POST['aboutInternship'] != '')?sanitize($_POST['aboutInternship']):$internship['aboutInternship']);
          $location = ((isset($_POST['location']) && $_POST['location'] != '')?sanitize($_POST['location']):$internship['location']);
          $perks = ((isset($_POST['perks']) && $_POST['perks'] != '')?sanitize($_POST['perks']):$internship['perks']);
          $duration = ((isset($_POST['duration']) && $_POST['duration'] != '')?sanitize($_POST['duration']):$internship['duration']);
          $stipend = ((isset($_POST['stipend']) && $_POST['stipend'] != '')?sanitize($_POST['stipend']):$internship['stipend']);
          $positions = ((isset($_POST['positions']) && $_POST['positions'] != '')?sanitize($_POST['positions']):$internship['positions']);
          $whoCanApply = ((isset($_POST['whoCanApply']) && $_POST['whoCanApply'] != '')?sanitize($_POST['whoCanApply']):$internship['whoCanApply']);
        }

        if($_POST){
          $insertSql = "INSERT INTO internships (`category`,`postedOn`,`applyBy`,`nameOfCompany`,`aboutCompany`,`aboutInternship`,`location`,`perks`,`duration`,`stipend`,`positions`,`whoCanApply`) VALUES ('$category','$postedOn','$applyBy','$nameOfCompany','$aboutCompany','$aboutInternship','$location','$perks','$duration','$stipend','$positions','$whoCanApply')";
            if(isset($_GET['edit'])){
              $insertSql = "UPDATE internships SET category = '$category', postedOn = '$postedOn', applyBy = '$applyBy', nameOfCompany = '$nameOfCompany', aboutCompany = '$aboutCompany', aboutInternship = '$aboutInternship', location = '$location', perks = '$perks', duration = '$duration', stipend = '$stipend', positions = '$positions', whoCanApply = '$whoCanApply' WHERE id = '$edit_id'";
            }
          $db->query($insertSql);
        }
    ?>
      <?php } 
          else{
            $sql = "SELECT * FROM internships WHERE deleted = 0";
            $presults = $db->query($sql);
          
      ?>
      <div class="container-fluid table-responsive">  
        <table class="table table-striped table-bordered" style="display: table;">
          <thead>
            <th></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Name of Company</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Location</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Duration</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Stipend</b></h5></th>          
            <th class="text-center"><h5 class="h5-responsive"><b>Available Positions</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Posted On</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Apply By</b></h5></th>
          </thead>
          <tbody>
            <?php 
              $sql = "SELECT * FROM internships WHERE deleted = 0";
              $internships = $db->query($sql);
            ?>

            <?php while($internship = mysqli_fetch_assoc($internships)):?>
              <tr>
                <td>
                  <a href="details.php?internship=<?=$internship['id'];?>"><i class="fas fa-edit"></i></a>
                </td>
                <td class="text-center"><?=$internship['nameOfCompany'];?></td>
                <td class="text-center"><?=$internship['location'];?></td>
                <td class="text-center"><?=$internship['duration'];?></td>
                <td class="text-center"><?=$internship['stipend'];?></td>
                <td class="text-center"><?=$internship['positions'];?></td>
                <td class="text-center"><?=$internship['postedOn'];?></td>
                <td class="text-center"><?=$internship['applyBy'];?></td>
              </tr>
            <?php endwhile;?>
          </tbody>
        </table>
      </div>
    <?php } ?>
    </div>
  </main>

<?php include 'includes/footer.php'; } ?>