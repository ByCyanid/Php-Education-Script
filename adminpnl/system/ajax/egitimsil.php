<?php
include '../../config.php';




if ($_POST) {
	
$id = addslashes(strip_tags($_POST['id']));


$queryCek = mysqli_query($connect, "SELECT * FROM egitimler WHERE id = '$id'");
if(mysqli_affected_rows($connect)){
echo '0';
$query = mysqli_query($connect, "DELETE FROM egitimler WHERE id = $id");

	
}
else {
echo '1';

}

	
}

?>