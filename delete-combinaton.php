<?php  
include('includes/config.php');
$cid=intval($_GET['classid']);
$sql = "DELETE FROM `subjectcombination` WHERE id=:cid";
$query = $dbh->prepare($sql);
$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query)
{
header("Location:create-class.php"); 
}
?>