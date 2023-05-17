<?php
include 'connect.php';
include 'imageupload\function.php';
global $conn;
$product_id=$_POST['product_id']; 
$sql = "SELECT  email FROM `registration` 
JOIN `product` ON `product`.`user_id` = `registration`.`user_id`
WHERE `p_id` = $product_id";
$result_query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result_query);
$owner_email=$row['email'];
echo "$owner_email";
  if(!empty($_POST["send"]))
  {
    $userName=$_POST["uname"];
    $useremail=$_POST["uemail"];
    $mobileno=$_POST["pno"];
    $Expectedprice=$_POST["price"];
    $message=$_POST["message"];
    $toemail="owner_email";
    $mailHeaders="Name: ".$userName.
    "\r\n Email: " .$useremail.
    "\r\n phone number: " .$mobileno.
    "\r\n Message: " .$message. "\r\n";
      if(mail($toemail,$userName,$mailHeaders))
      {
        $message="Your Information is received successfully.";
        header('location:back.html');
      }else
      {
        die("Error!");
      }
  } 
?>