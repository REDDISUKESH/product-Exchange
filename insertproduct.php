<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">   
    <link rel="stylesheet" href="css/insert1.css">

</head>
<body >
    <div class="container">
        <h1>Upload your Product </h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline">
                <label for="product_title" class="form-label">Product Name</label>
                <input type="text " name="product_title" id="product_title" class="form-control" placeholder="Enter your product title" autocomplete="off" required>
            </div> 
             <div class="form-outline">
                <label for="product_title" class="form-label">Product Description</label>
                <input type="text " name="description" id="description" class="form-control" placeholder="Enter your product title" autocomplete="off" required>
            </div> 
            <div class="form-outline">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a category</option>
                <?php include'imageupload/select.php';?>
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image" class="form-label">Product Image</label>
                <input type="file " name="product_image" id="product_image" class="form-control" required>
            </div> 

        </form>

    </div>
    
</body>