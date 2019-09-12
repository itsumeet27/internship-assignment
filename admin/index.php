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
		<h2 class="text-center p-3"> Application(s) by Students </h2>
		<div class="container-fluid table-responsive">  
	        <table class="table table-striped table-bordered" style="display: table;">
	          	<thead>
	          		
		            <th class="text-center"><h5 class="h5-responsive"><b>Name of Applicant</b></h5></th>
		            <th class="text-center"><h5 class="h5-responsive"><b>Category</b></h5></th>
		            <th class="text-center"><h5 class="h5-responsive"><b>Name of Company</b></h5></th>
		            <th class="text-center"><h5 class="h5-responsive"><b>Location</b></h5></th>
		            <th class="text-center"><h5 class="h5-responsive"><b>Stipend</b></h5></th>          
		            <th class="text-center"><h5 class="h5-responsive"><b>Email</b></h5></th>
		            <th class="text-center"><h5 class="h5-responsive"><b>Phone</b></h5></th>
	          	</thead>
	          	<tbody>

				<?php 
	              $sql = "SELECT c.fullname, c.email, c.phone, i.category, i.nameOfCompany, i.location, i.stipend, a.id FROM applications a INNER JOIN customers c ON a.cus_id = c.id INNER JOIN internships i ON a.int_id = i.id WHERE a.applied = 1";
	              $applications = $db->query($sql);
	            ?>

	            <?php while($application = mysqli_fetch_assoc($applications)):?>
	              <tr>
	              	
	                <td class="text-center"><?=$application['fullname'];?></td>
	                <td class="text-center"><?=$application['category'];?></td>
	                <td class="text-center"><?=$application['nameOfCompany'];?></td>
	                <td class="text-center"><?=$application['location'];?></td>
	                <td class="text-center"><?=$application['stipend'];?></td>
	                <td class="text-center"><?=$application['email'];?></td>
	                <td class="text-center"><?=$application['phone'];?></td>
	              </tr>
	            <?php endwhile;?>
	          	</tbody>
	        </table>
      	</div>
    	<?php } ?>
	</main>

<?php
	include 'includes/footer.php';
?>