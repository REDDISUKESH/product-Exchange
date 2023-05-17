 <?php
    @session_start();
    if(!isset($_SESSION['email']))
    {
        
        header('location:Login.php');
    }
    include 'imageupload/function.php';
    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $sql = "SELECT username FROM `registration` WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $username = $row['username'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />   
    <link rel="stylesheet" href="css/about3.css">
    <style>
    .user {
        position: absolute;
        animation: move 19s linear infinite;
        white-space: nowrap;
        font-family: Arial, sans-serif;
        font-size:30px;
        margin-top:80px;
        color:darkblue;
       /*  position:fixed; */
        top: 0;
        left: 0;
        right: 0;
       /*  position: absolute;
        animation: move 18s linear infinite;
        white-space: nowrap;
        background-color: #333;
        color: white;
        margin-top:50px;
        padding: 10px;
        font-size: 18px;
        font-family: Arial, sans-serif;
        border-radius: 10px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); */
        transition: transform 0.5s ease-in-out;
    }
    .user.hidden {
  transform: translateY(-100%);
}

    @keyframes move {
        0% {
            left: -100%;
        }
        50% {
            left: 100%;
        }
        100% {
            left: -100%;
        }
    }
</style>
    <script>
function confirmLogout() {
  if (confirm("Are you sure you want to logout?")) {
    window.location.href = "logout.php";
  }
}
</script>

</head>
<body>
    <section id="header">
        <a href="#"> <img src="img/NIT_Andhra_Pradesh.png" class="logo" alt="logo"></a>
        <div>
            <ul id="navbar">
                <li ><a class="active" href="about.php">Home</a></li>
                <li><a href="mypost.php">Mypost</a></li>
                </li>
                    <form action="search.php" method="get">
                        
                        <br></br>
                            <a href="tags.php?tag=cycle" class="tag" >Cycle</a>
                            <a href="tags.php?tag=mobile" class="tag">Mobile</a>
                            <a href="tags.php?tag=book" class="tag">Book</a>
                            <a href="tags.php?tag=drafter" class="tag">Drafter</a>
                            <a href="tags.php?tag=apron" class="tag">Apron</a>
                            <input type="text" name="search_data" placeholder="Search product..." autocomplete="off"  >
                        <!-- <button type="submit">Search</button> -->
                            <input type="submit" value="search" class="button" name="search_data_product">
                    </form>
                </li>
                <li><a href="makepost.php">Sell</a></li>
                <!-- <li><a href="logout.php">Logout</a></li> -->
                <li><a href="#" onclick="confirmLogout()">Logout</a></li>


            </ul>
        </div>
        
    </section>
    <div class="user">
            <?php if(isset($_SESSION['email'])) { ?>
                <span>Hello <?php echo $username; ?>, </span>
            <?php } ?>
            <span>Welcome to our website.........!</span>
    </div>
        
    <section id="hero">
    
        <h1>Our New Collection</h1>
        <br>
        <!-- <h2>Offers Closes Soon..........</h2>
        <h2>On all Products</h1> -->
        <p>Save Your Time and Money upto  max..</p>
    </section>
    <div class="products">
        <h2>Featured Products</h2>
        <p>Reusable Products for students....</p>
    </div>
     <div class="container">
        <?php
        getproduct();
        ?>
    </div> 
       

   
   
