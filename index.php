<?php 
  session_start();
  require_once 'core/init.php';
  include 'includes/header.php'; 
?>

<?php 
  $sql = "SELECT * FROM invoice WHERE deleted=0";
  $invoices = $db->query($sql);
?>
<main>
  <h3 class="text-center p-3">List of Invoices</h3>
  <div class="container-fluid row">
    <?php while($invoice = mysqli_fetch_assoc($invoices)): ?>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h5 class="p-2 text-center card-title"><?=$invoice['nameOfCompany'];?></h5>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <th><b>Invoice No</b></th>
              <td><?=$invoice['invoiceNo'];?></td>
            </tr>
            <tr>
              <th><b>Invoice Date</b></th>
              <td><?=$invoice['invoiceDate'];?></td>
            </tr>
            <tr>
              <th><b>Product Description</b></th>
              <td><?=$invoice['productName'];?></td>
            </tr>
            <tr>
              <th><b>Quantity</b></th>
              <td><?=$invoice['quantity'];?></td>
            </tr>
            <tr>
              <th><b>Price</b></th>
              <td><?=$invoice['price'];?></td>
            </tr>
          </table>
        </div>
        <div class="card-footer">
          <a href="invoice.php?invoice_id=<?=$invoice['id'];?>" class="btn btn-success btn-black waves-effect z-depth-0">Print</a>
        </div>
      </div>
    </div>
    <?php endwhile;?>
  </div>
</main>
<?php include 'includes/footer.php'; ?>