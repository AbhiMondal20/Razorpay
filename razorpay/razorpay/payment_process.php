<?php
session_start();
include('db.php');
if(isset($_POST['amt']) && isset($_POST['name']) && isset($_POST['email'])){
    $amt=$_POST['amt'];
    $name=$_POST['name'];
    $payment_status="pending";
    $email = $_POST['email'];
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($con,"INSERT INTO `payment`(`name`, `email`, `mobile`, `amount`, `status`) values('$name','$email','','$amt','0')");
    $_SESSION['OID']=mysqli_insert_id($con);
}


if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($con,"update payment set status ='1',payment_id='$payment_id' where id='".$_SESSION['OID']."'");
}
?>