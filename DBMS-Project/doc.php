<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $search=$_POST['search'];
    session_start();
    $_SESSION['SATNAME']=$search;
    header('location:display.php');
}
  
?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="images/nwicon.png" type="image/png">
     <link rel="stylesheet" href="doc.css">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


     <title>Document</title>
 </head>

 <body>
 <section class="showcase">
    <header>
        <div class="text">
        <h2>Know few terms here! </h2>
        
        <h3><u>Class of orbit:</u></h3><span>curved path that an object in space (such as a star, planet, moon, asteroid or spacecraft) takes around another object due to gravity. Geostationary orbit (GEO)Low Earth orbit (LEO)  Medium Earth orbit (MEO) Polar orbit and Sun-synchronous orbit (SSO)Transfer orbits and geostationary transfer orbit (GTO) Lagrange points (L-points)</span>
        <br>
        
        <h3><u>Longitude:</u></h3><span>The measurement east or west of the prime meridian. Longitude is measured by imaginary lines that run around the Earth vertically (up and down) and meet at the North and South Poles.</span>
        
        <br>
        <h3><u>Perigee:</u></h3><span>The point in the orbit of satellite orbiting the earth that is nearest to the center of the earth also </span>
        <br>
        
        <h3><u>Apogee</u></h3><span>The point in the orbit of the moon or a satellite at which it is furthest from the earth.</span>
        <br>
        
        <h3><u>Eccentricity</u></h3><span>The value of Eccentricity (e) fixes the shape of satellite’s orbit. This parameter indicates the deviation of the orbit’s shape from a perfect circle</span>
        <br>
        
        <h3><u>Inclination</u></h3><span>Inclination is the angle of the orbit in relation to Earth's equator. ... If a satellite orbits from the north pole to the south pole, its inclination is 90 degrees</span>
        
        <br>
        <h3><u>Period</u></h3><span>The period of a satellite is the time it takes it to make one full orbit around an object. The period of the Earth as it travels around the sun is one year.If you know the satellite's speed and the radius at which it orbits, you can figure out its period.</span>
        <br>
        <a href="https://www.narom.no/undervisningsressurser/sarepta/rocket-theory/satellite-orbits/introduction-of-the-six-basic-parameters-describing-satellite-orbits/" target="_blank">Click here to know more</a>
        
        

        </div>
     

    </header>
    <video src="images/video.mp4" muted loop autoplay></video>
    <div class="overlay"></div>
    <div class="text">
      <h3></h3>
      <div class="col-md-6 mb-4">


</form>

</div>
      
    </div>
    
  </section>
     
 </body>
 </html>
  
  