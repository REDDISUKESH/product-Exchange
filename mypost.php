<?php
 include 'imageupload/function.php';
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
                <li><a href="request.php">Requests</a></li>
                </li>
                    <form action="search.php" method="get">
                        
                        <br></br>
                            <a href="tags.php?tag=cycle" class="tag" >Cycle</a>
                            <a href="tags.php?tag=mobile" class="tag">Mobile</a>
                            <a href="tags.php?tag=book" class="tag">Book</a>
                            <a href="tags.php?tag=drafter" class="tag">Drafters</a>
                            <a href="tags.php?tag=apron" class="tag">Apron</a>
                            <input type="text" name="search_data" placeholder="Search product..." autocomplete="off"  >
                        <!-- <button type="submit">Search</button> -->
                            <input type="submit" value="search" class="button" name="search_data_product">
                    </form>
                </li>
                <li><a href="makepost.php">Sell</a></li>
                <li><a href="#" onclick="confirmLogout()">Logout</a></li>


            </ul>
        </div>
    </section>
    <div class="container">
        <?php
            mypost();
        ?>
    </div> 