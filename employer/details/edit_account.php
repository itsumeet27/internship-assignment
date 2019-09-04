<?php 
	include('../core/init.php');
?>

<?php
	$email = $_SESSION['email'];
	$sql = "SELECT * FROM employer WHERE email = '$email'";
    $result = $db->query($sql);
    while ($row_pro = mysqli_fetch_array($result)) {
          $emp_id = $row_pro['id'];
          $emp_name = $row_pro['nameOfCompany'];
          $emp_about = $row_pro['aboutCompany'];
          $emp_email = $row_pro['email'];
          $emp_address1 = $row_pro['address1'];
          $emp_address2 = $row_pro['address2'];
          $emp_city = $row_pro['city'];
          $emp_state = $row_pro['state'];
          $emp_zipcode = $row_pro['zipcode'];
          $emp_phone = $row_pro['phone'];
          $emp_country = $row_pro['country'];
    }
?>

<div class="container-fluid p-2">
	<div class="card">
		<div class="card-header">
			<h3 class="h3-responsive p-2 text-center">Edit Account</h3>
		</div>
		<div class="card-body">
			<div class="container-fluid">
				<form class="p-3 grey-text" method="post" action="" enctype="multipart/form-data">
					<div class="row">					
						<div class="col-md-6">
							<div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
				              <input type="text" id="nameOfCompany" class="form-control form-control-sm" name="nameOfCompany" value="<?php echo $emp_name;?>">
				              <label for="nameOfCompany">Company Name</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
				              <input type="text" id="aboutCompany" class="form-control form-control-sm" name="aboutCompany" value="<?php echo $emp_about;?>">
				              <label for="aboutCompany">About Company</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
				              <input type="email" id="email" class="form-control form-control-sm" name="email" value="<?php echo $emp_email;?>">
				              <label for="email">Email</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-map prefix"></i>
				              <input type="text" id="address1" class="form-control form-control-sm" name="address1" value="<?php echo $emp_address1;?>">
				              <label for="address1">Address1</label>
				            </div>
							<div class="md-form form-sm"> <i class="fa fa-map-marker prefix"></i>
				              <input type="text" id="address2" class="form-control form-control-sm" name="address2" value="<?php echo $emp_address2;?>">
				              <label for="address2">Address2</label>
				            </div>
						</div>
						<div class="col-md-6">
				            <div class="md-form form-sm"> <i class="fa fa-map-marker prefix"></i>
				              <input type="text" id="city" class="form-control form-control-sm" name="city" value="<?php echo $emp_city;?>">
				              <label for="city">City</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-map-marker prefix"></i>
				              <input type="text" id="state" class="form-control form-control-sm" name="state" value="<?php echo $emp_state;?>">
				              <label for="state">State</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-map-marker prefix"></i>
				              <input type="text" id="zipcode" class="form-control form-control-sm" name="zipcode" value="<?php echo $emp_zipcode;?>">
				              <label for="zipcode">Zipcode</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-phone prefix"></i>
				              <input type="text" id="phone" class="form-control form-control-sm" name="phone" value="<?php echo $emp_phone;?>">
				              <label for="phone">Phone</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-map-marker prefix"></i>
				              <input type="text" id="country" class="form-control form-control-sm" name="country" value="India">
				              <label for="country">Country</label>
				            </div>
						</div>
						<div class="text-center mt-4">
			              	<button class="btn btn-default" type="submit" name="update">Update <i class="fa fa-paper-plane-o ml-1"></i></button>
			            </div>					
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
