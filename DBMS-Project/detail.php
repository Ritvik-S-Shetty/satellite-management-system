<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/nwicon.png" type="image/png">
<title>Details</title>
</head>
<style>
    body{
    background-image: url('images/nightsky.jpg');
    background-color: black;
    color: whitesmoke;
    margin: 0;
    padding: 0;
    height: 2525px;
    
}
</style>
<body>

    <table border="7" class="table">
    <!-- <thead class="table-dark"> -->
        <tr>
            <th>Satellite ID</th>
            <th>Satellite Name</th>
            <th>Satellite User</th>
            <th>Satellite Purpose</th>
            <!-- <th>Organisation ID</th> -->
            <th>Organisation Name</th>
            <th>Location</th>
            <th>Rocket ID</th>
            <th>Rocket Name</th>
            <th>Dry Weight</th>
        </tr>


    

<?php

include 'connect.php';
$query="select * from satellite S ,organisation O, rocket R where S.ORGID=O.ORGID and S.RID=R.RID order by SATID";
$result=mysqli_query($connection,$query);
$total=mysqli_num_rows($result);


if($total!=0){
    while(($final=mysqli_fetch_assoc($result))){
        echo "<tr>
        <td>".$final['SATID']."</td>
        <td>".$final['SATNAME']."</td>
        <td>".$final['SATUSER']."</td>
        <td>".$final['SATPURPOSE']."</td>
        
        <td>".$final['ORGNAME']."</td>
        <td>".$final['LOCATION']."</td>
        <td>".$final['RID']."</td>
        <td>".$final['RNAME']."</td>
        <td>".$final['DRYWEIGHT']."</td> </tr>";
    }
}
else{
    session_start();
    header('location:noentry.php');
}

?>
<!-- </thead> -->
</table>
<!-- <button type="button" class="btn btn-dark">Dark</button> -->
<div text-align="align-right">
<button class="btn"><i class="fa fa-download"></i> <a href="dexel.php">Download</a></button>

</div>


</body>
</html>