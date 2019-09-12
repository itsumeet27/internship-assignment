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
    <h2 class="text-center p-3">Internship(s) Posted by Companies</h2>
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
  </main>

<?php include 'includes/footer.php'; ?>