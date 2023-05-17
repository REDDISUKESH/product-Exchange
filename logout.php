<!-- <?php
session_start(); 


unset($_SESSION['email']);


session_destroy();


header("Location: Login.php");
exit;
?> -->
<?php
session_start(); // Start the session

if(isset($_POST['logout'])) {
    unset($_SESSION['email']); // Unset the email session variable
    session_destroy(); // Destroy the session
    header("Location: Login.php"); // Redirect the user to the login page
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <script>
        function confirmLogout() {
            return confirm("Are you sure you want to logout?");
        }
    </script>
</head>
<body>
    <form method="post" onsubmit="return confirmLogout();">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>


