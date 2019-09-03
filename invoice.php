<!DOCTYPE html>

<?php 
  include 'core/init.php';
  $sql = "SELECT * FROM invoice WHERE deleted=0";
  $invoices = $db->query($sql);
?>

<html lang="en">

<?php 
  if(isset($_GET['invoice_id'])){
    $id = sanitize((int)$_GET['invoice_id']);
    $sql = "SELECT * FROM invoice WHERE id = '$id'";
    $sqlResult = $db->query($sql);
    $invoiceCount = mysqli_num_rows($sqlResult);
    if($invoiceCount > 0){
      while ($row = mysqli_fetch_array($sqlResult)) {
        $invoiceNo = $row['invoiceNo'];
        $productId = $row['productId'];
        $invoiceDate = $row['invoiceDate'];
        $dateOfSupply = $row['dateOfSupply'];
        $nameOfCompany = $row['nameOfCompany'];
        $addressOfCompany = $row['addressOfCompany'];
        $pono = $row['pono'];
        $gst = $row['gst'];
        $productName = $row['productName'];
        $hsn = $row['hsn'];
        $price = $row['price'];
        $quantity = $row['quantity'];
      }
    }else{
      echo "Invoice does not exist";
      exit();
    }
  }
  else{
    echo "Data is missing, please select the invoice";
    exit();
  }
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">  
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script> 
</head>

