<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='sukesh';
$DATABASE='signupform';

$conn=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);
if(!$conn)
{
    die(mysqli_error($conn));
}
?>