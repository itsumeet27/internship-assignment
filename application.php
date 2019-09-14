<?php
	session_start();
	require_once 'core/init.php';
?>
<?php 
	// Check if user is logged in
	if(!isset($_SESSION['email'])){
      echo "<script>window.open('login.php','_self')</script>";
    }
?>

<?php
	// Select the user based on logged in email
	$email = $_SESSION['email'];
	$sqlcus = "SELECT * FROM customers WHERE email = '$email'";
    $result = $db->query($sqlcus);
    while ($row_pro = mysqli_fetch_array($result)) {
		$cus_id = $row_pro['id'];
		$cus_name = $row_pro['fullname'];
		$cus_email = $row_pro['email'];
		$cus_address1 = $row_pro['address1'];
		$cus_address2 = $row_pro['address2'];
		$cus_city = $row_pro['city'];
		$cus_state = $row_pro['state'];
		$cus_zipcode = $row_pro['zipcode'];
		$cus_phone = $row_pro['phone'];
		$cus_country = $row_pro['country'];
    }
?>
<?php
	// Fetch the internship selected/applied
	if(isset($_GET['apply'])){
	    $id = sanitize((int)$_GET['apply']);
    	$sqlint = "SELECT * FROM internships WHERE deleted=0 AND id = '$id'";
	  	$internships = $db->query($sqlint);
	  	while ($internship = mysqli_fetch_assoc($internships)) {
	  		$int_name = $internship['category'];
	  		$company_name = $internship['nameOfCompany'];
	  	}
	    $sql = "SELECT * FROM applications WHERE int_id = '$id'";
	    $applications = $db->query($sql);
		while ($application = mysqli_fetch_assoc($applications)) {
			$cus_app_id = $application['cus_id'];
			$int_app_id = $application['int_id'];
		}
		$insertSql = "INSERT INTO applications (`cus_id`,`int_id`,`applied`) VALUES ('$cus_id','$id', 1)";
		$insert = $db->query($insertSql);
		if($insert){
		?>
		  	<script type="text/javascript">
		  		alert('Successfully applied for the internship!');
		  	</script>
	  	<?php
  		}else{
  			?>
	  		<script type="text/javascript">
	  			alert('Sorry your internship application could not be added!');
	  		</script>
  		<?php
		}	
  	}
  	else{
		echo "Data is missing, please select the internship";
		exit();
	}
	
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Assignment</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your emptom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">  
</head>
<body>
	<!-- Message for succesful application -->
	<h2 class="text-center text-success p-3">Dear <?=$cus_name;?>, You have successfully applied for <b><?=$int_name; ?></b> internship by <b><i><?=$company_name;?></i></b></h2>
	<a href="index.php" class="btn btn-default">Go Back</a>
</body>
</html>