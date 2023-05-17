<?php
include './connect.php';


//<div class="container">
function getproduct()
{
    
        //include 'connect.php';
        global $conn;
        //$sql="select *from `product` order by rand() limit 0,5";
        $sql="SELECT * FROM `product` ORDER BY `product`.`date` DESC LIMIT 6";
        $result_query=mysqli_query($conn,$sql);
        /* $nums_of_rows=mysqli_num_rows($result_query);
        if($nums_of_rows==0)
        {
            echo "<h2 class='text-center text-danger'>This Product is Not Avaailable Now...</h2>";
        } */
       // $row=mysqli_fetch_assoc($result_query);
        //echo $row['p_name'];
        while( $row=mysqli_fetch_assoc($result_query))
        {
            $product_id=$row['p_id'];
            $product_name=$row['p_name'];
            $product_price=$row['og_pr'];
            $product_des=$row['descript'];
            $product_image=$row['pic1'];
            $category_id=$row['categoryid'];
            $Brand=$row['Brand'];
            $Date=$row['date'];
            $status=$row['status'];
            echo "
                    <div class='pro'>
                        <img src='./imageupload/productimage/$product_image' alt='$product_name'>
                        <div class='des'>
                          
                        <a href='./product_details.php?id=$product_id'>$product_name</a>
                            <p>Original price:$product_price</p>
                            <h3>Brand Name:<span>$Brand</span></h3>
                            <p>Status:<span>$status</span></p>
                        </div>
                        <p>Date:$Date</p>
                    </div>"
                ;
            
        }

        
   
}
//search
function search_product()
{
    global $conn;
    if(isset($_GET['search_data_product']))
    {
        $search_data_value=$_GET['search_data'];
       

         //$search_query="select * from `product` where Brand='$search_data_value'";
         //$search_query = "SELECT * FROM `product` WHERE Brand LIKE '%$search_data_value%'";
         $search_query = "SELECT * FROM `product` WHERE REPLACE(Brand, ' ', '') LIKE '%" . str_replace(' ', '', $search_data_value) . "%'";

        $result_query=mysqli_query($conn,$search_query);
        $nums_of_rows=mysqli_num_rows($result_query);
        if($nums_of_rows==0)
        {
            echo "<h1 class='text-center text-danger'>This Product is Not Avaailable Now...</h1>";
        }
        //$row=mysqli_fetch_assoc($result_query);
       // echo $row['p_name'];
        while( $row=mysqli_fetch_assoc($result_query))
        {
            $product_id=$row['p_id'];
            $product_name=$row['p_name'];
            $product_price=$row['og_pr'];
            $product_des=$row['descript'];
            $product_image=$row['pic1'];
            $category_id=$row['categoryid'];
            $Brand=$row['Brand'];
            $Date=$row['date'];
            $status=$row['status'];
            echo "
                    <div class='pro'>
                        <img src='./imageupload/productimage/$product_image' alt='$product_name'>
                        <div class='des'>
                        <a href='./product_details.php?id=$product_id'>$product_name</a>
                            <p>Original price:<span>$product_price</span></p>
                            <h3>Brand Name:<span>$Brand</span></h3>
                            <p>Status:<span>$status</span></p>
                        </div>
                        <p>Date:$Date</p>
               
                    </div>"
                ;
        }
            
    

  }
}
/* function product_details()
{
    global $conn;

    $product_id = $_GET['id'];

    $sql = "SELECT * FROM `product` WHERE `p_id` = $product_id";
    $result_query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result_query) == 0) {
        echo "<h2 class='text-center text-danger'>This Product is Not Available Now...</h2>";
    } else {
        $row = mysqli_fetch_assoc($result_query);
        $product_name = $row['p_name'];
        $product_price = $row['og_pr'];
        $product_des = $row['descript'];
        $product_image = $row['pic1'];
        $category_id = $row['categoryid'];

        echo "<div class='product-details'>
                  <h2>$product_name</h2>
                  <div class='product-image'>
                      <img src='./imageupload/productimage/$product_image' alt='$product_name'>
                  </div>
                  <div class='product-info'>
                      <p>Original price: $product_price</p>
                      <p>Description: $product_des</p>
                      <a href='buyreq.php' class='buy-btn'>Buy Request</a>
                  </div>
              </div>";
    }
} */
/* function product_details()
{
    global $conn;

    $product_id = $_GET['id'];

    $sql = "SELECT * FROM `product` WHERE `p_id` = $product_id";
    $result_query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result_query) == 0) {
        echo "<h2 class='text-center text-danger'>This Product is Not Available Now...</h2>";
    } else {
        $row = mysqli_fetch_assoc($result_query);
        $product_name = $row['p_name'];
        $product_price = $row['og_pr'];
        $product_des = $row['descript'];
        $product_image = $row['pic1'];
        $category_id = $row['categoryid'];

        echo "<div class='product-details'>
                  <h2>$product_name</h2>
                  <div class='product-image'>
                      <img src='./imageupload/productimage/$product_image' alt='$product_name'>
                  </div>
                  <div class='product-info'>
                      <p>Original price: $product_price</p>
                      <p>Description: $product_des</p>
                      <form method='post' action='send_buy_request.php'>
                          <input type='hidden' name='product_id' value='$product_id'>
                          <label for='message'>Message:</label>
                          <textarea name='message' id='message' rows='4'></textarea>
                          <button type='submit' class='buy-btn'>Send Buy Request</button>
                      </form>
                  </div>
              </div>";
    }
}
?>
 */
