<?php
session_start();
if(isset($_SESSION['email']))
{
    $_SESSION['email']="sukeshreddi1134@gamil.com";
$_SESSION['password']="123";
echo "Session Data is saved..";
}else
{
    echo "Please Login Again to Continue..";
}

?>