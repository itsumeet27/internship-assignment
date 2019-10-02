<?php 
  session_start();
  require_once 'core/init.php';
  include 'includes/header.php'; 
?>

<?php 
  
?>
<main>
  <h2 class="text-center p-3">List of Internships</h2>
  <div class="container-fluid row">
    <div class="col-md-3">
      <h4 class="text-justify p-2">Filters</h4>
      <h5 class="text-justify p-2">Category</h5>
      <ul>
        <?php getCategoryFilter(); ?>
      </ul>
      <h5 class="text-justify p-2">Location</h5>
      <ul>
        <?php getLocationFilter(); ?>
      </ul>
      <h5 class="text-justify p-2">Duration</h5>
      <ul>
        <?php getDurationFilter(); ?>
      </ul>
    </div>
    <div class="col-md-9">
      <?php getInternships(); ?>
      <?php getFilteredInternship(); ?>
    </div>    
  </div>
</main>
<?php include 'includes/footer.php'; ?>