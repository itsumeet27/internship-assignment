<?php
    include('db.php');

    $id = (int)$_GET['id'];
    $sql = "DELETE FROM invoice WHERE id = '$id'";
    $val = $db->query($sql);
    if($val){
        echo "<script>alert('Deleted successfully');</script>";
        header('location: index.php');
    }
?>