function product_details()
{
    global $conn;

    $product_id = $_GET['id'];

    $sql = "SELECT * FROM `product` 
            JOIN `registration` ON `product`.`user_id` = `registration`.`user_id`
            WHERE `p_id` = $product_id";
    $result_query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result_query) == 0) {
        echo "<h2 class='text-center text-danger'>This Product is Not Available Now...</h2>";
    } else {
        $row = mysqli_fetch_assoc($result_query);
        $product_name = $row['p_name'];
        $product_price = $row['og_pr'];
        $product_des = $row['descript'];
        $Brand=$row['Brand'];
        $product_image = $row['pic1'];
        $category_id = $row['categoryid'];
        $owner_name = $row['username'];
        $owner_email = $row['email'];
        $owner_phone = $row['Mobile_num'];
        $Date=$row['date'];
        $status=$row['status'];


        echo "<div class='product-details'>
        
                  <div class='product-image'>
                      <img src='./imageupload/productimage/$product_image' alt='$product_name'>
                
                       <h1>$product_name</h1>
                       <br>
                      <h2><span>Original price</span>: $product_price</h2>
                     
                      <h3><span>Description</span>: $product_des</h3>
                      
                      <h3><span>Brand Name</span>:<span>$Brand</span></h3>
                     
                      
                      <h3>Date:$Date</h3> 
                

                  </div>
                 
                  <div class='product-info'>
                      
                      <h1>Owner Name: $owner_name</h1>
                      <h1>Owner Email: $owner_email</h1>
                      <h3>Owner Phone: $owner_phone</h3>
                      <form method='post' action='./buyreq.php'>
                          <input type='hidden' name='product_id' value='$product_id'>
                          

                          <button type='submit' class='buy-btn'>Buy Request</button>
                      </form>
                  </div>
              </div>";
    }
}

