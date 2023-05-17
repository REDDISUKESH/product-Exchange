<?php
include 'connect.php';
include 'click.js';
if (isset($_GET['sort_option'])) {
  $sortMethod = $_GET['sort_option'];
  $sql = "SELECT * FROM `product` where p_name='$sortMethod' ORDER BY ";
  if ($sortMethod === 'cost') {
    $sql .= "`og_pr` ASC";
  } else if ($sortMethod === 'date') {
    $sql .= "`date` DESC";
  } else {
    $sql .= "`p_id` DESC";
  }
  $result_query = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result_query) == 0) {
    echo "<h2 class='text-center text-danger'>No Products Found...</h2>";
  } else {
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['p_id'];
      $product_name = $row['p_name'];
      $product_price = $row['og_pr'];
      $product_des = $row['descript'];
      $product_image = $row['pic1'];
      $category_id = $row['categoryid'];
      $Brand = $row['Brand'];
      $Date = $row['date'];
      echo "
        <div class='pro'>
          <img src='./imageupload/productimage/$product_image' alt='$product_name'>
          <div class='des'>
            <a href='./product_details.php?id=$product_id'>$product_name</a>
            <p>Original price:<span>$product_price</span></p>
            <h3>Brand Name:<span>$Brand</span></h3>
          </div>
          <p>Date:$Date</p>
        </div>
      ";
    }
  }
}
