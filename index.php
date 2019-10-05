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
          <table class="filter table table-striped">
            <?php getCategoryFilter(); ?>
          </table>
          <h5 class="text-justify p-2">Company Name</h5>
          <table class="filter table table-striped">
            <?php getCompanyFilter(); ?>
          </table>
          <h5 class="text-justify p-2">Location</h5>
          <table class="filter table table-striped">
            <?php getLocationFilter(); ?>
          </table>
          <h5 class="text-justify p-2">Duration</h5>
          <table class="filter table table-striped">
            <?php getDurationFilter(); ?>
          </table>
          <h5 class="text-justify p-2">Stipend</h5>
          <table class="filter table table-striped">
            <?php getStipendFilter(); ?>
          </table>
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