<?php
include '../../config.php';




if ($_POST) {
	
$id = addslashes(strip_tags($_POST['id']));


$queryCek = mysqli_query($connect, "SELECT * FROM data_users WHERE id = '$id'");
if(mysqli_affected_rows($connect)){

$query1 = mysqli_query($connect, "UPDATE data_users SET durum = 1 WHERE id = $id");
echo '0';

	
}
else {
echo '1';

}

	
}

?>