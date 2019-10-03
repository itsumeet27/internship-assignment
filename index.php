<?php 
  session_start();
  require_once 'core/init.php';
  include 'includes/header.php'; 
?>

<main>
  <h2 class="text-center p-3">List of Internships</h2>
  <div class="container-fluid row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <h4 class="text-justify p-2">Filters</h4>          
        </div>
        <div class="card-body">
          <h5 class="text-justify p-2">Category</h5>
          <ul class="filter">
            <?php getCategoryFilter(); ?>
          </ul>
          <h5 class="text-justify p-2">Company Name</h5>
          <ul class="filter">
            <?php getCompanyFilter(); ?>
          </ul>
          <h5 class="text-justify p-2">Location</h5>
          <ul class="filter">
            <?php getLocationFilter(); ?>
          </ul>
          <h5 class="text-justify p-2">Duration</h5>
          <ul class="filter">
            <?php getDurationFilter(); ?>
          </ul>
          <h5 class="text-justify p-2">Stipend</h5>
          <ul class="filter">
            <?php getStipendFilter(); ?>
          </ul>
        </div>
      </div>      
    </div>
    <div class="col-md-9">
      <?php getInternships(); ?>
      <?php getFilteredInternship(); ?>
    </div>    
  </div>
</main>
<?php include 'includes/footer.php'; ?>