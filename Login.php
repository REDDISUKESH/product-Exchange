<?php
$login=0;
$invalid=0;
/* session_start();
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
} */
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        include 'connect.php';
        //$username=$_POST['username'];
        
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="select * from registration where email='$email' and password='$password'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $num=mysqli_num_rows($result);
            if($num>0){
                //echo "User already Exit";
                //echo "login Successfull";
               
                $login=1;
                session_start();
                $_SESSION['email']=$email;
               /*  $user_id = perform_login_authentication(); */

// Set the user ID in the session data
          /*   $_SESSION['uid'] = $user_id; */
                $_SESSION['uid']=$row['user_id'];
                //echo "login". $email;
                //$_SESSION['user_id']=$user_id;
                //echo "User ID: " . $user_id;
                header('location:about.php');
            }else{
               //echo "Invalid Data";
               $invalid=1;
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" /> 
    <link rel="stylesheet" href="css/login1.css">
    <script>
        var urlParams = new URLSearchParams(window.location.search);
        var invalid = urlParams.get('invalid');
        if (invalid == '1') {
            alert("Error: Invalid email or password.....");
        }
    </script>
    
</head>
<body>
    <div class="form-container">
        <form action="Login.php" method="post">
            <h1>Welcome To Our Website</h1>
            <input type="email" name="email" placeholder="Enter your Email" class="box" autocomplete="off" >
            <input type="password" name="password" placeholder="Password" class="box" >
            <button type="submit" class="btn btn-primary W-100">Login</button>
            <p>Don't have an account? <a href="sign.php">Register Now</a></p>
        </form>
    </div>
</body>
<?php
    if($login)
    {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> you are succesfully Logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
?>
<?php
    if($invalid)
    {
        /* echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> Invalid credentials.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'; */
      header("Location: Login.php?invalid=1");
    }
?>