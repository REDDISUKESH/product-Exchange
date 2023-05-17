<?php
session_start();
include '../connect.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the product ID from the form
  $product_id = $_POST['product_id'];

  // Get the buyer details from the form
  $buyer_name = $_POST['uname'];
  $buyer_email = $_POST['uemail'];//sender email address
  $buyer_phone = $_POST['pno'];
  $buyer_message = $_POST['message'];
  $buyer_price = $_POST['price'];

  // Get the owner's email from the registration table
  $query = "SELECT email FROM registration WHERE user_id = (SELECT user_id FROM product WHERE p_id = '$product_id')";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $owner_email = $row['email'];

    // Send an email to the owner
    $to = $owner_email;//receiver email address
    $subject = "New Request for Product #$product_id";
    $message = "Hi,\n\nYou have received a new request for your product with ID #$product_id. Here are the details:\n\nName: $buyer_name\nEmail: $buyer_email\nPhone: $buyer_phone\nPrice: $buyer_price\nMessage: $buyer_message\n\nPlease contact the buyer as soon as possible to finalize the sale.\n\nBest regards,\nYour Website Team";
    $headers = "From:". $buyer_email;
    $hearders2="From:".$to;

    if (mail($to, $subject, $message, $headers)) {
      // Redirect the user to the thank you page
      //header("Location: thank_you.php?email=$buyer_email");
      echo '<script type="text/javascript">alert("message was sent successfully,we will contact you sortly!")</script>';
      exit;
    } else {
      // Redirect the user to the about page
      echo '<script type="text/javascript">alert("Submission failed")</script>';
      exit;
    }
  } else {
    // Redirect the user to the about page
    //header("Location: about.php");
    exit;
  }
}

// Render the form
?>