<body>

  <div style="height: 100vh" class="container-fluid">
    <header>
      <h2 class="text-center p-2"><b>AMIT TRADERS</b></h2>
      <p class="text-center">
        Manufacturers And Suppliers of all types of Leather Goods and Corporate Gifts<br>
        <b>GST:</b> 27AZWPS0795D1ZO<br>
        <b>Address:</b> Room No. 3, Chitrakut Co- op HSG Soc., 90 Feet road, Dharavi Mumbai -400017 |
        <b>Mobile: </b>9768010310 | <b>E-mail id:</b> <a href="mailto:dk.amittraders@gmail.com" style="text-decoration: none;color: black;">dk.amittraders@gmail.com</a>
      </p>
    </header>
    <main class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th colspan="3"><h3 class="h4-responsive text-center"><b>TAX INVOICE</b></h3></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="2"><b>Invoice No:</b> <?php echo $invoiceNo; ?></td>
            <td><b>Invoice Date: </b> <?php echo $invoiceDate; ?></td>
          </tr>         
          <tr>
            <td><b>State: </b> Maharashtra</td>
            <td><b>Pin Code: </b> 401107</td>
            <td><b>Date of Supply: </b> <?php echo $dateOfSupply; ?></td>
          </tr>           
        </tbody>
      </table>
      <table class="table table-bordered">
        <tr>
          <td><b>Details of Receiver | Billed To</b></td>
          <td><b>Details of Consignee | Shipped To</b></td>
        </tr>
        <tr>
          <td><b>Name of Company: </b> <?php echo $nameOfCompany; ?>
          <td><b>Name of Company: </b> <?php echo $nameOfCompany; ?>
        </tr>
        <tr>
          <td><b>Address of Company: </b> <?php echo $addressOfCompany; ?>
          <td><b>Address of Company: </b> <?php echo $addressOfCompany; ?>
        </tr>
        <tr>
          <td><b>PO No: </b> <?php echo $pono; ?>
          <td><b>GST No: </b> <?php echo $gst; ?>
        </tr>
        <tr>
          <td><b>Country: </b> India
          <td><b>Country: </b> India
        </tr>
      </table>
      <table class="table table-bordered text-center">
        <tr>
          <td><b>Sr. No.</b></td>
          <td><b>Product Description</b></td>
          <td><b>HSN Code</b></td>
          <td><b>Quantity</b></td>
          <td><b>Price</b></td>
          <td><b>Subtotal</b></td>
          <td colspan="2"><b>CGST</b></td>
          <td colspan="2"><b>SGST</b></td>
          <td colspan="2"><b>IGST</b></td>
          <td><b>Total</b></td>
        </tr>
        <tr>
          <td colspan="6"></td>
          <td><b>Rate</b></td>
          <td><b>Amount</b></td>
          <td><b>Rate</b></td>
          <td><b>Amount</b></td>
          <td><b>Rate</b></td>
          <td><b>Amount</b></td>
          <td rowspan="5"><b><?php echo ($quantity*$price*1.18); ?></b></td>

          <script type="text/javascript">
          var total = <?php echo ($quantity*$price*1.18); ?>;
          function numberToEnglish(n, custom_join_character) {

          var string = n.toString(),
              units, tens, scales, start, end, chunks, chunksLen, chunk, ints, i, word, words;

          var and = custom_join_character || 'and';

          /* Is number zero? */
          if (parseInt(string) === 0) {
              return 'zero';
          }

          /* Array of units as words */
          units = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];

          /* Array of tens as words */
          tens = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

          /* Array of scales as words */
          scales = ['', 'Thousand', 'Million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion', 'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quatttuor-decillion', 'quindecillion', 'sexdecillion', 'septen-decillion', 'octodecillion', 'novemdecillion', 'vigintillion', 'centillion'];

          /* Split user arguemnt into 3 digit chunks from right to left */
          start = string.length;
          chunks = [];
          while (start > 0) {
              end = start;
              chunks.push(string.slice((start = Math.max(0, start - 3)), end));
          }

          /* Check if function has enough scale words to be able to stringify the user argument */
          chunksLen = chunks.length;
          if (chunksLen > scales.length) {
              return '';
          }

          /* Stringify each integer in each chunk */
          words = [];
          for (i = 0; i < chunksLen; i++) {

              chunk = parseInt(chunks[i]);

              if (chunk) {

                  /* Split chunk into array of individual integers */
                  ints = chunks[i].split('').reverse().map(parseFloat);

                  /* If tens integer is 1, i.e. 10, then add 10 to units integer */
                  if (ints[1] === 1) {
                      ints[0] += 10;
                  }

                  /* Add scale word if chunk is not zero and array item exists */
                  if ((word = scales[i])) {
                      words.push(word);
                  }

                  /* Add unit word if array item exists */
                  if ((word = units[ints[0]])) {
                      words.push(word);
                  }

                  /* Add tens word if array item exists */
                  if ((word = tens[ints[1]])) {
                      words.push(word);
                  }

                  /* Add 'and' string after units or tens integer if: */
                  if (ints[0] || ints[1]) {

                      /* Chunk has a hundreds integer or chunk is the first of multiple chunks */
                      if (ints[2] || !i && chunksLen) {
                          words.push(and);
                      }

                  }

                  /* Add hundreds word if array item exists */
                  if ((word = units[ints[2]])) {
                      words.push(word + ' hundred');
                  }

              }

          }

          return words.reverse().join(' ');

          }
          </script>
        </tr>
        <tr>
          <td><?php echo $productId; ?></td>
          <td><?php echo $productName; ?></td>
          <td><?php echo $hsn; ?></td>
          <td><?php echo $quantity; ?></td>
          <td><?php echo $price; ?></td>
          <td><?php echo ($quantity*$price); ?></td>
          <td>9%</td>
          <td><?php echo ($quantity*$price*0.09); ?></td>
          <td>9%</td>
          <td><?php echo ($quantity*$price*0.09); ?></td>
          <td>18%</td>
          <td><?php echo ($quantity*$price*0.18); ?></td>

        </tr>
      </table>
      <table class="table table-bordered">
        <tr>
          <td colspan="5"><b>Total Amount in Words</b></td>
          <td><b>Total Amount Before GST</b></td>
          <td><?php echo $quantity*$price; ?></td>
        </tr>
        <tr>
          <td rowspan="5" colspan="5"><script type="text/javascript">document.write(numberToEnglish(total), ' Only.')</script></td>
          <td><b>Add CGST (9%)</b></td>
          <td><?php echo ($quantity*$price*0.09); ?></td>
        </tr>
        <tr>
          <td><b>Add SGST (9%)</b></td>
          <td><?php echo ($quantity*$price*0.09); ?></td>
        </tr>
        <tr>
          <td><b>Add IGST (9%)</b></td>
          <td></td>
        </tr>
        <tr>
          <td><b>Total GST</b></td>
          <td><?php echo ($quantity*$price*0.18); ?></td>
        </tr>
        <tr>
          <td><b>Total Amount After GST</b></td>
          <td><b><?php echo ($quantity*$price*1.18); ?></b></td>
        </tr>
      </table>
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td colspan="2"><h5 class="h5-responsive text-center"><b>BANK DETAILS</b></h5></td>
            <td colspan="2"><h5 class="h5-responsive text-center"><b>AUTHORISED SIGNATORY</b></h5></td>
          </tr>
          <tr>
            <td><b>Bank Account Number</b></td>
            <td>033002000001969</td>
            <td rowspan="3" class="text-center p-3"><b>For, AMIT TRADERS</b></td>
          </tr>
          <tr>
            <td><b>IFSC Code</b></td>
            <td>IOBA0000330</td>
          </tr>
          <tr>
            <td><b>Bank Name</b></td>
            <td>INDIAN OVERSEAS BANK, JOGESHWARI EAST</td>
          </tr>
        </tbody>
      </table>
    </main>
  </div>