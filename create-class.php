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
$semname=$_POST['semname'];
$collegecode=$_POST['collegecode']; 
$section=$_POST['section'];
$sql="INSERT INTO  semester(SemName,CollegeCode,Section) VALUES(:semname,:collegecode,:section)";
$query = $dbh->prepare($sql);
$query->bindParam(':semname',$semname,PDO::PARAM_STR);
$query->bindParam(':collegecode',$collegecode,PDO::PARAM_STR);
$query->bindParam(':section',$section,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Class Created successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Create Semester</title>
        <link rel="stylesheet" href="css/bootstrap.css" media="screen" >
     
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
         <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    </head>
     <body class="top-navbar-fixed">
        <div class="main-wrapper">
              <?php include('includes/topbar.php');?>
            <div class="content-wrapper">
                <div class="content-container">

                    

                   <div class="main-page" style="background: #fff">

                     <div class="container-fluid" style="margin-top: 2%;">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Create Semester</h2>
                                
                                </div>
                                
                           
                            </div>
                           
                           
                        </div>
   
                            <div class="container-fluid">

                             

                              

                                <div class="row">
                                                                  <div class="col-xl-12 col-xl-offset-2">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Create Student Semester</h5>
                                                </div>
                                            </div>
           <?php if($msg){?>
<div class="alert alert-success " role="alert">
<?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger " role="alert">
                                            <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
  
                                            <div class="panel-body">

                                                <form method="post">
                                                    <div class="form-group has-success">
                                                        <label class="control-label">Semester Name</label>
                                                		<div class="">
                                                			<input type="text" name="semname" placeholder="first,secound,third,fourth,fifth,six"  onkeyup="this.value = this.value.toUpperCase();" onkeypress="return /[a-z]/i.test(event.key)"
                                                			class="form-control" required="required" maxlength="7" id="success">
                                                           
                                                		</div>
                                                	</div>
                                                       <div class="form-group has-success">
                                                        <label  class="control-label">College code</label>
                                                        <div class="">
                                                            <input type="text" name="collegecode" onkeyup="this.value = this.value.toUpperCase();" onkeypress="return /[a-z]/i.test(event.key)" placeholder="kx" required="required" class="form-control" maxlength="2" id="success">
                                                            
                                                        </div>
                                                    </div>
                                                     <div class="form-group has-success">
                                                        <label  class="control-label">Year</label>
                                                        <div class="">
                                                            <input type="text" name="section" onkeyup="this.value = this.value.toUpperCase();" onkeypress="return /[0-9]/i.test(event.key)"placeholder="2017-18" class="form-control" required="required" id="success">
                                                         
                                                        </div>
                                                    </div>
  <div class="form-group has-success">

                                                        <div class="">
                                                           <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
                                                    </div>


                                                    
                                                </form>

                                              
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-8 col-md-offset-2 -->
                                </div>
                                <!-- /.row -->

                               
                               

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->
     <section class="section">
                            <div class="container-fluid">

                             

                                <div class="row">
                                    <div class="col-md-12">

                                       

                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Semester Name</th>
                                                            <th>College code</th>
                                                            <th>Year</th>
                                                            <th>Update</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                   
                                                    <tbody>
<?php $sql = "SELECT * from semester";
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
                                                            <td><?php echo htmlentities($result->SemName);?></td>
                                                            <td><?php echo htmlentities($result->CollegeCode);?></td>
                                                            <td><?php echo htmlentities($result->Section);?></td>
                                                           
<td>
<a class="btn btn-primary" href="edit-class.php?classid=<?php echo htmlentities($result->id);?>">update </a> 

</td>
<td>
<a  class="btn btn-primary" onclick="return confirm('are your sure you want to delete?')" href="delete-class.php?classid=<?php echo htmlentities($result->id);?>">Delete</a> 

</td>
</tr>
<?php $cnt=$cnt+1;}} ?>
                                                       
                                                    
                                                    </tbody>
                                                </table>

                                         
                                                
                                            </div>
                                        </div>
                                    </div>
                                  

                                                               
                                                </div>
                                            
                                            </div>
                                        </div>
                                  
                                    </div>
                                

                                </div>
                               

                            </div>
              
                        </section>
                    </div>
                    <!-- /.main-page -->

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>



        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
<?php  } ?>
