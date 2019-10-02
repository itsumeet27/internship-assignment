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
  <h2 class="text-center p-3">List of Internships</h2>
  <div class="container-fluid row">
    <div class="col-md-3">
      <h4 class="text-justify p-2">Filters</h4>
      <h5 class="text-justify p-2">Category</h5>
      <ul>
        <?php getFilters(); ?>
      </ul>
    </div>
    <div class="col-md-9">
      <?php getCategory(); ?>
    </div>    
  </div>
</main>
<?php include 'includes/footer.php'; ?>