function tags($tag)
{
    global $conn;
            $tags = $_GET['tag'];
            
    switch ($tag) {
        case 'cycle':
            $bg_image = './img/jacek-dylag-giFeTshEYYQ-unsplash.jpg';
            break;
        case 'book':
            $bg_image = './img/bookracing.jpg';
            break;
        case 'mobile':
            $bg_image = './img/mobileracing.jpg';
            break;
        case 'apron':
            $bg_image = './img/lab.jpg';
            break;
        case 'Drafter':
            $bg_image = './img/drafteren.jpg';
            break;
        // Add more cases for other tags here
        default:
            $bg_image = './img/drafteren.jpg';
            break;
    }

    // Add CSS styles for the background image
   echo "<style>body { background-image: url('$bg_image'); }</style>";

            // Fetch all products with the given tag
            //$sql = "SELECT * FROM `product` WHERE p_name = '$tag'";
           // $sql="select * from `product` where p_name='$tags' order by og_pr asc";
           $sql="SELECT * FROM `product` where p_name='$tags' ORDER BY `product`.`date` DESC LIMIT 3"; 
           $result_query = mysqli_query($conn, $sql);
           
       while( $row=mysqli_fetch_assoc($result_query))
       {
           $product_id=$row['p_id'];
           $product_name=$row['p_name'];
           $product_price=$row['og_pr'];
           $product_des=$row['descript'];
           $product_image=$row['pic1'];
           $category_id=$row['categoryid'];
           $status=$row['status'];
           $Date=$row['date'];
           echo "
                   <div class='pro'>
                       <img src='./imageupload/productimage/$product_image' alt='$product_name'>
                       <div class='des'>
                       <a href='./product_details.php?id=$product_id'>$product_name</a>
                           <p>Original price:<span>$product_price</span></p>
                           <p>Status:<span>$status</span></p>
                           <h3>Date:$Date</h3>
                           
                       </div>
              
                   </div>"
               ;
       }
        
    }
    

  

    function mypost()
    { 
    session_start();
        global $conn;
        $bg_image = './img/request2.jpg';
        // Retrieve the user ID from the registration table using the email address
        $owner_email = $_SESSION['email'];
        $search_query = "SELECT user_id FROM `registration` WHERE email = '$owner_email'";
        $result_query = mysqli_query($conn, $search_query);
        $row = mysqli_fetch_assoc($result_query);
        $e_id = $row['user_id'];
        echo "<style>body { background-image: url('$bg_image'); }</style>";
        // Use the user ID to fetch the products from the product table
        /* $search_query = "SELECT * FROM `product` WHERE 'user_id' = $e_id"; */
        $search_query="select * from `product` where user_id='$e_id'";
        $result_query = mysqli_query($conn, $search_query);
    while($row=mysqli_fetch_assoc($result_query)) {
        $product_id=$row['p_id'];
        $product_name=$row['p_name'];
        $product_price=$row['og_pr'];
        $product_des=$row['descript'];
        $product_image=$row['pic1'];
        $category_id=$row['categoryid'];
        $Brand=$row['Brand'];
        $Date=$row['date'];
        $status=$row['status']; // Retrieve the status of the product
        
        echo "
            <div class='pro'>
                <img src='./imageupload/productimage/$product_image' alt='$product_name'>
                <div class='des'>
                    <a href='./product_details.php?id=$product_id'>$product_name</a>
                    <p>Original price:<span>$product_price</span></p>
                    <h3>Brand Name:<span>$Brand</span></h3>
                    
                    <p>Status:<span>$status</span></p> <!-- Display the status of the product -->
                    <form method='POST' onsubmit='return confirm(\"Are you sure you want to delete this product?\")'>
                    <input type='hidden' name='product_id' value='$product_id'>
                    <button type='submit' name='delete_product'>Delete</button>
                  </form>
                </div>
                <p>Date:$Date</p>";
        
        // If the product is sold, display a delete button
        /* if($status=='Available') {
            echo "<form method='POST'>
                    <input type='hidden' name='product_id' value='$product_id'>
                    <button type='submit' name='delete_product'>Delete</button>
                  </form>";
        } */
        
        echo "</div>";
    }
    
    // If the delete button is clicked, delete the product from the database
    if(isset($_POST['delete_product'])) {
        $product_id = $_POST['product_id'];
        $delete_query = "DELETE FROM `product` WHERE `p_id`=$product_id";
        mysqli_query($conn, $delete_query);
    }
}
/* function request()
{
    session_start();
    
    global $conn;
    $noresult=true;
    //$e_id = $_SESSION['uid'];
    //$user_email=$_SESSION['email'];
    $owner_email = $_SESSION['email'];
    $search_query = "SELECT user_id FROM `registration` WHERE email = '$owner_email'";
    $result_query = mysqli_query($conn, $search_query);
    $row = mysqli_fetch_assoc($result_query);
    $e_id = $row['user_id'];

    $sql=" SELECT * FROM `requests` WHERE own_id='$e_id'";
    $result = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
    $username = $row['uname'];
    $user_email=$row['email'];
    $contact=$row['contact'];
    $price=$row['price'];
    $posid=$row['pos_id'];
    //<!--start of  card-->
    $sql1="SELECT `p_name`, `Brand` FROM `product` WHERE `user_id`='$e_id' AND `p_id`='$posid'";

    $result1 = mysqli_query($conn,$sql1);
    while($row1=mysqli_fetch_assoc($result1))
    {
        $noresult=false;
        $productname=$row1['p_name'];
        $req_id=$row['re_id'];
    ?>
    <div class="request-card">
        <div class="card-body">
            <div>
                <div class="form-row">
                    <div class="form-group col-sm">
                        <label for="inputEmail4">Email</label>
                        <input type="text" class="form-control form-control-sm" id="input001" value="<?php echo $user_email;?>" disabled>
                    </div>
                    <div class="form-group col-sm">
                        <label for="inputPassword4">Contact 1</label>
                        <input type="text" class="form-control form-control-sm" id="input002" value="<?php echo $contact;?>" disabled>
                    </div>

                    
                    <div class="form-group col-sm">
                        <label for="inputPassword4">Offering price</label>
                        <input type="text" class="form-control form-control-sm" id="input004" value="<?php echo $price;?>" disabled>
                    </div>
                </div>
            </div>
            <h4><?php echo $productname;?></h4>
            <a href="delreq.php?re_id=<?php echo $req_id;?>" class="btn btn-warning" onclick="return checkdelet()">Delete request</a>
        </div>
    </div>
    <?php
    }
}
if($noresult){
    echo"<div><h1><i>No Buyers request yet !!</i></h1>
  <li>check some days after for new updates !!!
  </li></div>";
}
} */
function request()
{


session_start();
global $conn;
$noresult = true;
$owner_email = $_SESSION['email'];
$search_query = "SELECT user_id FROM `registration` WHERE email = '$owner_email'";
$result_query = mysqli_query($conn, $search_query);
$row = mysqli_fetch_assoc($result_query);
$e_id = $row['user_id'];

$sql = "SELECT * FROM `requests` WHERE own_id='$e_id'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $username = $row['uname'];
    $user_email = $row['email'];
    $contact = $row['contact'];
    $price = $row['price'];
    $posid = $row['pos_id'];

    $sql1 = "SELECT `p_name`, `Brand` FROM `product` WHERE `user_id`='$e_id' AND `p_id`='$posid'";
    $result1 = mysqli_query($conn, $sql1);
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $noresult = false;
        $productname = $row1['p_name'];
        $req_id = $row['re_id'];
        $Brand=$row1['Brand'];
?>
        <div class="request-card">
            <div class="card-body">
                <div class="card-row">
                    <div class="card-field">
                        <label for="inputEmail4">Email</label>
                        <input type="text" class="form-control" value="<?php echo $user_email; ?>" disabled>
                    </div>
                    <div class="card-field">
                        <label for="inputPassword4">Contact</label>
                        <input type="text" class="form-control" value="<?php echo $contact; ?>" disabled>
                    </div>
                    <div class="card-field">
                        <label for="inputPassword4">Offering Price</label>
                        <input type="text" class="form-control" value="<?php echo $price; ?>" disabled>
                    </div>
                </div>
                <h4 class="product-name"><?php echo "ProductName :".$productname; ?></h4>
                <h4 class="product-name"><?php echo "Brand :".$Brand; ?></h4>
                <a href="delreq.php?re_id=<?php echo $req_id; ?>" class="btn btn-danger delete-btn" onclick="return checkdelet()">Delete Request</a>
            </div>
        </div>
<?php
    }
}

if ($noresult) {
    echo "<div class='no-results'><h1><i>No Buyers Request yet!!</i></h1><li>Check back after a few days for new updates.</li></div>";
}
}
?>
<?php
function checkdelet()
{
    return confirm('Are you sure you want to DELETE current record');
}
?>




    
    <style>
        button[name='delete_product'] {
  background-color: red;
  color: white;
  font-size: 16px;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button[name='delete_product']:hover {
  background-color: darkred;
}

button[name='delete_product']:active {
  background-color: crimson;
}

button[name='delete_product']:focus {
  outline: none;
}

button[name='delete_product'] i {
  margin-right: 5px;
}

button[name='delete_product'] span {
  font-weight: bold;
  text-transform: uppercase;
}

  body {
        background-image: url('$bg_image');
        background-repeat: no-repeat;
        background-size: cover;
     }
            
 .product-image span{
    color:yellow;
}
.product-image p{
    color:yellow;
} 
.product-image h1{
    
    color:blue;
}
    

</style>