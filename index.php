<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Buy and Sell</title>
  </head>
  <body>
<div class="row mx-2 block">
    <?php $i=0;
    include 'connect.php';
    session_start();
    $e_id = $_SESSION['uid'];
    $sql="SELECT * FROM `product` ORDER BY `usernam` DESC LIMIT 2";//
    $result = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {    $pro_n=$row['p_name'];
      $og_pr=$row['og_pr'];
      $ex_pr=$row['ex_pr'];
      $pic=$row['pic1'];
      $p_id=$row['p_id'];
      echo '<div class="card mb-3 mx-2" style="max-width: 32%;">
      <div class="row no-gutters">
        <div class="col-md-4">
         /*  <img src="img/cycle..jpeg'.$pic.'" class="card-img" alt="..." width="500" height="250"> */
        </div>
        <div class="col-md-8">
          <div class="card-body">
          <h5 class="card-title"><a href="post.php?pid='.$p_id.'" class="text-dark">'.$pro_n.'</a></h5>
            <p class="card-text">Original Price: '.$og_pr .'</p>
            <p class="card-text">Expected Price: '.$ex_pr .'</p>
          </div>
        </div>
      </div>
    </div>';

}
?>
</div>
  <?php include'footer.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>