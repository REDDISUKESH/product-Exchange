<?php
// Start session
session_start();

// Check if user is logged in
if(!isset($_SESSION['email'])){
    // User is not logged in, redirect to login page
    header('location: login.php');
    exit();
}

    include 'connect.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!--javascript files start -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--javascript files end -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="css/post2.css">
    <title>Buy and Sell</title>
</head>

<body>
    <h1>Upload Your Post!!</h1>
    <div class="container">
        <form action="imageupload/postup.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Bname">Product Name</label>
                    <input type="text" class="form-control" id="productname" name="productname" autocomplete="off" required>
                    <h5 id="bonamchk"></h5>
                </div>
                <div class="form-group col-md-6">
                    <label for="Bname">Product Brand</label>
                    <input type="text" class="form-control" id="productname" name="productBrand" autocomplete="off" required>
                    <h5 id="bonamchk"></h5>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="ogprice">Original Price</label>
                    <input type="text" class="form-control" id="orgprice" name="ogpric" autocomplete="off" required>
                    <h5 id="ogpchk"></h5>
                </div>
                <!-- <div class="form-group col-md-6">
                    <label for="exprice">Expected Price</label>
                    <input type="text" class="form-control" id="exprice" name="expric" autocomplete="off" required>
                </div> -->
            </div>
            <div class="form-row">
                <label for="tarea1">Describe your product and its condition</label>
                <textarea class="form-control" id="tarea1" rows="4" name="describe" autocomplete="off" required></textarea>
                <h5 id="deschk"></h5>
            </div>
            <break>
                <br>
                <div class="class form-row">
                    <label for="exampleFormControlTextarea1">Upload some pictures of your product</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="File1"
                                aria-describedby="inputGroupFileAddon01" required name="pic1">
                            <label class="custom-file-label" for="inputGroupFile01">Choose Your Product Image file
                            </label>
                        </div>
                    </div>
                </div>
               <label for="exampleFormControlTextarea1">Select categories of your product</label>
                <div class="form row">
                     <div class="form-group col-md-3">
                        <label for="inputState1">Product</label>
                        <select id="inputState1" class="form-control" name="categoryid">
                            <option value="">Choose...</option>
                             <?php include'imageupload/select.php';?>
                        </select>
                        <h5 id="selchk"></h5>
                    </div> 
                     
                </div> 

                <div class="form-group ">
                    <button type="submit" class="btn btn-primary col-md-12 px-3" id="subtn" name="insertproduct" value="insert_products">Submit</button>
                </div>
                
        </form>
    </div>

    </div>
    <!-- <?php include'footer.php';?> -->
</body>

</html>