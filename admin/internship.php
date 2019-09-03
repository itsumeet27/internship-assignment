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
    <h3 class="text-center p-3">This is the Internship Section</h3>
    <?php
      if(isset($_GET['delete'])){
        $id = sanitize($_GET['delete']);
        $db->query("UPDATE internships SET deleted = 1 WHERE id = '$id'");
        header('Location: internships.php');
      }

      if(isset($_GET['add']) || isset($_GET['edit'])){
        $parentQuery = $db->query("SELECT * FROM internships");
        $invoiceNo = ((isset($_POST['invoiceNo']) && $_POST['invoiceNo'] != '')?sanitize($_POST['invoiceNo']):'');
        $productId = ((isset($_POST['productId']) && $_POST['productId'] != '')?sanitize($_POST['productId']):'');
        $invoiceDate = ((isset($_POST['invoiceDate']) && $_POST['invoiceDate'] != '')?sanitize($_POST['invoiceDate']):'');
        $dateOfSupply = ((isset($_POST['dateOfSupply']) && $_POST['dateOfSupply'] != '')?sanitize($_POST['dateOfSupply']):'');
        $nameOfCompany = ((isset($_POST['nameOfCompany']) && $_POST['nameOfCompany'] != '')?sanitize($_POST['nameOfCompany']):'');
        $addressOfCompany = ((isset($_POST['addressOfCompany']) && $_POST['addressOfCompany'] != '')?sanitize($_POST['addressOfCompany']):'');
        $pono = ((isset($_POST['pono']) && $_POST['pono'] != '')?sanitize($_POST['pono']):'');    
        $gst = ((isset($_POST['gst']) && $_POST['gst'] != '')?sanitize($_POST['gst']):'');
        $productName = ((isset($_POST['productName']) && $_POST['productName'] != '')?sanitize($_POST['productName']):'');
        $hsn = ((isset($_POST['hsn']) && $_POST['hsn'] != '')?sanitize($_POST['hsn']):'');
        $quantity = ((isset($_POST['quantity']) && $_POST['quantity'] != '')?sanitize($_POST['quantity']):'');
        $price = ((isset($_POST['price']) && $_POST['price'] != '')?sanitize($_POST['price']):'');

        if(isset($_GET['edit'])){
          $edit_id = (int)$_GET['edit'];
          $invoiceResults = $db->query("SELECT * FROM invoice WHERE id = '$edit_id'");
          $invoice = mysqli_fetch_assoc($invoiceResults);
          $invoiceNo = ((isset($_POST['invoiceNo']) && $_POST['invoiceNo'] != '')?sanitize($_POST['invoiceNo']):$invoice['invoiceNo']);
          $productId = ((isset($_POST['productId']) && $_POST['productId'] != '')?sanitize($_POST['productId']):$invoice['productId']);
          $invoiceDate = ((isset($_POST['invoiceDate']) && $_POST['invoiceDate'] != '')?sanitize($_POST['invoiceDate']):$invoice['invoiceDate']);
          $dateOfSupply = ((isset($_POST['dateOfSupply']) && $_POST['dateOfSupply'] != '')?sanitize($_POST['dateOfSupply']):$invoice['dateOfSupply']);
          $nameOfCompany = ((isset($_POST['nameOfCompany']) && $_POST['nameOfCompany'] != '')?sanitize($_POST['nameOfCompany']):$invoice['nameOfCompany']);
          $addressOfCompany = ((isset($_POST['addressOfCompany']) && $_POST['addressOfCompany'] != '')?sanitize($_POST['addressOfCompany']):$invoice['addressOfCompany']);
          
          $pono = ((isset($_POST['pono']) && $_POST['pono'] != '')?sanitize($_POST['pono']):$invoice['pono']);
          $gst = ((isset($_POST['gst']) && $_POST['gst'] != '')?sanitize($_POST['gst']):$invoice['gst']);
          $productName = ((isset($_POST['productName']) && $_POST['productName'] != '')?sanitize($_POST['productName']):$invoice['productName']);
          $hsn = ((isset($_POST['hsn']) && $_POST['hsn'] != '')?sanitize($_POST['hsn']):$invoice['hsn']);
          $quantity = ((isset($_POST['quantity']) && $_POST['quantity'] != '')?sanitize($_POST['quantity']):$invoice['quantity']);
          $price = ((isset($_POST['price']) && $_POST['price'] != '')?sanitize($_POST['price']):$invoice['price']);
        }

        if($_POST){
          $insertSql = "INSERT INTO internships (`invoiceNo`,`nameOfCompany`,`addressOfCompany`,`invoiceDate`,`dateOfSupply`,`pono`,`gst`,`productName`,`hsn`,`quantity`,`price`) VALUES ('$invoiceNo','$nameOfCompany','$addressOfCompany','$invoiceDate','$dateOfSupply','$pono','$gst','$productName','$hsn','$quantity','$price')";
            if(isset($_GET['edit'])){
              $insertSql = "UPDATE invoice SET invoiceNo = '$invoiceNo', nameOfCompany = '$nameOfCompany', invoiceDate = '$invoiceDate', dateOfSupply = '$dateOfSupply', pono = '$pono', gst = '$gst', productName = '$productName', hsn = '$hsn', quantity = '$quantity', price = '$price' WHERE id = '$edit_id'";
            }
          $db->query($insertSql);
        }
    ?>
    <div class="container">
      <div class="">
        <div class="card">
          <div class="card-header card-title text-center">
            <h4 class="text-center"><?=((isset($_GET['edit']))?'EDIT':'ADD');?> INTERNSHIP DETAILS</h4>
          </div>
          <div class="card-body">
            <!-- Form -->
            <form class="text-center" style="color: #757575;" action="internship.php?<?=((isset($_GET['edit']))?'edit='.$edit_id:'add=1');?>" method="post" enctype="multipart/form-data">

              <!-- Category -->
              <div class="md-form">
                <input type="text" id="category" name="category" class="form-control" value="<?=$category;?>" required>
                <label for="category">Category</label>
              </div>
              <!-- Posted On -->
              <div class="md-form">
                <input type="date" id="postedOn" name="postedOn" class="form-control" value="<?=$postedOn;?>" required>
                <label for="postedOn">Posted On</label>
              </div>
              <!-- Apply By -->
              <div class="md-form">
                <input type="date" id="applyBy" name="applyBy" class="form-control" value="<?=$applyBy;?>" required>
                <label for="applyBy">Apply By</label>
              </div>
              <!-- Name of Company -->
              <div class="md-form">
                <input type="text" id="nameOfCompany" name="nameOfCompany" class="form-control" value="<?=$nameOfCompany;?>" required>
                <label for="nameOfCompany">Name of Company</label>
              </div>
              <!-- About Company -->
              <div class="md-form">
                <input type="text" id="aboutCompany" name="aboutCompany" class="form-control" value="<?=$aboutCompany;?>" required>
                <label for="aboutCompany">About Company</label>
              </div>
              <!-- About Internship -->
              <div class="md-form">
                <input type="text" id="aboutInternship" name="aboutInternship" class="form-control" value="<?=$aboutInternship;?>" required>
                <label for="aboutInternship">About Internship</label>
              </div>
              <!-- Location -->
              <div class="md-form">
                <input type="text" id="location" name="location" class="form-control" value="<?=$location;?>" required>
                <label for="location">Location</label>
              </div>
              <!-- Perks of Internship -->
              <div class="md-form">
                <input type="text" id="perks" name="perks" class="form-control" value="<?=$perks;?>" required>
                <label for="perks">Perks of Internship</label>
              </div>
              <!-- Duration -->
              <div class="md-form">
                <input type="number" id="duration" name="duration" class="form-control" value="<?=$duration;?>" required>
                <label for="duration">Duration</label>
              </div>
              <!-- Stipend -->
              <div class="md-form">
                <input type="number" id="stipend" name="stipend" class="form-control" value="<?=$stipend;?>" required>
                <label for="stipend">Stipend</label>
              </div>
              <!-- Price -->
              <div class="md-form">
                <input type="number" id="positions" name="positions" class="form-control" value="<?=$positions;?>" required>
                <label for="positions">No. of Positions Available</label>
              </div>
              <!--Material textarea-->
              <div class="md-form">
                <textarea id="whoCanApply" name="whoCanApply" class="md-textarea form-control" value="<?=$whoCanApply;?>" rows="3" required></textarea>
                <label for="whoCanApply">Who Can Apply</label>
              </div>

              <div class="card-footer">
                <button class="btn btn-black waves-effect z-depth-0" type="submit" name="add"><?=((isset($_GET['edit']))?'EDIT':'ADD');?> INVOICE</button>
              </div>
            </form>
          </div>      
        </div>
      </div>
      <?php } 
          else{
            $sql = "SELECT * FROM invoice WHERE deleted = 0";
            $presults = $db->query($sql);
          
      ?>
      <div class="container-fluid table-responsive">  
        <a href="internship.php?add=1" class="btn text-white" style="background-color: #1c2a48" id="add-product-btn">Add Invoice</a>
        <div class="clearfix"></div><br>
        <table class="table table-striped table-bordered" style="display: table;">
          <thead>
            <th></th>
            <th></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Invoice No</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Invoice Date</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Date of Supply</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Company Name</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Company Address</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>PO No</b></h5></th>          
            <th class="text-center"><h5 class="h5-responsive"><b>HSN Code</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Product Description</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>GST No</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Quantity</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Price</b></h5></th>
          </thead>
          <tbody>
            <?php 
              $sql = "SELECT * FROM invoice WHERE deleted = 0";
              $invoices = $db->query($sql);
            ?>

            <?php while($invoice = mysqli_fetch_assoc($invoices)):?>
              <tr>
                <td>
                  <a href="invoice.php?edit=<?=$invoice['id'];?>"><i class="fas fa-edit"></i></a>
                </td>
                <td>
                  <a href="invoice.php?delete=<?=$invoice['id'];?>"><i class="fa fa-trash fa-lg"></i></a>
                </td>
                <td class="text-center"><?=$invoice['invoiceNo'];?></td>
                <td class="text-center"><?=$invoice['invoiceDate'];?></td>
                <td class="text-center"><?=$invoice['dateOfSupply'];?></td>
                <td class="text-center"><?=$invoice['nameOfCompany'];?></td>
                <td class="text-center"><?=$invoice['addressOfCompany'];?></td>
                <td class="text-center"><?=$invoice['pono'];?></td>
                <td class="text-center"><?=$invoice['gst'];?></td>
                <td class="text-center"><?=$invoice['productName'];?></td>
                <td class="text-center"><?=$invoice['hsn'];?></td>
                <td class="text-center"><?=$invoice['quantity'];?></td>
                <td class="text-center"><?=$invoice['price'];?></td>
              </tr>
            <?php endwhile;?>
          </tbody>
        </table>
      </div>
    <?php } ?>
    </div>
  </main>

<?php include 'includes/footer.php'; } ?>