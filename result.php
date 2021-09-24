<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Result Management System</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
<style type="text/css">
    article
{
    float: left;
    margin-top: 80px;
    width: 25%;
    height: 400px;
    padding:2%;
    margin-left: 2%;
    background: #009a55;
    color: #fff;
    font-size: 20px;

}
aside
{
    float: right;
margin: 0 auto;
width: 70%;
height: 200px;
padding: 2%;

}
</style>
        </head>
    <body>
        <div class=" btn btn-primary"><a href="index.html" style="color: #fff;padding: 30px">BACK</a></div>
        <div class="main-wrapper">
            <div class="content-wrapper">
                <div class="content-container">

         
                        <!-- /.container-fluid -->

                        <section class="section" id="exampl">
                         <article>
                             

                                          
<?php
// code Student Data
$rollid=$_POST['rollid'];
$classid=$_POST['class'];
$_SESSION['rollid']=$rollid;
$_SESSION['classid']=$classid;
$qery = "SELECT   students.StudentName,students.RollId,students.RegDate,students.StudentId,students.Status,semester.SemName,semester.Section from students join semester on semester.id=students.ClassId where students.RollId=:rollid and students.ClassId=:classid ";
$stmt = $dbh->prepare($qery);
$stmt->bindParam(':rollid',$rollid,PDO::PARAM_STR);
$stmt->bindParam(':classid',$classid,PDO::PARAM_STR);
$stmt->execute();
$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
foreach($resultss as $row)
{   ?>
<p><b>Student Name :</b> <?php echo htmlentities($row->StudentName);?></p>
<p><b>Student Roll Id :</b> <?php echo htmlentities($row->RollId);?>
<p><b>SEMESTER NAME/YEAR:</b> <?php echo htmlentities($row->SemName);?>(<?php echo htmlentities($row->Section);?>)
<?php }

    ?>
                                         
                                         

</article>
<aside>




                                                <table class="table table-hover table-bordered" border="1" width="100%">
                                                <thead>
                                                        <tr style="text-align: center">
                                                            <th style="text-align: center">No</th>
                                                            <th style="text-align: center"> Subject</th> 
                                                           
                                                            <th style="text-align: center"> compounent</th> 
                                                            <th style="text-align: center">Marks</th>
                                                        </tr>
                                               </thead>
  


                                                	
                                                	<tbody>
<?php                                              
// Code for result

 $query ="select t.StudentName,t.RollId,t.ClassId,t.marks,SubjectId,subjects.SubjectName,subjects.Compounent,subjects.SubjectCode from (select sts.StudentName,sts.RollId,sts.ClassId,tr.marks,SubjectId from students as sts join  result as tr on tr.StudentId=sts.StudentId) as t join subjects on subjects.id=t.SubjectId where (t.RollId=:rollid and t.ClassId=:classid)";
$query= $dbh -> prepare($query);
$query->bindParam(':rollid',$rollid,PDO::PARAM_STR);
$query->bindParam(':classid',$classid,PDO::PARAM_STR);
$query-> execute();  
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($countrow=$query->rowCount()>0)
{ 
foreach($results as $result){

    ?>

                                                		<tr>
<th scope="row" style="text-align: center"><?php echo htmlentities($cnt);?></th>
<td style="text-align: left;"><?php echo htmlentities($result->SubjectName);?></td>
<td style="text-align: left;"><?php echo htmlentities($result->Compounent);?></td>

<td style="text-align: center"><?php echo htmlentities($totalmarks=$result->marks);?></td>
                                                		</tr>
<?php 
$totlcount+=$totalmarks;
$cnt++;}
?>
<tr>
<th scope="row" colspan="2" style="text-align: center">Total Marks</th>
<td></td>
<td style="text-align: center"><b><?php echo htmlentities($totlcount); ?></b></td>
                                                        </tr>
<tr>
<!--<th scope="row" colspan="2" style="text-align: center">Percntage</th> 
<td></td>          
<td style="text-align: center"><b><?php echo  htmlentities($totlcount/800*100); ?> %</b></td>-->
</tr>

<tr>
    <td><div class="btn btn-primary btn-block"><i  style="cursor:pointer" OnClick="CallPrint(this.value)" >Print</i></div>
</td>
                              

                                                             </tr>


 <?php } else { ?>     
<div class="alert alert-warning left-icon-alert" role="alert">
                                            <strong>Notice!</strong> Your result not declare yet
 <?php }
?>
                                        </div>
 <?php 
 } else
 {?>

<div class="alert alert-danger left-icon-alert" role="alert">
strong>Oh snap!</strong>
<?php
echo htmlentities("Invalid Roll Id");
 }
?>
                                        </div>



                                                	</tbody>
                                                </table>
                                      </aside>

                                  
                                                           
                                                          
                                </div>
                                <!-- /.row -->
  
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

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
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {

            });


            function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('"background:black"', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>

        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

    </body>
</html>
