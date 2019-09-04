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

<!-- Orders to Fill -->

<?php 
	$txnQuery = "SELECT * FROM orders WHERE paid = 1";
	$txnResults = $db->query($txnQuery);
?>
<?php 
	$invoiceQuery = "SELECT t.id, t.cart_id, t.fullname, t.email, t.phone, t.address1, t.address2, t.city, t.zipcode, t.productinfo, t.txn_date, t.total, c.items, o.paid FROM transactions t INNER JOIN cart c ON t.cart_id = c.id INNER JOIN orders o ON t.fullname = o.fullname WHERE o.paid = 1 ORDER BY t.txn_date";
	$invoiceResults = $db->query($invoiceQuery);
?>

	<main>
		<h1 class="text-center"> This is index page of admin </h1>
	</main>

<?php
	include 'includes/footer.php';
?>

<?php } ?>