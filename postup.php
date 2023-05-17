<?php
   
    session_start();
    include '../connect.php';
    if(isset($_POST['insertproduct']))
    {
    
        global $conn;
      
        $user_email = $_SESSION['email'];
        
        // Get user_id from the database
        $user_id_query = "SELECT user_id FROM `registration` WHERE email='$user_email'";
        $user_id_result = mysqli_query($conn, $user_id_query);
        $user_id_row = mysqli_fetch_assoc($user_id_result);
        $user_id = $user_id_row['user_id'];
        
        $product_title=$_POST['productname'];
        $product_orp=$_POST['ogpric'];
        $product_status='Available';
        $product_des=$_POST['describe'];
        $product_cat=$_POST['categoryid'];
        $Brand=$_POST['productBrand'];
       // $var=1;
        //accessing images
        $product_image=$_FILES['pic1']['name'];
       //accesing img temp name
       $temp_image=$_FILES['pic1']['tmp_name'];

       //checking empty condition
       if($product_title=='' or $product_orp=='' or $product_des=='' or $product_cat=='' or $product_image=='' )
       {
            echo "<script>alert('please fill all the available field')</script>";
            exit();
       }
       else{
            move_uploaded_file($temp_image,"./productimage/$product_image");
            
          //$sql = "INSERT INTO `product` (p_name, og_pr, descript, pic1, categoryid, date, status,id) VALUES ('$product_title', '$product_orp', '$product_des', '$product_image', '$product_cat', NOW(), '$product_status')";
         $sql = "INSERT INTO `product` (p_name,Brand, og_pr, descript, pic1, categoryid, date, status,user_id) VALUES ('$product_title','$Brand', '$product_orp', '$product_des', '$product_image', '$product_cat', NOW(), '$product_status','$user_id' )";
            $result_query=mysqli_query($conn,$sql);
            if($result_query)
            {
               //echo  "<script>alert('succesfully insert the product')</script>";
               header('location:../about.php');
            }
       }
        

    }
?>
