<?php  
include('includes/config.php');
$iid=intval($_GET['iid']);
$sql = "DELETE FROM `result` WHERE id=:iid";
$query = $dbh->prepare($sql);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query)
{
header("Location:add-result.php"); 
}
?>