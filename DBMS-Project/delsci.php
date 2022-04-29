<?php
$sucess=0;
$fail=0;
$con=0;
$sat=0;
$error=0;
$invalid=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';
        $sid=$_POST['sid'];
        $satid=$_POST['satid'];
        $condid=$_POST['condid'];
        $query="select * from `scientist` SC, `satellite` S, `conditions` C , `uploads` U, `follows` F where SC.SID=U.SID and S.SATID=U.SATID and S.SATID=F.SATID and F.CONDID=C.CONDID and  SC.SID='$sid' and C.CONDID='$condid' and S.SATID='$satid'";
        $result=mysqli_query($connection,$query);
        if($result){
            $count=mysqli_num_rows($result);
            if($count>0){
              $satcheck="select * from `satellite` where SATID='$satid'";
              $satreq=mysqli_query($connection,$satcheck);
              if($satreq){
                $satcount=mysqli_num_rows($satreq);
                if($satcount>0){
                  $check="select * from `conditions` where CONDID='$condid' ";
                  $req=mysqli_query($connection,$check);
                  if($req){
                    $concount=mysqli_num_rows($req);
                    if($concount>0){
                      $query1="delete from `dropped` where SATID='$satid'";
                      $result1=mysqli_query($connection,$query1);
                      if($result1){
                          $query2="delete from `follows` where CONDID='$condid' and SATID='$satid'";
                          $result2=mysqli_query($connection,$query2);
                          if($result2){
                            $query3="delete from `conditions` where condid='$condid'";
                            $result3=mysqli_query($connection,$query3);
                            if($result3){
                              $query4="delete from `uploads` where SATID='$satid' and SID='$sid'";
                              $result4=mysqli_query($connection,$query4);
                              if($result4){
                                $query5="delete from `scientist` where SID='$sid'";
                                $result5=mysqli_query($connection,$query5);
                                if($result5){
                                  $query6="delete from `satellite` where SATID='$satid'";
                                  $result6=mysqli_query($connection,$query6);
                                  if($result6){
                                    $sucess=1;
                                  }
                                  else{
                                    $error=1;
                                  }
                                }
                              else{
                                $error=1;
                              }
                            }
                            else{
                              $error=1;
                            }
                          }
                          else{
                            $error=1;
                          }
                        }
                        else{
                          $error=1;
                        }
                      }
                      else{
                        $error=1;
                      }
                    }
                    else{
                      $con=1;
                    }
                  }
                }
                else{
                 $sat=1;
                }
              }
            }
            else{
              $invalid=1;
            }
        }
        else{
          $invalid=1;
        }
}


?>
<!DOCTYPE html> 
<head>  
<title>Delete Page</title>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<head>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
<link rel="icon" href="images/nwicon.png" type="image/png">
<style> 
 
body {  
  background-image: url('images/image.jpg');
  background-repeat: no-repeat;
  background-size: cover; 
  color: #f8f2f8;  
  font-family: "Roboto", Arial, Helvetica, sans-serif;  
  font-size: 16px;  
  font-weight: 300;  
  letter-spacing: 0.01em;  
  line-height: 1.6em;  
  margin: 0;  
  padding: 100px;   
  }  
  
h4 {  
  font-weight: bold;  
  margin-bottom: 2.5rem;  
 color: #000203;  
  text-align: center;  
}
/* /inner box/   */
.form-wrapper {  
  height:291px;
  background:#b1a7a6;  
  border-radius: 20px;  
  padding: 20px;  
} 
/* /text fields/  */
.form-control,  
.custom-select {  
  border-radius: 10px;  
  color: #495057;  
  background-color: #ffffff;  
  border-color:none; 
  max-height: 50px; 
}  
label{
    color:#01070e;
}
  
.form-control:focus {  
  color: #495057;  
  background-color: #f1f1f1;  
  border: 1px solid #3494e6;  
  outline: 0;  
  box-shadow: none;  
}  
  
.btn {  
  background: #010c16;  
  border: #3494e6;  
  padding: 0.6rem 3rem;  
  font-weight: bold;  
}  
.btn:hover,  
.btn:focus,  
.btn:active,  
.btn-primary:not(:disabled):not(.disabled).active,  
.btn-primary:not(:disabled):not(.disabled):active,  
.show > .btn-primary.dropdown-toggle {  
  background: #3494e6;  
  border: #3494e6;  
  outline: 0;  
}  
button {  

   position: absolute;
    right: 267px;
    top: 241px;

    display: inline-block;  
    padding: 0.35em 1.2em;  
    border: 0.1em solid #3494e6;  
    margin: 0 0.3em 0.3em 0;  
    border-radius: 0.12em;  
    box-sizing: border-box;  
    text-decoration: none;  
    font-family: 'Roboto',sans-serif;  
    font-weight: 700;  
    color: #0c0f11;  
    text-align: center;  
    transition: all 0.2s;
    border-radius: 100px;  
    align-items: center;
    margin:auto;
    display:block;
    }  
    button:hover {  
    color: #FFFFFF;  
    background-color: #3494e6;  
    }  
</style> 
 
</head> 
 
<body>  
<?php

if($fail){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong></strong> Cant Find the Scientist ID
  
</div>';
}

?>
<?php

if($con){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong></strong> Cant Find the Condition ID
  
</div>';
}

?>
<?php

if($error){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong></strong> Cant Delete due to some site issue! We will get back to your update..
  
</div>';
}

?>
<?php

if($sat){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong></strong> Cant Find the Satellite ID
  
</div>';
}
?>

<?php

if($sucess){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong></strong> Deleted Successfully!  

</div>';
}

?>
<?php

if($invalid){
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Mismatched ID!</strong> Make sure you Delete your Satellite!  

</div>';
}

?>
<section class="contact-from pt-4">  
  <div class="container">  
  <div class="row mt-5">  
      <div class="col-md-7 mx-auto">  
        <div class="form-wrapper">  
          <div class="row">  
            <div class="col-md-12">  
              <h4> <b> Wanna Delete !! </b> </h4>  
            </div>  
          </div>  
          <form action="delsci.php"  method="post"> 
            
            <div class="row">  
              <div class="col-md-6">  
                <div class="form-group">  
         <input type="text" class="form-control" placeholder="Enter your ID"  name="sid" autocomplete="off" required >  
                </div>  
              </div>  
 


              <div class="col-md-6">  
                <div class="form-group">  
         <input type="text" class="form-control" placeholder="Enter Satellite Id to delete"  autocomplete="off" name="satid" required >  
                </div>  
              </div> 

              <div class="col-md-6">  
                <div class="form-group">  
         <input type="text" class="form-control" placeholder="Enter Condition id of Satellite"  autocomplete="off" name="condid" required >  
                </div>  
              </div> 
              <br><br><br>
          
              <div class="col-md-6">  
                <div class="form-group">  
               <!-- <input type="textarea" class="form-control" placeholder="Why Do you want to delete?"  name="old" autocomplete="off" required >   -->
               <textarea id="subject" class="form-control" name="subject" placeholder="Why Do you want to delete?" style="height:90px; width:287px; padding:2px"></textarea>

                </div>  
              </div>  
               
  
          
  
            </div> 
            <!-- <input type="button" class="reset" align="left">  -->
            <div class="mt-3" style="align-items: center;">  
              <button name="update"> DELETE </button> 
              <!-- <input type="button" class="button" value="Go back!" onclick="history.back()">            -->
            
     </div>  
          </form>  
        </div>  
      </div>  
    </div>  
</div>  
</section>  
</body>  

</html>