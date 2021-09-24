<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['submit']))
{
$studentname=$_POST['fullanme'];
$roolid=$_POST['rollid']; 
$studentemail=$_POST['emailid']; 
$gender=$_POST['gender']; 
$classid=$_POST['class']; 
$dob=$_POST['dob']; 
$status=1;
$sql="INSERT INTO  students(StudentName,RollId,StudentEmail,Gender,ClassId,DOB,Status) VALUES(:studentname,:roolid,:studentemail,:gender,:classid,:dob,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':studentname',$studentname,PDO::PARAM_STR);
$query->bindParam(':roolid',$roolid,PDO::PARAM_STR);
$query->bindParam(':studentemail',$studentemail,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':classid',$classid,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Student info added successfully";
}
else 
{
$error="email or roll no already exist. Please try again";
}

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Admission< </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">
              <?php include('includes/topbar.php');?>
            <div class="content-wrapper">
                <div class="content-container" style="background: #5385c1">

                    

                   <div class="main-page" style="background: #fff">

                     <div class="container-fluid" style="margin-top: 2%;" >
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Add Student </h2>
                                
                                </div>
                                
                           
                            </div>
                           
                           
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-xl-12 col-xl-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Fill the Student info</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success " role="alert">
 <strong></strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger " role="alert">
                                            <strong></strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                                <form class="form-horizontal" method="post">

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Full Name</label>
<div class="col-sm-10">
<input type="text" name="fullanme" class="form-control" onkeyup="this.value = this.value.toUpperCase();"  id="fullanme" required="required" onkeypress="return /[a-z ]/i.test(event.key)" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Roll Id</label>
<div class="col-sm-10">
<input   type="text" class="form-control" id="rollid" placeholder="Enter Your Roll Id" autocomplete="off" name="rollid" required="required" pattern="[0-9]{2}[a-zA-Z]{4}[0-9]{4}">
    <div id="error"></div>

</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Email id</label>
<div class="col-sm-10">
<input type="email" name="emailid" class="form-control" onkeyup="this.value = this.value.toUpperCase();" id="email" required="required" autocomplete="off">
</div>
</div>



<div class="form-group">
<label for="default" class="col-sm-2 control-label">Gender</label>
<div class="col-sm-10">
<input type="radio" name="gender" value="Male" required="required" checked="">Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
</div>
</div>










                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">sem/year</label>
                                                        <div class="col-sm-10">
 <select name="class" class="form-control" id="default" required="required">
<option value="">Select Class</option>
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
                                                        </div>
                                                    </div>
<div class="form-group">
                                                        <label for="date" class="col-sm-2 control-label">DOB</label>
                                                         <div class="col-sm-10">
                                                            <!-- <input type="date"  name="dob" class="form-control" id="date" min="1995-12-31" max="2019-05-22"> -->
                                                            <input type="text" name="dob" class="form-control" id="date">
                                                        </div>
                                                    </div>
                                                    

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                       <section class="section">
                            <div class="container-fluid">

                             

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>View Students Info</h5>
                                                </div>
                                            </div>

                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Student Name</th>
                                                            <th>Roll Id</th>
                                                            <th>Email</th>
                                                            <th>Semester</th>

                                                            <th>Gender</th>
                                                            <th>DateofBirth</th>
                                                            <th>Update</th>
                                                            <th>Delete</th>

                                                        </tr>
                                                    </thead>
                                                 
                                                    <tbody>
<?php $sql = "SELECT students.StudentName,students.RollId,students.StudentEmail,students.Gender,students.StudentId,students.DOB,semester.SemName,semester.Section from students join semester on semester.id=students.ClassId";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<tr>
 <td><?php echo htmlentities($cnt);?></td>
                                                            <td><?php echo htmlentities($result->StudentName);?></td>
                                                            <td><?php echo htmlentities($result->RollId);?></td>
                                                            <td><?php echo htmlentities($result->StudentEmail);?></td>
                                                            <td><?php echo htmlentities($result->SemName);?>(<?php echo htmlentities($result->Section);?>)</td>
                                                            <td><?php echo htmlentities($result->Gender);?></td>
                                                             <td><?php echo htmlentities($result->DOB);?></td>
                                                         
<td>
<a class="btn btn-primary" href="edit-student.php?stid=<?php echo htmlentities($result->StudentId);?>">Update</a> 

</td>
<td>
<a class="btn btn-primary" onclick="return confirm('are your sure you want to delete?')" href="delete-student.php?stid=<?php echo htmlentities($result->StudentId);?>">Delete</a> 

</td>
</tr>
<?php $cnt=$cnt+1;}} ?>
                                                       
                                                    
                                                    </tbody>
                                                </table>

                                         
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                                    <!-- /.col-md-12 -->
                                </div>

                    </div>

                </div>
                
                <!-- /.content-container -->

            </div>

            <!-- /.content-wrapper -->
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
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
        <script src="js/main.js"></script>
          
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });

                //Jquery-ui Date picker
                $( "#date" ).datepicker({
                  changeMonth: true,
                  changeYear: true,
                  yearRange: "1995:",
                  maxDate: 0
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
    </body>
</html>
<?PHP } ?>

