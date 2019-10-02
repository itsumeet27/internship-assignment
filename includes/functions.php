<?php

	function getIp() {
		//Get IP Address
		$ip = $_SERVER['REMOTE_ADDR'];   
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		  $ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}  
		return $ip;
  	}

  	//Category filter
	function getCategoryFilter(){
		global $db;
		$get_cats = "SELECT DISTINCT category FROM internships WHERE deleted = 0";
		$run_cats = mysqli_query($db, $get_cats);

		while ($row_cats = mysqli_fetch_array($run_cats)) {
			$filter_category = $row_cats['category'];
			echo "<li><a href='index.php?filter=$filter_category' style='padding: 7.5px;'>$filter_category</a></li>";		
		}
	}

	//Location filter
	function getLocationFilter(){
		global $db;
		$get_cats = "SELECT DISTINCT location FROM internships WHERE deleted = 0";
		$run_cats = mysqli_query($db, $get_cats);
		while ($row_cats = mysqli_fetch_array($run_cats)) {
			$filter_location = $row_cats['location'];
			echo "<li><a href='index.php?filter=$filter_location' style='padding: 7.5px;'>$filter_location</a></li>";		
		}
	}

	//Duration filter
	function getDurationFilter(){
		global $db;
		$get_cats = "SELECT DISTINCT duration FROM internships WHERE deleted = 0";
		$run_cats = mysqli_query($db, $get_cats);
		while ($row_cats = mysqli_fetch_array($run_cats)) {
			$filter_duration = $row_cats['duration'];
			echo "<li><a href='index.php?filter=$filter_duration' style='padding: 7.5px;'>$filter_duration months</a></li>";		
		}
	}

	//Company filter
	function getCompanyFilter(){
		global $db;
		$get_cats = "SELECT DISTINCT nameOfCompany FROM internships WHERE deleted = 0";
		$run_cats = mysqli_query($db, $get_cats);
		while ($row_cats = mysqli_fetch_array($run_cats)) {
			$filter_nameOfCompany = $row_cats['nameOfCompany'];
			echo "<li><a href='index.php?filter=$filter_nameOfCompany' style='padding: 7.5px;'>$filter_nameOfCompany</a></li>";		
		}
	}

	//Stipend filter
	function getStipendFilter(){
		global $db;
		$get_cats = "SELECT DISTINCT stipend FROM internships WHERE deleted = 0";
		$run_cats = mysqli_query($db, $get_cats);
		while ($row_cats = mysqli_fetch_array($run_cats)) {
			$filter_stipend = $row_cats['stipend'];
			echo "<li><a href='index.php?filter=$filter_stipend' style='padding: 7.5px;'>&#8377; $filter_stipend</a></li>";
		}
	}

	function getInternships(){
		if(!isset($_GET['filter'])){
			global $db;
			$sql = "SELECT * FROM internships WHERE deleted=0";
  			$internships = $db->query($sql);
  			while ($internship = mysqli_fetch_array($internships)) {
  				$id = $internship['id'];
				$category = $internship['category'];
				$nameOfCompany = $internship['nameOfCompany'];
				$duration = $internship['duration'];
				$stipend = $internship['stipend'];
				$location = $internship['location'];
				$postedOn = $internship['postedOn'];
				$applyBy = $internship['applyBy'];
				$positions = $internship['positions'];

				echo "
					<div class = 'card'>
						<div class = 'card-header'>
							<h3 class='p-2 text-center card-title'>$nameOfCompany</h3>
						</div>
						<div class='card-body table-responsive'>
				            <h4 class='p-2 h4-responsive float-left'>$category</h4>
				            <h5 class='p-2 h5-responsive float-right'><b>Location: </b>$location</h5>
				            <table class='table table-bordered'>
				              <thead>
				                <th>Duration</th>
				                <th>Stipend</th>
				                <th>Posted On</th>
				                <th>Apply By</th>
				                <th>Available Positions</th>
				              </thead>
				              <tbody>
				                <tr>
				                  <td>$duration months</td>
				                  <td>&#8377; $stipend</td>
				                  <td>$postedOn</td>
				                  <td>$applyBy</td>
				                  <td>$positions</td>
				                </tr>
				              </tbody>
				            </table>
				        </div>
						<div class='card-footer'>
							<a href='internship.php?internship=$id' class='btn btn-success btn-black waves-effect z-depth-0'>View Details</a>
						</div>
					</div>
					<br>
				";
  			}
		}
	}

	function getFilteredInternship(){
		if(isset($_GET['filter'])){
			$filter = $_GET['filter'];
			global $db;
			$get_category = "SELECT * FROM internships WHERE deleted = 0 AND category = '$filter' OR location = '$filter' OR duration = '$filter' OR nameOfCompany = '$filter' OR stipend = '$filter'";
			$run_category = mysqli_query($db, $get_category);
			while ($row_category = mysqli_fetch_array($run_category)) {
				$int_id = $row_category['id'];
				$int_category = $row_category['category'];
				$int_nameOfCompany = $row_category['nameOfCompany'];
				$int_duration = $row_category['duration'];
				$int_stipend = $row_category['stipend'];
				$int_location = $row_category['location'];
				$int_postedOn = $row_category['postedOn'];
				$int_applyBy = $row_category['applyBy'];
				$int_positions = $row_category['positions'];

				echo "
					<div class = 'card'>
						<div class = 'card-header'>
							<h3 class='p-2 text-center card-title'>$int_nameOfCompany</h3>
						</div>
						<div class='card-body table-responsive'>
				            <h4 class='p-2 h4-responsive float-left'>$int_category</h4>
				            <h5 class='p-2 h5-responsive float-right'><b>Location: </b>$int_location</h5>
				            <table class='table table-bordered'>
				              <thead>
				                <th>Duration</th>
				                <th>Stipend</th>
				                <th>Posted On</th>
				                <th>Apply By</th>
				                <th>Available Positions</th>
				              </thead>
				              <tbody>
				                <tr>
				                  <td>$int_duration months</td>
				                  <td>&#8377; $int_stipend</td>
				                  <td>$int_postedOn</td>
				                  <td>$int_applyBy</td>
				                  <td>$int_positions</td>
				                </tr>
				              </tbody>
				            </table>
				        </div>
						<div class='card-footer'>
							<a href='internship.php?internship=$int_id' class='btn btn-success btn-black waves-effect z-depth-0'>View Details</a>
						</div>
					</div>
					<br>
				";
			}
		}
	}

?>