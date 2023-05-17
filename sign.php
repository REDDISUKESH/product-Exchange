<?php
$succes=0;
$user=0;
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        include 'connect.php';
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $mobile_num=$_POST['Mobile_num'];
        $Academic_year=$_POST['Academic_year'];
        
        /* $sql="insert into registration (username,email,password) values('$username','$email','$password')";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            echo "Data insert succesfully";
        }else{
            die(mysqli_error($conn));
        } */
        $sql="select *from registration where username='$username'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            $num=mysqli_num_rows($result);
            if($num>0){
                //echo "User already Exit";
                $user=1;
            }else{
                $sql="insert into registration (username,email,password,Mobile_num,Academic_year) values('$username','$email','$password','$mobile_num','$Academic_year')";
                 $result=mysqli_query($conn,$sql);
                 if($result)
                {
                    $succes=1;
                    session_start();
                   // $_SESSION['email']=$email;
                    header('location:Login.php');
                }else{
                    die(mysqli_error($conn));
                }
            }
        }
        
    }
?>
<?php
    if($user)
    {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Ohh no sorry</strong> User already exist
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
?>
<?php
    if($succes)
    {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> you are succesfully registerd
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" /> 
    <link rel="stylesheet" href="css/sign1.css">
    
</head>
<body>
    <div class="container">
       <!--  <img src="img/pexels-quintin-gellar-313782.jpg" alt=""> -->
         <form action="sign.php" method="post">
            <!--<input type="text " name="username" placeholder="Username" class="box" autocomplete="off">
            <input type="email" name="email" placeholder="Enter your Email" class="box"  autocomplete="off">
            <input type="password" name="password" placeholder="Confirm your password" class="box" >
            <input type="tel" name="Mobile_num" placeholder="Enter your Mobile Number" class="box">
            <input type="text" name="Academic_year" placeholder="Enter your Academic Year" class="box">
            <input type="submit" name="submit" value="Register Now" class="btn">
            <p style="bold">Already have an account? <a href="login.php">Login Now</a></p>
        </form> -->
        <!-- <img src="img/pexels-quintin-gellar-313782.jpg" alt=""> -->
        <div class="image">
            <div class="form-box">
                <div class="form">
                    <h1>Register</h1>
                <div class="input-box">
                     <input type="text " name="username" class="box" autocomplete="off" required>
                     <label for="">Username</label> 
                </div>
                <div class="input-box">
                     <input type="email" name="email"  class="box"  autocomplete="off" required>
                     <label for="">Enter Your Email</label>
                </div>
                <div class="input-box">
                    <input type="tel" name="Mobile_num" class="box" required> 
                    <label for="">Mobile Number</label>
                </div>
                <div class="input-box">
                <input type="password" name="password"  class="box" >
                    <label for="">Enter Your Password</label>
                </div>
                <div class="input-box">
                <input type="text" name="Academic_year"  class="box" autocomplete="off" Required>
                <label for="">Academic year</label>
                </div>
                <div class="input-box">
                <input type="submit" name="submit" value="Register Now" class="btn">
                <p >Already have an account? <a href="login.php">Login Now</a></p>
                
                </div>
                
                
                </div>
            </div>
        </div>
    </div>
</body>
