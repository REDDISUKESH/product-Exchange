<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Buy and Sell</title>
  </head>
  <body>

  <?php include'index.php';?>
  <?php include'connect.php';?>
  <?php
  $p_id=$_GET['pid'];
  $sql="SELECT * FROM product WHERE p_id=$p_id";
  $result = mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($result))
    {
      $pro_n=$row['p_name'];
      $og_pr=$row['og_pr'];
      $ex_pr=$row['ex_pr'];
      $des_n=$row['descript'];
      $pic1=$row['pic1'];
      $usrid=$row['usenam'];
  
    echo '<br>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4"><b>'.$pro_n.'</b></h1>

            /* <div class="w3-row-padding">
               /*  <div class="w3-col s4">
                    <img src="project_x_copy/'.$pic1.'" style="width:100%">
                </div> */
            </div> */
            <p class="lead">
            <h6> Description </h6>'.$des_n.'</p>
            <hr class="my-4">
            <!--row2-->
            <div class="w3-row-padding">
                <div class="w3-col s6">
                    <div class="w3-panel w3-border w3-round-xlarge">
                        <h6>Original Price: </h6> '.$og_pr.'
                    </div>
                </div>
                <div class="w3-col s6">
                    <div class="w3-panel w3-border w3-round-xlarge">
                        <h6>Expected Price: </h6> '.$ex_pr.'
                    </div>
                </div>
            <!--end row-->
        </div>
        <a class="btn btn-primary btn-lg" href="#" role="button" data-toggle="modal" data-target="#buyrequestmodal">Buying Request!</a>
    </div>
    </div>
</div>';
}
?>
<br>
<?php include'buyreq.php';?>

  <?php include'footer.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>