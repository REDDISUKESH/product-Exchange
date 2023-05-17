<?php
include 'connect.php';
include 'imageupload/function.php';

// retrieve the form data
$uname = $_POST['uname'];
$remail = $_POST['email'];
$contact = $_POST['contact'];
$price = $_POST['price'];
$product_id = $_POST['product_id'];
echo $product_id;

// get the product id from the URL parameter

// get the owner id from the product table
$sql = "SELECT user_id FROM `product` WHERE p_id = '$product_id'";
echo $sql;
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  
  $user_id = $row['user_id'];
  //echo "$user_id";
} else {
  echo "Error: product not found";
  exit;
}

// prepare the SQL query to insert the data into the requests table
$sql = "INSERT INTO requests (uname, email, contact, price, pos_id, own_id) VALUES ('$uname', '$remail', '$contact', '$price', '$product_id', '$user_id')";

// execute the query
if (mysqli_query($conn, $sql)) {
  echo "Request submitted successfully!";
  header('location: about.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// close the database connection
mysqli_close($conn);
?>
