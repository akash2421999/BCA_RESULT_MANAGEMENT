<?php  
include('includes/config.php');
$sid=intval($_GET['subjectid']);
$sql = "DELETE FROM `subjects` WHERE id=:sid";
$query = $dbh->prepare($sql);
$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query)
{
header("Location:create-subject.php"); 
}
?>