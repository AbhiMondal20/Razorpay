<?php
session_start();
include('db_conn.php');
if(isset($_POST['amount']) && isset($_POST['name']) && isset($_POST['email'])&& isset($_POST['mobile'])){
    $amount=$_POST['amount'];
    $name=$_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $payment_status="pending";
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($conn,"INSERT INTO `payment`(`name`, `email`, `mobile`, `amount`, `status`) VALUES ('$name','$email','$mobile','$amount','$payment_status')");
    $_SESSION['OID']=mysqli_insert_id($con);
}


if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($con,"update payment set status='complete',payment_id='$payment_id' where id='".$_SESSION['OID']."'");
}
?>