<?php
include 'connect.php';
include 'imageupload/function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style1.css">
  <script src="https://kit.fontawesome.com/yourkitid.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="hero">
    <form action="submit.php" method="post">
      <div class="input-group"> 
        <label for="Name"> </label>
        <input type="text" id="Name" placeholder="Your Name" name="uname" required autocomplete="off">
      </div>
      
      <div class="input-group"> 
        <label for="email"> </label>
        <input type="email" id="email" placeholder="Your email" name="email" required autocomplete="off">
      </div>
      
      <div class="input-group"> 
        <label for="Number"> </label>
        <input type="tel" id="Number" placeholder="Phone number" name="contact" required autocomplete="off">
      </div>
      
      <div class="input-group"> 
        <label for="price"> </label>
        <input type="text" id="price" placeholder="Your expected price" name="price" required autocomplete="off">
      </div>
      
      <?php
      if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
        // Retrieve the value of the product_id query parameter and store it in a variable
        $pid = $_POST['product_id'];
        //echo "$pid";
        // Echo the value of the product_id variable as a hidden input field
         /* "<input type='hidden' name='product_id' value='$product_id'>"; */
    } else {
        echo "Product ID not found.";
    }

    /* if (isset($_POST['owner_email']) && !empty($_POST['owner_email'])) {
        // Retrieve the value of the owner_id query parameter and store it in a variable
        $owner_e = $_POST['owner_email'];
        echo "$owner_e";
        // Echo the value of the owner_id variable as a hidden input field
        echo "<input type='hidden' name='owner_email' value='$owner_e'>";
    } else {
        echo "Owner ID not found.";
    } */
    
      ?>
      <input type="hidden" name="product_id" value="<?php echo $pid ?>">

      <button type="submit" class="btn btn-primary" id="reqsubmit">Submit request</button>
      
    </form>
  </div>
</body>
</html>
