<?php
	session_start();
	$sqlint = "SELECT * FROM internships WHERE deleted=0";
  	$internships = $db->query($sqlint);
  	while ($internship = mysqli_fetch_assoc($internships)) {
  		$int_id = $internship['id'];
  		$emp_id = $internship['emp_id'];
  		$sqlcus = "SELECT * FROM customers";
  		$customers = $db->query($sqlcus);
  		while ($customer = mysqli_fetch_assoc($customers)){
  			$cus_id = $customer['id'];
  		}
  		if(isset($_GET['application'])){
		    $id = sanitize((int)$_GET['application']);
		    $sql = "SELECT * FROM applications WHERE id = '$id'";
		    $sqlResult = $db->query($sql);
		    $applicationCount = mysqli_num_rows($sqlResult);
		    if($applicationCount > 0){
				while ($row = mysqli_fetch_array($sqlResult)) {
					$cus_id = $row['category'];
					$emp_id = $row['nameOfCompany'];
					$int_id = $row['postedOn'];
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
				echo "You have not applied for any internship";
				exit();
	    	}
	  	}
	  	else{
			echo "Data is missing, please select the internship";
			exit();
		}
  	}

	
?>