<!-- <?php
session_start();
if(null==($_SESSION['DATE_OF_LAUNCH_1'] && $_SESSION['DATE_OF_LAUNCH_2'])){
  header('location:login.php');
}
?>  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="images/nwicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Satellite  Details</title> 
</head>
<style>
    body{
    background-image: url('images/nightsky.jpg');
    background-repeat: no-repeat;
    background-color: black;
    color: whitesmoke;
    margin: 0;
    padding: 0;
    height: 2525px;
    
}
</style>
<body>
<?php
// include 'connect.php';
$connection= mysqli_connect("localhost","root","");
$db= mysqli_select_db($connection,'satellitemanagement');
$fdate= $_SESSION['DATE_OF_LAUNCH_1']; 
$tdate= $_SESSION['DATE_OF_LAUNCH_2']; 
$query="select * from `satellite` where DATE_OF_LAUNCH BETWEEN '$fdate' and '$tdate'";                
$result=mysqli_query($connection,$query);
$total=mysqli_num_rows($result);
if($total!=0){
    ?>
     <table border="10" class="table ">
        <tr>
            <th>Satellite ID</th>
            <th>Satellite Name</th>
            <th>Satellite user</th>
            <th>Satellite purpose</th>
            <th>Date of launch</th>
            <th>Life time</th>
        </tr>
    <?php
    while(($final=mysqli_fetch_assoc($result))){
        ?>
        
        <?php
        echo "<tr>
        <td>".$final['SATID']."</td>
        <td>".$final['SATNAME']."</td>
        <td>".$final['SATUSER']."</td>
        <td>".$final['SATPURPOSE']."</td>
        <td>".$final['DATE_OF_LAUNCH']."</td>
        <td>".$final['LIFETIME']."</td>
         </tr>";
         ?>
         <?php
    }
}else{
    session_start();
    header('location:noentry.php');
}

?>
</table>
<!-- <div text-align="align-right"> -->
<!-- <button class="btn"><i class="fa fa-download"></i><a href='oexecl.php'> Download</a></button> -->

<!-- </div> -->
</body>
</html>