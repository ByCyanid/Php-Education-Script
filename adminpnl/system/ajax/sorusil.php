<?php
include '../../config.php';
if ($_POST) {

$id = addslashes(strip_tags($_POST['id']));

$queryCek = mysqli_query($connect, "SELECT * FROM sorular WHERE id = '$id'");

if(mysqli_affected_rows($connect)){
$query = mysqli_query($connect, "DELETE FROM sorular WHERE id = $id");
}	
}
?>