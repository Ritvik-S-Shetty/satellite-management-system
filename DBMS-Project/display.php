<!-- <?php
session_start();
if(!isset($_SESSION['SATNAME'])){
  header('location:login.php');
}
?>  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/nwicon.png" type="image/png">
    <link rel="stylesheet" href="display.css">


    <title>Search</title>
</head>
<body>
                <?php
                $connection= mysqli_connect("localhost","root","");
                $db= mysqli_select_db($connection,'satellitemanagement');
                $name= $_SESSION['SATNAME']; 
                $query="select * from scientist SC,satellite S,organisation O,rocket R ,conditions C,follows F,uploads U where U.SID=SC.SID and U.SATID=S.SATID and S.ORGID=O.ORGID and S.RID=R.RID and F.CONDID=C.CONDID and S.SATID=F.SATID and SATNAME like '$name'";                
                 
                 $result=mysqli_query($connection, $query);
                 $num=mysqli_num_rows($result);
                 if($num!=0){
                    while($row= mysqli_fetch_array($result)){
                        ?>
                           <h1 style="font-family:'Times New Roman'"> <u>The <?php echo $name; ?></u></h1>
                           <h2 style="font-family:verdana"><?php echo  $row['SATNAME'] ,' launched by  '; ?><?php echo $row['ORGNAME'],', '; ?> <?php echo $row['LOCATION'],'.'; ?><br><?php echo 'This satellite was lauched on ', $row['DATE_OF_LAUNCH'], ' for the purpose of ', $row['SATPURPOSE'],'  assigned by/for  ',$row['SATUSER'],' with life time of ', $row['LIFETIME'] ,' years.'; ?><br><br><?php echo 'Following the conditions related to this satellite:' ?><br><?php echo '->Class of orbit: ',$row['CLASS_OF_ORBIT']?><br><?php echo '->Orbit type: ',$row['ORBIT_TYPE']?><br><?php echo '->Longitude: ',$row['LONGITUDE']?><br><?php echo '->Apogee: ',$row['APOGEE']?><br><?php echo '->Perigee: ',$row['PERIGEE']?><br><?php echo '->Eccentricity: ',$row['ECCENTRICITY']?><br><?php echo '->Inclination: ',$row['INCLINATION']?><br><?php echo '->Launch Mass: ',$row['LAUNCHMASS'], ' kilograms' ?><br><?php echo '->Period: ',$row['PERIOD'],' (minutes)'?><br><?php echo '->Power: ',$row['POWER'],' (in watts)'?><br><br><?php
                           echo  $row['SATNAME'] , ' is dropped by a launch vehicle ', $row['RNAME'],' with its sole dry weight of around ', $row['DRYWEIGHT'] ;?><br><br><?php echo '                                   Author- ',$row['SNAME'], ' from ',$row['ORGNAME'],' ',$row['LOCATION'];?></h2>
                       <?php
                   }
                 }
                 else{
                    session_start();
                    header('location:noentry.php');
                    
                 }
                 

                ?>
            <!-- </table>   -->
            
        <!-- </form> -->
    
</body>
</html> 