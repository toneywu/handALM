<?php
global $db ;
$id=$_POST['id'];

$query_update = "UPDATE hat_counting_results
SET deleted = 1
WHERE
id ='".$id."'";
$result_update = $db->query($query_update);