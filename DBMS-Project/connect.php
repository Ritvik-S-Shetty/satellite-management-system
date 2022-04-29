<?php
$connection= mysqli_connect("localhost","root","");
$db= mysqli_select_db($connection,'satellitemanagement');

if(!$connection){
    die(mysqli_error($connection));

}
?>