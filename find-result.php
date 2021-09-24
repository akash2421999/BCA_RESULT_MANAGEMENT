<?php
session_start();
//error_reporting(0);
include('includes/config.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Find result</title>
            <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/icheck/skins/flat/blue.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body style="background-color: orange">
       
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand " style="color: #fff" href="index.html">SURANA COLLEGE</a>
  <form class="form-inline my-2 my-lg-0" action="result.php" method="post" id="form">
    <input style="width: 200px; margin-left:200px; margin-top: 15px;"  type="text" class="form-control" id="rollid" placeholder="Enter Your Roll Id" autocomplete="off" name="rollid" required="required" pattern="[0-9]{2}[a-zA-Z]{4}[0-9]{4}">
    <div id="error"></div>
    <label for="default" class="col-sm-2 control-label" style="color: #fff">Class</label>
   <select style="width: 300px;" name="class" class="form-control" id="default" required="required">
  <option value="">Select sem/year</option>
  <?php $sql = "SELECT * from semester";
  $query = $dbh->prepare($sql);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
  foreach($results as $result)
  {   ?>
  <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->SemName); ?>&nbsp; Sem-<?php echo htmlentities($result->Section); ?></option>
  <?php }} ?>
   </select>
   <button type="submit" style="width: 150px; margin-left: -10%;height: 40px" class="btn btn-primary ">Check Result</button>
 </form>
</nav>
 <div class="container" >
          <h1 style="text-align:center;">BCA RESULT FROM 1 SEMESTER TO 6 SEMESTER ARE HEAR</h1>
         	<table>
         		
<th style="color: #000">1semester</th>   
<th style="color: #000">2semester</th> 
<th style="color: #000">3semester</th> 
<th style="color: #000">4semester</th> 
<th style="color: #000">5semester</th> 
<th style="color: #000">6semester</th> 
<tr>
	<td>2017-18</td>
</tr>
      	</table>
      	    </div>
        <style>
          input#rollid:invalid {
                border:1px solid #DD2C00;
                width:100%;
            }
            #error {
              position: absolute;
              width: 17%;
              z-index: 99;
              margin-left: 14.7%;
              margin-top: 1.5%;
            }
            #notify {
                margin-top: 5px;
                padding: 10px;
                font-size: 12px;
                width: 100%;
                color: #fff;
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }
            #notify.error {
                background-color: #DD2C00;
            }

        </style>

        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>

        <script>
           $(function(){
                $('input.flat-blue-style').iCheck({
                    checkboxClass: 'icheckbox_flat-blue'
                });
            });

            (function() {
          
                var input              = document.getElementById('rollid');
                var error_place        = document.getElementById('error');
                var elem               = document.createElement('div');
                        elem.id            = 'notify';
                        elem.style.display = 'none';

                        error_place.appendChild(elem);

                input.addEventListener('invalid', function(event){
                    event.preventDefault();
                    if ( ! event.target.validity.valid ) {
                        input.className    = 'invalid animated shake';
                        elem.textContent   = 'Roll Id required (e.g. 17KXSB7001)';
                        elem.className     = 'error';
                        elem.style.display = 'block';
                    }
                });

                input.addEventListener('input', function(event){
                    if ( 'block' === elem.style.display ) {
                        input.className = '';
                        elem.style.display = 'none';
                    }
                });

            })();

         
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
