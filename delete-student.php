<?php  
include('includes/config.php');
$stid=intval($_GET['stid']);
$sql = "DELETE FROM `students` WHERE StudentId=:stid";
$query = $dbh->prepare($sql);
$query->bindParam(':stid',$stid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query)
{
header("Location:add-students.php"); 
}
?>