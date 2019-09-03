<?php
    include('db.php');

    if(isset($_POST['send'])){
        $invoiceNo = htmlspecialchars($_POST['invoiceNo']);
        $nameOfCompany = htmlspecialchars($_POST['nameOfCompany']);
        $addressOfCompany = htmlspecialchars($_POST['addressOfCompany']);
        $invoiceDate = htmlspecialchars($_POST['invoiceDate']);
        $dateOfSupply = htmlspecialchars($_POST['dateOfSupply']);
        $pono = htmlspecialchars($_POST['pono']);
        $gst = htmlspecialchars($_POST['gst']);
        $productName = htmlspecialchars($_POST['productName']);
        $hsn = htmlspecialchars($_POST['hsn']);
        $quantity = htmlspecialchars($_POST['quantity']);
        $price = htmlspecialchars($_POST['price']);

        $sql = "INSERT INTO invoice (`invoiceNo`,`nameOfCompany`,`addressOfCompany`,`invoiceDate`,`dateOfSupply`,`pono`,`gst`,`productName`,`hsn`,`quantity`,`price`) VALUES ('$invoiceNo','$nameOfCompany','$addressOfCompany','$invoiceDate','$dateOfSupply','$pono','$gst','$productName','$hsn','$quantity','$price')";
        $val = $db->query($sql);
        if($val){
            echo "<script>alert('Successfully inserted');</script>";
            header('location: index.php');
        }
    }
?>